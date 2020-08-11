<?php
use transcoinme\api\Token as Token;

//Include the merchant class
require_once __DIR__ .'/token.php';

//Create Merchant object
//API URL and Partner Api Key you may find on the Token settings page on our website
$token = new Token(<Your API URL>,<Your Partner Api Key>);

//And call method process with parameters. 
//Note type = 'token' will set in Token class:
// $this->type = 'token';
//So we have no needance to pass this parameter in input array
$merch->process(array(
	'partner_id'	=> 23, // Your Partner ID
    'amount' 		=> 200, //transaction sum
	'pay_type'		=> 'bank', // Optional parameter, can take values
							   // "card" or "bank". The default is "card"
    'from'		    => '2', //currency ID. Euro only.
	'email'			=> 'example@serve.com' // user email
    'wallet'		=> <'your wallet here'>, //  Your wallet
    'order_url'   	=> 'https://some-where.com', // Request URL on your site
	'autoconvert'   => 1,
    'success_url'   => 'https://some-where.com/success',
    'fail_url'   	=> 'https://some-where.com/fail',
    'lang_code'   	=> 'en', // Request lang code (en,ru,lv,ee)
    ));
	
// Request result will store in result property of the token object
//so we should to display it or may be you want to do something with it
echo  $token->result.'<br><br>'; // or may be rerurn $token->result;

?>