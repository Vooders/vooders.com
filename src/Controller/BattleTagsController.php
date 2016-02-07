<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BattleTags Controller
 *
 * @property \App\Model\Table\BattleTagsTable $BattleTags
 */
class BattleTagsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
			$this->paginate = [
				'contain' => ['Users']
			];
			$this->set('battleTags', $this->paginate($this->BattleTags));
			$this->set('_serialize', ['battleTags']);
    }

    /**
     * View method
     *
     * @param string|null $id Battle Tag id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
			$battleTag = $this->BattleTags->get($id, [
					'contain' => ['Users', 'HotsLogs']
			]);
			$this->set('battleTag', $battleTag);
			$this->set('_serialize', ['battleTag']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
			$battleTag = $this->BattleTags->newEntity();
			if ($this->request->is('post')) {
				$battleTag = $this->BattleTags->patchEntity($battleTag, $this->request->data);
				$battleTag->user_id = $this->request->session()->read('User.id');
				if ($this->BattleTags->save($battleTag)) {
					$this->Flash->success(__('The battle tag has been saved.'));
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error(__('The battle tag could not be saved. Please, try again.'));
				}
			}
			$users = $this->BattleTags->Users->find('list', ['limit' => 200]);
			$this->set(compact('battleTag', 'users'));
			$this->set('_serialize', ['battleTag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Battle Tag id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $battleTag = $this->BattleTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $battleTag = $this->BattleTags->patchEntity($battleTag, $this->request->data);
            if ($this->BattleTags->save($battleTag)) {
                $this->Flash->success(__('The battle tag has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The battle tag could not be saved. Please, try again.'));
            }
        }
        $users = $this->BattleTags->Users->find('list', ['limit' => 200]);
        $this->set(compact('battleTag', 'users'));
        $this->set('_serialize', ['battleTag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Battle Tag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $battleTag = $this->BattleTags->get($id);
        if ($this->BattleTags->delete($battleTag)) {
            $this->Flash->success(__('The battle tag has been deleted.'));
        } else {
            $this->Flash->error(__('The battle tag could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
