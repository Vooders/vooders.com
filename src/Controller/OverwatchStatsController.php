<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Http\Client;
/**
 * OverwatchStats Controller
 *
 * @property \App\Model\Table\OverwatchStatsTable $OverwatchStats
 */
class OverwatchStatsController extends AppController
{
    private $user;
    private $battleTag;

    /**
     * Get the user and format the battle tag
     */
    public function initialize() {
        parent::initialize();
        $this->loadModel('Users');

        $this->baseUrl = 'https://api.lootbox.eu/pc/eu/';
        $this->http = new Client();

        $userID = $this->request->session()->read('User.id');
        $this->user = $this->Users->get($userID, [
            'contain' => 'BattleTags'
        ]);
        $tag = $this->user->battle_tag->tag;
        $tag = str_replace('#', '-', $tag);
        $this->battleTag = $tag;
    }

    public function test(){
        debug($this->battleTag);die;
    }

    public function getStats(){
        $url = $this->baseUrl.$this->battleTag.'/quick-play/hero/Junkrat/';
        $response = $this->http->get($url);

        $stats = json_decode($response->body);

        if(!isset($stats->statusCode)){
            $this->loadModel('OverwatchJunkratStats');

            $hero = $this->OverwatchJunkratStats->newEntity();

            $array = [];
            foreach ($stats->Junkrat as $name => $stat){
                $name = str_replace('-', '_', $name);
                $array[$name] = $stat;
            }

            $hero = $this->OverwatchJunkratStats->patchEntity($hero, $array, ['validate' => false]);
            $hero->user_id = $this->request->session()->read('User.id');
            if($this->OverwatchJunkratStats->save($hero)){
                $test = $this->OverwatchJunkratStats->get(1);
debug('we did it');
                debug($test);
            } else {
                echo 'error';
            }
        } else {
            debug($stats);
        }

    }



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
