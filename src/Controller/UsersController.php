<?php
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\Utility\Security;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController
{
    /**-- Initialisation Methods --**/
    /**
    * Before Filter
    *
    **/
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow([
            'register', 
            'requestPasswordReset', 
            'resetPassword', 
            'registered', 
            'login', 
            'checkEmail', 
            'forgotUsername', 
            'getUsers'   
        ]);
    }

    /**
    * Is Authorized Method
    *
    **/
    public function isAuthorized($user){
        return true; 
    }

    /**
    * Profile method
    *
    *
    **/
    public function profile(){
    $userId =  $this->request->session()->read('User.id');

    $user = $this->Users->get($userId, [
        'contain' => [
            'UserContacts', 
            'UserEmails',
            'BattleTags'
        ]
    ]);

    $this->set(compact('user'));
    }

    /**
    * The login method
    * 
    * Logs the user in.
    * Then triggers session setup.
    *
    **/
    public function login(){ 
        if ($this->request->is('post')){
            $user = $this->Auth->identify();  
            if ($user){    
                if ($user['account_status'] > 0){    
                    $this->Auth->setUser($user); 
                    $this->_sessionSetUp($user);  
                    $user = $this->Users->get($user['id']);
                    $user['last_access'] = Time::now();
                    $this->Users->save($user);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('This account has not yet been activated. Please check your email for a confirmation link.'));
                }
            } else {
                // Log the failed login attempt 
                $this->Flash->error(__('Incorrect username or password!'));
                $data = $this->request->data;
                $this->loadModel('FailedLogins');
                $failedLogin = $this->FailedLogins->newEntity();
                $failedLogin['username'] = $data['username'];
                $failedLogin['ip_address'] = $this->request->env('REMOTE_ADDR');
                $failedLogin['created'] = Time::now();
                $failedLogin['modified'] = Time::now();
                $this->FailedLogins->save($failedLogin);
            }
        } 
    }

    /**
    * Save our user details into the session.
    * This allows us to access the data from anywhere.
    *
    **/
    private function _sessionSetUp($user){
        $session = $this->request->session();
        $session->write('User.username', $user['username']);
        $session->write('User.id', $user['id']);
    }

    /**
    * The logout function
    * Logs the user out and destroys the session 
    *
    **/
    public function logout(){
        $session = $this->request->session();
        $session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    /**
    * Request Password Reset Method
    *
    **/
    public function requestPasswordReset(){
        if($this->request->is('post')){
            $this->loadModel('UserEmails');
            $userEmail = $this->UserEmails->findByEmail($this->request->data['email'])->first();
            $user = $this->Users->get($userEmail['user_id']);

            if($user == null){
                $this->Flash->error(__('Sorry, that email was not recognised. Please try again.'));
            } else {
                // Generate a hash
                $hash = Security::hash(date('Y-m-Y-i-s') . $user['username'] . $_SERVER['REMOTE_ADDR']);
                // Save hash and reset time to user's record
                $save = $this->Users->get($user['id']);
                $save->reset_hash = $hash;
                $save->reset_time = date('Y-m-d H:i:s');
                $this->Users->save($save);
                // Email a link including the hash to the user
                $to = $this->request->data['email'];
                $message = 'Please click on this link to reset your password:'.PHP_EOL.PHP_EOL.' http://' . $_SERVER['HTTP_HOST'] . '/users/resetPassword/' . $hash . '/' . $user['id'] . PHP_EOL . PHP_EOL .' This link will expire in two hours.';
                $email = new Email('default');
                $email->transport('mailjet')
                    ->from(['vooderbot@vooders.com' => 'Vooders.com'])
                    ->to($to)
                    ->subject('Reset your password')
                    ->send($message);
                // Set flash and redirect
                $this->Flash->success(__('Thank you - we have sent you a link to reset your password.'));
                $this->redirect(['controller'=>'users', 'action'=>'login']);
            }
        }
    }
    /**
    * Reset Password
    *
    **/
    public function resetPassword($hash=null, $id=null)
    {
        $user = $this->Users->get($id);
        if(strtotime($user->reset_time) > strtotime('-120 minutes')) {
            if($hash === $user->reset_hash){
            // All good - let them reset their password
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    $user['reset_hash'] = null;
                    $user['reset_time'] = null;
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Your password has been reset. Please login.'));
                        $this->redirect(['action'=>'login']);
                    } else {
                        $this->Flash->error(__('Sorry, the password did not save. Please try again'));
                        $this->redirect(['action'=>'requestPasswordReset']);
                    }
                }
            } else {
                // The hash is wrong, don't accept
                $this->Flash->error(__('The link is incorrect. Please try again'));
                $this->redirect(['action'=>'requestPasswordReset']);
            }
        } else {
            // The link has expired
            $this->Flash->error(__('The password reset has expired. Please try again'));
            $this->redirect([
                'controller' => 'Pages',
                'action'=>'display', 'expired'
            ]);
        }
    }
    /**
    * Emails a user thier username. 
    * If they provide a valid password and email address
    *
    **/
    public function forgotUsername(){
        if($this->request->is('post')){
            $data = $this->request->data;
            $userEmail = $this->Users->UserEmails->findByEmail($data['email'])->first();
            $user = $this->Users->get($userEmail['user_id']);
            $ok = DefaultPasswordHasher::check($data['password'], $user['password']);
            if ($ok){
                // Email the user thier username
                $to = $data['email'];
                $message = 'Here is your username, as requested:'.PHP_EOL.
                            PHP_EOL.
                            'Username: ' . $user['username'] . PHP_EOL.
                            PHP_EOL .
                            ' -Vooderbot';
                $email = new Email('default');
                $email->transport('mailjet')
                    ->from(['vooderbot@vooders.com' => 'Vooders.com'])
                    ->to($to)
                    ->subject('Heres your username')
                    ->send($message);
                $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The details you have entered are incorrect'));
                $this->redirect(['action' => 'login']);
            }
        }
    }

    /**
    * Adds a user to the contacts of the logged in user
    *
    **/
    public function newContact($id = null){
        $this->autoRender = false;
        $userId = $this->request->session()->read('User.id');
        $user = $this->Users->get($userId, [
        'contain' => 'UserContacts'
        ]);
        $present = false;
        foreach ($user->users_contacts as $c) {
            if ($c->user_contact_id == $id)  {
                $present = true;
            }         
        }
        if (($id != null) && (!$present)){    
            $contact = $this->Users->UserContacts->newEntity();
            $contact->user_id = $userId;
            $contact->user_contact_id = $id;
            $contact->type = 'added from profile';
            if($this->Users->UserContacts->save($contact)){
                $this->Flash->success(__('New Contact Added'));
            } else {
                $this->Flash->error(__('The Contact could not be saved'));
            }
        }
        return $this->redirect(['action' => 'profile', $userId]);
    }

    /**
    * Removes a contact from the contacts of the logged in user
    *
    **/
    public function removeContact($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $userId = $this->request->session()->read('User.id');
        // Get the logged in users contacts
        $user = $this->Users->get($userId, [
        'contain' => 'UserContacts'
        ]);
        // Search the users contacts 
        $contact = 0;
        foreach ($user->users_contacts as $c) {
            if ($c->user_contact_id == $id)  {
                $contact = $this->Users->UserContacts->get($c->id);
            }         
        }
        // If the right contact is found remove it
        if($contact !== 0){
            if ($this->Users->UserContacts->delete($contact)) {
                $this->Flash->success(__('The contact has been removed.'));
            } else {
                $this->Flash->error(__('The contact could not be removed. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'profile', $userId]);
    }

    /**
    * Register Method
    *
    * @return void Redirects on successful add, renders view otherwise.
    **/
    public function register()
    {  
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            // Pull the email address from the request data
            $request = $this->request->data;
            $email = $request['email'];
            unset($request['email']);  
            // Set some values
            $user = $this->Users->patchEntity($user, $request);
            $user['account_status'] = 0;
            $user['last_access'] = Time::now();
            if ($this->Users->save($user)) {
                // Get the user_id now we have one
                $user = $this->Users->findByUsername($user['username'])->first();
                $userId = $user['id'];
                // Save registration email address
                $this->loadModel('userEmails');
                $contact = $this->userEmails->newEntity();
                $contact['user_id'] = $userId;
                $contact['type'] = 'email';
                $contact['name'] = 'registration';
                $contact['email'] = $email;
                $contact['created_by'] = $userId;
                $contact['modified_by'] = $userId;
                $this->userEmails->save($contact);
                // Get email ID so we can validate it
                $userEmail = $this->userEmails->findByUserId($user['id'])->first();
                $emailId = $userEmail['id'];
                // Set these bits, now we have the ID
                $user['created_by'] = $userId;
                $user['modified_by'] = $userId;
                $this->Users->save($user);
                // Send confimation email 
                $this->_confirmEmail($user, $emailId);
                $this->redirect(['controller'=>'Users' ,'action'=>'login']);
            } else {
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $users = $this->Users->find('list', ['limit' => 200, 'valueField' => 'username']);
        $usernames = [];
        foreach ($users as $u){
            $usernames[] = $u;
        }
        $this->set('allUsernames', $usernames);
        $this->set(compact('user'));
    }

    /**
    * Logs in the user passed to it without needing credentials
    *
    **/
    private function _autoLogin($user){
        $this->loadComponent('Auth');
        $this->Auth->setUser($user->toArray());
        $this->_sessionSetUp($user);
        $this->Flash->success(__('You are now logged in'));
    }

    /**-- Private Methods --**/
    /**
    * Sends the user an email to confirm that the correct address has been entered
    *
    **/
    private function _confirmEmail($user, $emailId){
        // Generate a hash
        $hash = Security::hash(date('Y-m-Y-i-s') . $user['username'] . $_SERVER['REMOTE_ADDR']);
        // Save hash and reset time to user's record
        $save = $this->Users->get($user['id']);
        $save->reset_hash = $hash;
        $save->reset_time = date('Y-m-d H:i:s');
        $this->Users->save($save);
        // Email a link including the hash to the user
        $to = $this->request->data['email'];
        $message = 'Please click on this link to confirm your email address and activate your account:'. PHP_EOL.
                    PHP_EOL .
                    'http://' . $_SERVER['HTTP_HOST'] . '/users/checkEmail/' . $hash . '/' . $user['id'] . '/' . $emailId . PHP_EOL.
                    PHP_EOL .
                    ' -Vooderbot';
        $email = new Email('default');
        $email->transport('default')
            ->from(['vooderbot@vooders.com' => 'Vooders.com'])
            ->to($to)
            ->subject('Confirm your email address')
            ->send($message);
        // Set flash and redirect
        $this->Flash->success(__('Thank you - we have sent you a link to confirm your email address.'));
    }

    /**
    * Check the confimation link is correct
    * If it is set the account and email as verified
    *
    **/
    public function checkEmail($hash=null, $id=null, $cId=null)
    {
        $this->autoRender = false;
        $user = $this->Users->get($id);
        if(strtotime($user->reset_time) > strtotime('-24 hours')) {
            if($hash === $user->reset_hash){
                // All good 
                $user['account_status'] = 1;
                $user['reset_hash'] = null;
                $user['reset_time'] = null;
                $this->Users->save($user);
                $this->loadModel('UserEmails');
                $email = $this->UserEmails->get($cId);
                $email['verified'] = 1;
                $this->UserEmails->save($email);
                $this->_autoLogin($user);
                $this->Flash->success(__('Your email has been verified and your account is now active.'));
                $this->redirect(['controller' => 'Users', 'action' => 'index']);
            } else {
                // The hash is wrong, don't accept
                $this->Flash->error(__('The link is incorrect. Please try again'));
                $this->redirect(['controller' => 'Pages','action'=>'display', 'home']);
            }
        } else {
            // The link has expired
            $this->Flash->error(__('The link has expired. We have just sent you another, it will be valid for 24 hours.'));
            $this->_confirmEmail($user, $cId);
            $this->redirect(['controller' => 'Pages','action'=>'display', 'expired']);
        }
    }
    /**
    * Index method
    *
    */
    public function index(){
        $this->set('users', $this->paginate($this->Users));
        $this->set(compact('users'));
    }
    /**
    * View method
    *
    */
    public function view($id = null){
        $user = $this->Users->get($id, [
            'contain' => ['UserContacts', 'UserEmails']
        ]);
        $this->set('user', $user);
    }
    /**
    * Add method
    *
    */
    public function add(){
    $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }
    /**
    * Edit method
    *
    */
    public function edit($id = null){
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }
    /**
    * Delete method
    *
    */
    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}