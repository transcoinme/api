<?php
use transcoinme\api\Exchange as Exchange;

$apiUrl = ''; // Your API URL
$apiKey = ''; // Your API Key
$partnerId = ''; // Your partner id

//Include the Exchange Direct class
require_once __DIR__ .'/direct.php';

//Create Exchange object
//API URL and Your API Key you may find on the settings page on our website
$direct = new Direct($apiUrl,$apiKey);

//First, we request data for calculating the transaction
$direct->calcDirectComissions(array(
	'partner_id'    => $partnerId, //you may find on the settings page on our website
	'from'  		=> 'EUR', //currency ID (you may get it from request getCalcData)
    'to'   			=> 'BTC', //cryptocurrency ID (you may get it from request getCalcData)
	'amount'        => 200, //transaction sum - optional parameter
));
// Request result will store in result property of the Exchange object (will be overwriten upon repeated request)
print_r($direct->result); 
echo '<br><br>';

$direct->process(array(
    'partner_id'    => $partnerId, //you may find on the settings page on our website
    'wallet' 		=> 'your wallet', // Crypto wallet must be transferred for cryptocurrency purchase transactions
									  // be very careful and attentive - erroneous data 
									  //can lead to the access to your financial transactions by others
    'from'  		=> 'EUR', //currency ID (you may get it from request getCalcData)
    'to'   			=> 'BTC', //cryptocurrency ID (you may get it from request getCalcData)
    'amount'        => 200, //transaction sum
	'autoredirect'  => 1, // whether of autoredirect 1 - enable, 0 - disable
    'success_url'   => 'https://some-where.com/success',
    'fail_url'   	=> 'https://some-where.com/fail',
    ));
	
// Request result will store in result property of the Exchange object (will be overwriten upon repeated request)
print_r($direct->result); 
echo '<br><br>';

//sell example
$direct->process(array(
    'partner_id'    => $partnerId, //you may find on the settings page on our website
    'from'  		=> 'BTC', //currency ID (you may get it from request getCalcData)
    'to'   			=> 'EUR', //cryptocurrency ID (you may get it from request getCalcData)
    'receive'       => 200, //transaction sum, which you want to receive
	'autoredirect'  => 1, // whether of autoredirect 1 - enable, 0 - disable
    'success_url'   => 'https://some-where.com/success',
    'fail_url'   	=> 'https://some-where.com/fail',
    ));
	
// Request result will store in result property of the Exchange object (will be overwriten upon repeated request)
print_r($direct->result); 
echo '<br><br>';

?>