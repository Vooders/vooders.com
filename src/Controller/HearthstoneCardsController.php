<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Http\Client;

class HearthstoneCardsController extends AppController
{
    private $apiKey;
    private $http;

    public function initialize(){
        parent::initialize();

        $this->apiKey = "vCOUsrH8a9mshVleg7HjFUh8hvN5p1It6dijsnVxlSqMMRTYGd";

        $this->http = new Client([
            'headers' => ['X-Mashape-Key' => $this->apiKey]
        ]);
    }  


    /**
    * Refreshes the database with every card from the HearthStone API
    */
    public function fetchAllCards(){
        $this->autoRender = false;

        $response = $this->http->get("https://omgvamp-hearthstone-v1.p.mashape.com/cards");
        $cards = json_decode($response->body);
        foreach ($cards as $deck) {
          foreach ($deck as $c) {
            $card = $this->HearthstoneCards->findByName($c->name)->first();

            if (empty($card)){
              $card = $this->HearthstoneCards->newEntity();
            }
            
            $card = $this->HearthstoneCards->patchEntity($card, (array) $c);
            if(isset($c->cardId)) $card->card_id = $c->cardId;
            if(isset($c->cardSet)) $card->card_set = $c->cardSet;
            if(isset($c->imgGold)) $card->img_gold = $c->imgGold;
            if(isset($c->playerClass)) $card->player_class = $c->playerClass;

            $this->HearthstoneCards->save($card);
          }
    }

    $this->Flash->success('done!');
    return $this->redirect(['controller' => 'HearthstoneCards', 'action' => 'control']);
  }

 /**
  * The control panel for the hearthstone card database
  */
  public function control(){
    $totals = $this->_getClassTotals();
    $totals->total = $this->HearthstoneCards->find('all')->count();

    $this->set(compact('totals'));
  }


  private function _getClassTotals(){
    $totals->class->druid = $this->HearthstoneCards->find()->where(['player_class' => 'Druid'])->count();
    $totals->class->hunter = $this->HearthstoneCards->find()->where(['player_class' => 'Hunter'])->count();
    $totals->class->mage = $this->HearthstoneCards->find()->where(['player_class' => 'Mage'])->count();
    $totals->class->paladin = $this->HearthstoneCards->find()->where(['player_class' => 'Paladin'])->count();
    $totals->class->priest = $this->HearthstoneCards->find()->where(['player_class' => 'Priest'])->count();
    $totals->class->rogue = $this->HearthstoneCards->find()->where(['player_class' => 'Rogue'])->count();
    $totals->class->shaman = $this->HearthstoneCards->find()->where(['player_class' => 'Shaman'])->count();
    $totals->class->warlock = $this->HearthstoneCards->find()->where(['player_class' => 'Warlock'])->count();
    $totals->class->warrior = $this->HearthstoneCards->find()->where(['player_class' => 'Warrior'])->count();
    $totals->class->Neutral = $this->HearthstoneCards->find()->where(['faction' => 'Neutral'])->count();
    return $totals;
  }

}
