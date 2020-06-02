<?php
use transcoinme\api\Exchange as Exchange;

//Include the Exchange class
require_once __DIR__ .'/exchange.php';

//Create Exchange object
//API URL and Your API Key you may find on the settings page on our website
$exch = new Exchange(<Your API URL>,<Your API Key>);

//First, we request data for calculating the transaction
$exch->getCalcData();
// Request result will store in result property of the Exchange object
echo  $exch->result.'<br><br>';

$exch->process(array(
    'partner_id'    => <Your ID>, //you may find on the settings page on our website
    'wallet' 		=> <Your wallet>, // be very careful and attentive - erroneous data 
									  //can lead to the access to your financial transactions by others
    'email'      	=> <Your email>,
    'method' 		=> 2, //method ID (you may get it from request getCalcData)
    'from'  		=> 2, //currency ID (you may get it from request getCalcData)
    'to'   			=> 3, //cryptocurrency ID (you may get it from request getCalcData)
    'amount'        => 200, //transaction sum
	'lang_code'		=> 'en', //language code (en,ru,lv,ee)
    ));
	
// Request result will store in result property of the Exchange object (will be overwriten upon repeated request)
echo  $exch->result.'<br><br>';

$exch->getCalcComissions(array(
    'method' 		=> 2, //method ID (you may get it from request getCalcData)
    'from'  		=> 2, //currency ID (you may get it from request getCalcData)
    'to'   			=> 3, //cryptocurrency ID (you may get it from request getCalcData)
    'amount'        => 200, //transaction sum (may be null)
    ));
	
// Request result will store in result property of the Exchange object (will be overwriten upon repeated request)
echo  $exch->result.'<br><br>';
?>