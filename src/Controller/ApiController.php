<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;
use DOMDocument;

/**
 * API Controller
 */
class ApiController extends AppController{

							/**************************\
============================ *   Scraper functions    * ============================
							\**************************/

	/**
	 * Splits up the csv file into useable chuncks
	 */						
	public function splitFile(){
		// Get the file
		$file = file_get_contents(WWW_ROOT .'scraper/test.csv');
		// Split the lines
		$pow = explode(PHP_EOL, $file);
		$set = []; // Will hold lines as arrays
		// Split the lines into arrays
		foreach ($pow as $line) {
			$set[] = explode(';', $line);
		}
		
		$categories = []; // Array to hold the categories
		$productCategories = [];
		// Split the set into products and their categories
		foreach ($set as $product) {
			$boom = explode('|', $product[2]);
			foreach ($boom as $category) {
				$productCategories[$product[3]][] = $category;
				$categories[] = $category;
			}
		}
debug(sizeof(array_unique($categories)).'/'.sizeof($categories));
debug($productCategories);
debug($set);die;
	}

							/**************************\
============================ * .com tracker functions * ============================
							\**************************/

	/**
	 * Returns the total .com domians
	 */
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

	/**
	 * Returns the .coms registered today
	 */
	public function todaysDotComs(){
		$this->autoRender = false;
		$this->loadModel('DotComCounts');

		$i = $this->DotComCounts->find('all')->count();

		if($i > 1){
			$today = $this->DotComCounts->get($i);
			$yesterday = $this->DotComCounts->get($i-1);

			echo json_encode([($today->count - $yesterday->count) => $yesterday->created]);
		}
	}

							/**************************\
============================ * .net tracker functions * ============================ 
							\**************************/

	/**
	 * Returns the total .net domians
	 */
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
	 * Returns the .nets registered today
	 */
	public function todaysDotNets(){
		$this->autoRender = false;
		$this->loadModel('DotNetCounts');

		$i = $this->DotNetCounts->find('all')->count();

		if($i > 1){
			$today = $this->DotNetCounts->get($i);
			$yesterday = $this->DotNetCounts->get($i-1);

			echo json_encode([($today->count - $yesterday->count) => $yesterday->created]);
		}
	}

							/**************************\
============================ *   scraping functions   * ============================
							\**************************/

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

							/**************************\
============================ *   security functions   * ============================
							\**************************/
	/**
	 * Allow all functions to be called without auth
	 */
	public function beforeFilter(Event $event){
		parent::beforeFilter($event);
        $this->Auth->allow(['scrapeVerisign', 'todaysDotNets', 'todaysDotComs', 'dotNetTotal', 'dotComTotal', 'splitFile']);
    }
}
