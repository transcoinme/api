<?php
namespace transcoinme\merchant;

class Exchange extends Request {
	
	public function __construct($api_url){
		$this->url = $api_url;
		$this->type = 'exchange';
		$this->alowed_methods = ['process','getCalcData','getCalcComissions'];
	}
	
	public function __call($method,$args){
		if(!is_array($args)) return false;
		$args[1]['type'] = $this->type;
		$args[1] = json_encode($args[1]);
		return parent::__call($method, $args);
	}
 }
 
 ?>