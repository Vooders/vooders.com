<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mumble Controller
 *
 * @property \App\Model\Table\HearthstoneDecksTable $HearthstoneDecks
 */
class MumbleController extends AppController{

	
	public function initilize(){
		
	}

	public function getUser($id){
		$this->loadModel('MumbleUsers');
		debug($this->MumbleUsers->get($id));die;
	}


	public function bingo(){
		$numbers = []; 	// Make an array for the numbers picked
		$gameCounter = 0;	// and a game counter
		
		$ok = false;	
		if($gameCounter < 99){			
			while($ok == false){				
				$number = rand(1, 99);				
				if(!in_array($number, $numbers)){				
					$ok = true;					
					array_push($numbers, $number);				
				}			
			}						
			$gameCounter++;			
			return $number;		
		} else {			
			resetGame();		
		}			
	}		
			
}
