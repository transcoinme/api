<?php
use transcoinme\api\Token as Token;

$apiUrl = ''; // Your API URL
$apiKey = ''; // Your API Key
$partnerId = ''; // Your partner id

//Include the merchant class
require_once __DIR__ .'/token.php';

//Create Merchant object
//API URL and Partner Api Key you may find on the Token settings page on our website
$token = new Token($apiUrl,$apiKey);

//And call method process with parameters. 
//Note type = 'token' will set in Token class:
// $this->type = 'token';
//So we have no needance to pass this parameter in input array
$merch->process(array(
	'partner_id'	=> $partnerId, // Your Partner ID
    'amount' 		=> 200, //transaction sum
	'pay_type'		=> 'bank', // Optional parameter, can take values
							   // "card" or "bank". The default is "card"
    'from'		    => 'EUR', //currency ID. Euro only.
	'email'			=> 'example@serve.com' // user email
    'wallet'		=> 'your wallet here', //  Your wallet
	'autoredirect'  => 1, // whether of autoredirect 1 - enable, 0 - disable
    'success_url'   => 'https://some-where.com/success',
    'fail_url'   	=> 'https://some-where.com/fail',
    'lang_code'   	=> 'en', // Request lang code (en,ru,lv,ee)
    ));
	
// Request result will store in result property of the token object
//so we should to display it or may be you want to do something with it
echo  $token->result.'<br><br>'; // or may be rerurn $token->result;

?>