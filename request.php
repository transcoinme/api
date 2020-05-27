<?php
namespace transcoinme\merchant;

class Request {
	public $url = '';
	public $headers = array();
	public $alowed_methods = array();
	public $type;
	public $result = false;
	
	public function __call($method,$args){
		
		if(empty($this->url)) return false;
		if(!in_array($method,$this->alowed_methods)) return false;
		$curl = curl_init();
		
		$request_type = isset($args[0]) ? $args[0] : 'GET';
		$this->url = $this->url .'/'.$method;
        $data = isset($args[1]) ? $args[1] : false;
		
		switch ($request_type){
			case "POST":
				curl_setopt($curl, CURLOPT_POST, 1);
				if ($data)
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;
			case "GET":
				curl_setopt($curl, CURLOPT_POST, "GET");
				if ($data)
					$this->url = sprintf("%s?%s", $this->url, http_build_query($data));
				break;
			case "PUT":
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
				if ($data)
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;
			case "DELETE":
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
				if ($data)
					$this->url = sprintf("%s?%s", $this->url, http_build_query($data));
				break;
			default:
				if ($data)
					$this->url = sprintf("%s?%s", $this->url, http_build_query($data));
				break;
        }
		
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
		
		if(!$this->result){
			return false;
		}

		//$result = json_decode($result, true);
		return true;
	}
	
 }
 
 ?>