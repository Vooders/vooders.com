<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use DOMDocument;

/**
 * API Controller
 *
 */
class ApiController extends AppController{

	/**************************\
	 * .com tracker functions *
	\**************************/


	public function dotComTotal(){
		$this->autoRender = false;
		$this->loadModel('DotComCounts');
		$i = $this->DotComCounts->find('all')->count();

		if($i){
			$latest = $this->DotComCounts->get($i);
			echo json_encode($latest->count);
		} else {
			echo '0';
		}
	}

	public function dotNetTotal(){
		$this->autoRender = false;
		$this->loadModel('DotNetCounts');
		$i = $this->DotNetCounts->find('all')->count();
		
		if($i){
			$latest = $this->DotNetCounts->get($i);
			echo json_encode($latest->count);
		} else {
			echo '0';
		}
	}

	/**
	 * Scrape the page at verisign and saves the .com and .net total to the database
	 */
	public function scrapeVerisign(){
		$this->autoRender = false;
		$ch = curl_init();
		curl_setopt_array($ch, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL            => 'https://www.verisign.com/en_US/channel-resources/domain-registry-products/zone-file/index.xhtml'
		]);
		$output = curl_exec($ch);
		curl_close($ch);

		$dom = new DOMDocument();
		@$dom->loadHTML($output);
		$count = ''; $net = '';

		foreach ($dom->getElementsByTagName('td') as $td) {
			if(($count === '') && (null !== $td->getAttribute('data-domainnamebasecomcount'))){
				$count = $td->getAttribute('data-domainnamebasecomcount');
				$count = str_replace(',', '', trim($count));
			} elseif(($net === '') && (null !== $td->getAttribute('data-domainnamebasenetcount'))){
				$net = $td->getAttribute('data-domainnamebasenetcount');
				$net = str_replace(',', '', trim($net));
			}
		}

		if($net !== ''){
			if($this->dotNetTotal() !== $net){
				$this->loadModel('DotNetCounts');
				$n = $this->DotNetCounts->newEntity();
				$n->count = $net;
				$n->created = Time::now();
				$this->DotNetCounts->save($n);
				debug($n);
			}
		}
		
		if($count !== ''){
			if($this->dotComTotal() !== $count){
				$this->loadModel('DotComCounts');
				$c = $this->DotComCounts->newEntity();
				$c->count = $count;
				$c->created = Time::now();
				$this->DotComCounts->save($c);
				debug($c);
			}
		}
	}
}
