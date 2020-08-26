<?php
namespace transcoinme\api;

require_once __DIR__ .'/request.php';

class Direct extends Request {
	
	public function __construct($api_url, $user_api_key){
		$this->url = $api_url;
		$this->type = 'direct';
		$this->access_key = $user_api_key;
		$this->alowed_methods = ['process','calcDirectComissions'];
	}
 }
 
 ?>