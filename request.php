<?php
namespace transcoinme\api;

class Request {
	public $sign = '';
	public $access_key = '';
	public $url = '';
	public $headers = array();
	public $alowed_methods = array();
	public $type;
	public $result = false;
	
	public function __call($method,$args){
		if(empty($this->url)) return false;
		if(!in_array($method,$this->alowed_methods)) return false;
		
		$args[0]['type'] = $this->type;
		$args[0] = json_encode($args[0]);
		
		$this->sign = md5($args[0].$this->access_key);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		
		$this->url = $this->url .'/'.$method;
        $data = isset($args[0]) ? $args[0] : false;
		
		if ($data) curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				
		$this->headers[] = "Content-Type: application/json";

		if (!empty($this->sign)) {
			$this->headers[] = "Sign: {$this->sign}";
			$this->sign = '';
		}
		
		curl_setopt($curl, CURLOPT_URL, $this->url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_VERBOSE, 1);
		curl_setopt($curl, CURLOPT_HEADER, 1);

		// EXECUTE:
		$response = curl_exec($curl);
		// Then, after your curl_exec call:
		$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
		$header = substr($response, 0, $header_size);
		$this->result = substr($response, $header_size);	

		curl_close($curl);
		$this->headers = [];
		
		//$this->result = json_decode($this->result, true);
		
		if(!$this->result){
			return false;
		}

		return true;
	}
	
 }
 
 ?>