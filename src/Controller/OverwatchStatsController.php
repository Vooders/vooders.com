<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OverwatchStats Controller
 *
 * @property \App\Model\Table\OverwatchStatsTable $OverwatchStats
 */
class OverwatchStatsController extends AppController
{
    /**
     *
     */
    public function refreshStats(){
        $this->loadModel('Users');
        $user = $this->Users->get(1, [
            'contain' => 'BattleTags'
        ]);
        
    }

    /**-- CRUD Methods --**/

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'OverwatchCharacters']
        ];
        $overwatchStats = $this->paginate($this->OverwatchStats);

        $this->set(compact('overwatchStats'));
        $this->set('_serialize', ['overwatchStats']);
    }

    /**
     * View method
     *
     * @param string|null $id Overwatch Stat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $overwatchStat = $this->OverwatchStats->get($id, [
            'contain' => ['Users', 'OverwatchCharacters']
        ]);

        $this->set('overwatchStat', $overwatchStat);
        $this->set('_serialize', ['overwatchStat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Overwatch Stat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $overwatchStat = $this->OverwatchStats->get($id);
        if ($this->OverwatchStats->delete($overwatchStat)) {
            $this->Flash->success(__('The overwatch stat has been deleted.'));
        } else {
            $this->Flash->error(__('The overwatch stat could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
