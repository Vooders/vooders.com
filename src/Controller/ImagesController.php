<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 */
class ImagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $images = $this->paginate($this->Images);

        $this->set(compact('images'));
        $this->set('_serialize', ['images']);
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => ['Posts', 'Users']
        ]);

        $this->set('image', $image);
        $this->set('_serialize', ['image']);
    }

  
    /**
    * Add method
    *
    * All images are added through here via the uploader element
    * The 'parent_type' input determines what happens to them
    */
    public function add($type){
        $this->autoRender = false;
        $file = $this->Images->newEntity();

        if($this->request->is(['ajax', 'post'])){

            $file = $this->Images->patchEntity($file, $this->request->data);
            $image = $this->Images->save($file);  

            if(!empty($image->id)){
                switch ($type) {
                    // Sets a users profile picture
                    case 'profile':
                        // Get the users model and the logged in user
                        $this->loadModel('Users');
                        $user = $this->Users->get($this->Auth->user('id'));

                        // If the user has a profile pic set we need to remove it
                        // both from the filesystem and the database 
                        if($user->image_id !== null)
                            $this->_deleteImage($user->image_id);
                            
                        $user->image_id = $image->id;

                        if($this->Users->save($user)){
                            $this->Flash->success('Your profile picture has been set');
                            echo json_encode($image->rel_file_path);
                        }
                        break;

                    // Set a challenge page hero image
                    case 'challenge_page_hero':
                        $this->_updateChallengePageImage('hero_image_id', $image);
                        break;

                    // Set a challenge page image one
                    case 'challenge_page_img_1':
                        $this->_updateChallengePageImage('image_1_id', $image);
                        break;

                    // Set a challenge page image two
                    case 'challenge_page_img_2':
                        $this->_updateChallengePageImage('image_2_id', $image);
                        break;
                }
            }
        }

        $this->set(compact('image'));
    }

     private function _deleteImage($id){
        $oldImage = $this->Images->get($id);
        $folder = new Folder($oldImage->rel_dir_path);
        
        if($this->Images->delete($oldImage)){
            if($folder->path !== null){
                $folder->delete();
            }
        }        
    }


    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => ['Posts']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->patchEntity($image, $this->request->data);
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $posts = $this->Images->Posts->find('list', ['limit' => 200]);
        $this->set(compact('image', 'posts'));
        $this->set('_serialize', ['image']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //==- Security Functions -==\\

    /**
     * Is Authorized Method
     *
     */
    public function isAuthorized($user){
        // In dev return all as true
        return true; 
    }
}
