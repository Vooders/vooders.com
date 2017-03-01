<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OverwatchCharacters Controller
 *
 * @property \App\Model\Table\OverwatchCharactersTable $OverwatchCharacters
 */
class OverwatchCharactersController extends AppController
{
    public function isAuthorized($user){
        $this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));
        if($user->is_vooders){
            return true;
        }

        switch ($this->request->action) {
                        
            default:
                return false;
                break;
         } 
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $overwatchCharacters = $this->paginate($this->OverwatchCharacters);

        $this->set(compact('overwatchCharacters'));
        $this->set('_serialize', ['overwatchCharacters']);
    }

    /**
     * View method
     *
     * @param string|null $id Overwatch Character id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $overwatchCharacter = $this->OverwatchCharacters->get($id, [
            'contain' => ['OverwatchStats']
        ]);

        $this->set('overwatchCharacter', $overwatchCharacter);
        $this->set('_serialize', ['overwatchCharacter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $overwatchCharacter = $this->OverwatchCharacters->newEntity();
        if ($this->request->is('post')) {
            $overwatchCharacter = $this->OverwatchCharacters->patchEntity($overwatchCharacter, $this->request->data);
            if ($this->OverwatchCharacters->save($overwatchCharacter)) {
                $this->Flash->success(__('The overwatch character has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The overwatch character could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('overwatchCharacter'));
        $this->set('_serialize', ['overwatchCharacter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Overwatch Character id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $overwatchCharacter = $this->OverwatchCharacters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $overwatchCharacter = $this->OverwatchCharacters->patchEntity($overwatchCharacter, $this->request->data);
            if ($this->OverwatchCharacters->save($overwatchCharacter)) {
                $this->Flash->success(__('The overwatch character has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The overwatch character could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('overwatchCharacter'));
        $this->set('_serialize', ['overwatchCharacter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Overwatch Character id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $overwatchCharacter = $this->OverwatchCharacters->get($id);
        if ($this->OverwatchCharacters->delete($overwatchCharacter)) {
            $this->Flash->success(__('The overwatch character has been deleted.'));
        } else {
            $this->Flash->error(__('The overwatch character could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
