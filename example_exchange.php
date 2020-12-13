<?php
use transcoinme\api\Exchange as Exchange;

$apiUrl = ''; // Your API URL
$apiKey = ''; // Your API Key
$partnerId = ''; // Your partner id

//Include the Exchange class
require_once __DIR__ .'/exchange.php';

//Create Exchange object
//API URL and Your API Key you may find on the settings page on our website
$exch = new Exchange($apiUrl, $apiKey);

//First, we request data for calculating the transaction
$exch->getCalcData(array(
	'partner_id'    => $partnerId, //you may find on the settings page on our website
));
// Request result will store in result property of the Exchange object (will be overwriten upon repeated request)
print_r($exch->result); 
echo '<br><br>';

$exch->process(array(
    'partner_id'    => $partnerId, //you may find on the settings page on our website
    'wallet' 		=> 'Your wallet', // be very careful and attentive - erroneous data 
									  //can lead to the access to your financial transactions by others
    'email'      	=> 'user@email.com', // users email
    'method' 		=> 'card', //method ID (you may get it from request getCalcData)
    'from'  		=> 'EUR', //currency ID (you may get it from request getCalcData)
    'to'   			=> 'BTC', //cryptocurrency ID (you may get it from request getCalcData)
    'amount'        => 200, //transaction sum
	'autoredirect'  => 1, // whether of autoredirect 1 - enable, 0 - disable
    'success_url'   => 'https://some-where.com/success',
    'fail_url'   	=> 'https://some-where.com/fail',
	'lang_code'		=> 'en', //language code (en,ru,lv,ee)
    ));
	
// Request result will store in result property of the Exchange object (will be overwriten upon repeated request)
print_r($exch->result); 
echo '<br><br>';

$res = json_decode($exch->result, true);
$exch->exchange(array( // After request, result will be overwritten
    'partner_id'    => $partnerId, //you may find on the settings page on our website
    'exchange_id'    => $res['exchange_data']['id'], //Transaction ID.
    ));
print_r($exch->result); 
echo '<br><br>';

$exch->getCalcComissions(array(
	'partner_id'    => $partnerId, //you may find on the settings page on our website
    'method' 		=> 'card', //method ID (you may get it from request getCalcData)
    'from'  		=> 'EUR', //currency ID (you may get it from request getCalcData)
    'to'   			=> 'BTC', //cryptocurrency ID (you may get it from request getCalcData)
    'amount'        => 200, //transaction sum (may be null)
    ));
	
// Request result will store in result property of the Exchange object (will be overwriten upon repeated request)
print_r($exch->result); 
echo '<br><br>';
?>