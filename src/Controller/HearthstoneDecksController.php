<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HearthstoneDecks Controller
 *
 * @property \App\Model\Table\HearthstoneDecksTable $HearthstoneDecks
 */
class HearthstoneDecksController extends AppController{

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

  	public function newDeck(){
    
  	}
}
