<?php
namespace transcoinme\api;

require_once __DIR__ .'/request.php';

class Token extends Request {
	public $sign = '';
	public $access_key = '';
	
	public function __construct($api_url, $partner_api_key){
		$this->url = $api_url;
		$this->type = 'token';
		$this->access_key = $partner_api_key;
		$this->alowed_methods = ['process'];
	}
 }
 
 ?>