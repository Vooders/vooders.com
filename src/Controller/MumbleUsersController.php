<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Security;

/**
 * MumbleUsers Controller
 *
 * @property \App\Model\Table\MumbleUsersTable $MumbleUsers
 */
class MumbleUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MumbleServers']
        ];
        $mumbleUsers = $this->paginate($this->MumbleUsers);

        $this->set(compact('mumbleUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Mumble User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mumbleUser = $this->MumbleUsers->get($id, [
            'contain' => ['MumbleServers']
        ]);

        $this->set('mumbleUser', $mumbleUser);
        $this->set('_serialize', ['mumbleUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mumbleUser = $this->MumbleUsers->newEntity();
        if ($this->request->is('post')) {
            $mumbleUser = $this->MumbleUsers->patchEntity($mumbleUser, $this->request->data);
            if ($this->MumbleUsers->save($mumbleUser)) {
                $this->Flash->success(__('The mumble user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mumble user could not be saved. Please, try again.'));
            }
        }
        $mumbleServers = $this->MumbleUsers->MumbleServers->find('list', ['limit' => 200]);

        $this->set(compact('mumbleUser', 'mumbleServers', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mumble User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mumbleUser = $this->MumbleUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mumbleUser = $this->MumbleUsers->patchEntity($mumbleUser, $this->request->data);
            if ($this->MumbleUsers->save($mumbleUser)) {
                $this->Flash->success(__('The mumble user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mumble user could not be saved. Please, try again.'));
            }
        }
        $mumbleServers = $this->MumbleUsers->MumbleServers->find('list', ['limit' => 200]);
        $users = $this->MumbleUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('mumbleUser', 'mumbleServers', 'users'));
        $this->set('_serialize', ['mumbleUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mumble User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mumbleUser = $this->MumbleUsers->get($id);
        if ($this->MumbleUsers->delete($mumbleUser)) {
            $this->Flash->success(__('The mumble user has been deleted.'));
        } else {
            $this->Flash->error(__('The mumble user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
