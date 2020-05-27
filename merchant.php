<?php
namespace transcoinme\api;

require_once __DIR__ .'/request.php';

class Merchant extends Request {
	public $sign = '';
	public $access_key = '';
	
	public function __construct($api_url, $project_access_key){
		$this->url = $api_url;
		$this->type = 'merchant';
		$this->access_key = $project_access_key;
		$this->alowed_methods = ['process'];
	}
 }
 
 ?>