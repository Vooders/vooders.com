<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * API Controller
 *
 */
class ApiController extends AppController{

	/**
	 * .com tracker functions
	 */
	public function scrapeDotCom(){
		$ch = curl_init();
		curl_setopt_array($ch, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL            => 'https://www.verisign.com/en_US/channel-resources/domain-registry-products/zone-file/index.xhtml'
		]);

		$output = curl_exec($ch);
		curl_close($ch);
		debug($output);
	}
}
