<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Security;
use Cake\Auth\DefaultPasswordHasher;

/**
 * PasswordGenerator Controller
 *
 */
class PasswordGeneratorController extends AppController{

	public function isAuthorized($user){
		$this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));
        if($user->is_vooders){
            return true;
        }

        switch ($this->request->action) {
        	case 'index':
                return true;
                break;
        	        	
            default:
                return false;
                break;
         } 
    }

	/**
	 * Attempting to make a password beefer'upper
	 */
	public function index(){
		if($this->request->is(['post', 'put', 'patch'])){
			$userId = $this->request->session()->read('User.id');
			$this->loadModel('Users');
			$user = $this->Users->get($userId);

			$input = $this->request->data['input'];

			$hash1 = Security::hash($input, 'sha512', $user->username);
			$hash2 = Security::hash($hash1, 'sha512', $user->username.$hash1);
			$hash3 = Security::hash($hash2, 'sha512', $hash2.$hash1);
			$hash4 = Security::hash($hash3, 'sha512', $hash1.$hash2);
			$hash5 = Security::hash($hash4, 'sha512', $hash2.$hash3);
			$hash6 = Security::hash($hash5, 'sha512', $hash3.$hash4);
			$hash7 = Security::hash($hash6, 'sha512', $hash4.$hash5);

			$output = $hash7;
			$this->set(compact('output'));
		}
	}
}
