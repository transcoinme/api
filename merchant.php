<?php
namespace transcoinme\merchant;

require_once('request.php');

class Merchant extends Request {
	public $sign = '';
	public $access_key = '';
	
	public function __construct($api_url, $project_access_key){
		$this->url = $api_url;
		$this->type = 'merchant';
		$this->access_key = $project_access_key;
		$this->alowed_methods = ['process'];
	}
	
	public function __call($method,$args){
		if(!is_array($args)) return false;
		$args[1]['type'] = $this->type;
		$args[1] = json_encode($args[1]);
		$this->sign = md5($args[1].$this->access_key);
		return parent::__call($method, $args);
	}
 }
 
 ?>