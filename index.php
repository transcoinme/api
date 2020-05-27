<?php
namespace transcoinme\merchant;

require_once('merchant.php');
require_once('exchange.php');

$merch = new Merchant('my.merchant.transcoin.me/api','vAEfBkJfIRASDDFraSC');

$merch->process("POST",array(
    'project_id'    => 1,
    'amount' 		=> 200,
    'currency'      => 'EUR',
    'crypto_currency' => 'BTC',
    'order_number'  => 24,
    'description'   => 'Order Payment #24',
    'date'          => date('d-m-Y H:i:s'),
    ));
echo  $merch->result.'<br><br>';


$exch = new Exchange('my.merchant.transcoin.me/api');

$exch->process("POST",array(
    'partner_id'    => 2125,
    'wallet' 		=> '15DQ4VCLvidYRsPjVKwxgntFrta16Kgikv',
    'email'      	=> 'kon.peter.ua@gmail.com',
    'method' 		=> 2,
    'from'  		=> 2,
    'to'   			=> 3,
    'sum'           => 200,
    'order_url'     => 'http:\/\/my.merchant.transcoin.me\/ru\/transactions\/exchange\/2125\/',
    ));
echo  $exch->result.'<br><br>';

$exch->getCalcData("POST");
echo  $exch->result.'<br><br>';

$exch->getCalcComissions("POST",array(
    'method' 		=> 2,
    'from'  		=> 2,
    'to'   			=> 3,
    'sum'           => 200,
    ));
echo  $exch->result.'<br><br>';
?>