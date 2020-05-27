<?php
namespace transcoinme\api;

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

$exch->getCalcData();
echo  $exch->result.'<br><br>';

$exch->process(array(
    'partner_id'    => 'Your ID',
    'wallet' 		=> 'Your wallet',
    'email'      	=> 'Your email',
    'method' 		=> 2,
    'from'  		=> 2,
    'to'   			=> 3,
    'amount'        => 200,
    ));
echo  $exch->result.'<br><br>';

$exch->getCalcComissions(array(
    'method' 		=> 2,
    'from'  		=> 2,
    'to'   			=> 3,
    'amount'        => 200,
    ));
echo  $exch->result.'<br><br>';
?>