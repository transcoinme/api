<?php
use transcoinme\api\Exchange as Exchange;
use transcoinme\api\Merchant as Merchant;

require_once __DIR__ .'/merchant.php';
require_once __DIR__ .'/exchange.php';

$merch = new Merchant('Your API URL','Your Project Access Key');

$merch->process(array(
    'project_id'    => 1,
    'amount' 		=> 200,
    'currency'      => 'EUR',
    'crypto_currency' => 'BTC',
    'order_number'  => 24,
    'description'   => 'Order Payment #24',
    'date'          => date('d-m-Y H:i:s'),
    ));
echo  $merch->result.'<br><br>';


$exch = new Exchange('Your API URL','Your API Key');

$exch->getCalcData(array(
	'partner_id'    => 'Your ID'
));
echo  $exch->result.'<br><br>';

$exch->process(array(
    'partner_id'    => 'Your ID',
    'wallet' 		=> 'Your wallet',
    'email'      	=> 'Your email',
    'method' 		=> 2,
    'from'  		=> 2,
    'to'   			=> 3,
    'amount'        => 200,
	'lang_code'		=> 'en',
    ));
echo  $exch->result.'<br><br>';

$exch->getCalcComissions(array(
	'partner_id'    => <Your ID>,
    'method' 		=> 2,
    'from'  		=> 2,
    'to'   			=> 3,
    'amount'        => 200,
    ));
echo  $exch->result.'<br><br>';
?>