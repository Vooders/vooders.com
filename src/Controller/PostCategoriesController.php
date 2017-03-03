<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PostCategories Controller
 *
 * @property \App\Model\Table\PostCategoriesTable $PostCategories
 */
class PostCategoriesController extends AppController
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
        $postCategories = $this->paginate($this->PostCategories);

        $this->set(compact('postCategories'));
        $this->set('_serialize', ['postCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Post Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $postCategory = $this->PostCategories->get($id, [
            'contain' => ['Posts']
        ]);

        $this->set('postCategory', $postCategory);
        $this->set('_serialize', ['postCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $postCategory = $this->PostCategories->newEntity();
        if ($this->request->is('post')) {
            $postCategory = $this->PostCategories->patchEntity($postCategory, $this->request->data);
            if ($this->PostCategories->save($postCategory)) {
                $this->Flash->success(__('The post category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post category could not be saved. Please, try again.'));
            }
        }
        $posts = $this->PostCategories->Posts->find('list', ['limit' => 200]);
        $this->set(compact('postCategory', 'posts'));
        $this->set('_serialize', ['postCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Post Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $postCategory = $this->PostCategories->get($id, [
            'contain' => ['Posts']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postCategory = $this->PostCategories->patchEntity($postCategory, $this->request->data);
            if ($this->PostCategories->save($postCategory)) {
                $this->Flash->success(__('The post category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post category could not be saved. Please, try again.'));
            }
        }
        $posts = $this->PostCategories->Posts->find('list', ['limit' => 200]);
        $this->set(compact('postCategory', 'posts'));
        $this->set('_serialize', ['postCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Post Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $postCategory = $this->PostCategories->get($id);
        if ($this->PostCategories->delete($postCategory)) {
            $this->Flash->success(__('The post category has been deleted.'));
        } else {
            $this->Flash->error(__('The post category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
