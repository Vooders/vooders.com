<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Chats Controller
 *
 * @property \App\Model\Table\ChatsTable $Chats
 */
class ChatsController extends AppController
{

   public function comments(){
        $this->autoRender = false;
        $this->response->header('Access-Control-Allow-Origin', '*');
        $chats = $this->Chats->find('all');

        $results = [];
        foreach ($chats as $chat) {
            $results = [['id' => $chat->id,'author' => $chat->author, 'text' => $chat->text]];
        }
//debug('test');die;
        echo json_encode($results);
   }

   public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['comments']);
    }
}
