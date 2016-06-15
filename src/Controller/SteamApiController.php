<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Http\Client;
/**
 * Steam API Controller
 *
 */
class SteamApiController extends AppController{

	private $key;
	private $myId;

	public function initialize(){
		parent::initialize();
		$this->key = 'B39B74AD7E4C0F389D187FCD35158B66';
		$this->myId = '76561197979418977';
	}

	/**
	 * Gets all the games owned by the steamID
	 */
	public function getOwnedGames($steamId = null){
		$this->autoRender = false;
		debug($this->makeRequest('http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/', $steamId));
	}


	/**
	 * Gets the recently played games of the steamID
	 */
	public function getRecentlyPlayed($steamId = null){
		$this->autoRender = false;
		debug($this->makeRequest('http://api.steampowered.com/IPlayerService/GetRecentlyPlayedGames/v0001/', $steamId));
	}


	public function getPlayerSummary($steamId = null){
		$this->autoRender = false;
		if($steamId === null) $steamId = $this->myId;
		$http = new Client();
		$response = $http->get('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/', [
			'key' => $this->key,
			'steamids' => $steamId,
			'format' => 'json'
		]);
		$out = json_decode($response->body);
		debug($out);
	}


	/**
	 * Makes a request to the steam API
	 * Return PHP object of results
	 */
	private function makeRequest($url, $steamId = null) {
		if($steamId === null) $steamId = $this->myId;
		$http = new Client();
		$response = $http->get($url, [
			'key' => $this->key,
			'steamids' => $steamId,
			'format' => 'json'
		]);

		return json_decode($response->body);
	}
}
