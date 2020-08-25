<?php
use transcoinme\api\Merchant as Merchant;

//Include the merchant class
require_once __DIR__ .'/merchant.php';

//Create Merchant object
//API URL and Project Access Key you may find on the project settings page on our website
$merch = new Merchant(<Your API URL>,<Your Project Access Key>);

//And call method process with parameters. 
//Note type = 'merchant' will set in Merchant class:
// $this->type = 'merchant';
//So we have no needance to pass this parameter in input array
$merch->process(array(
    'project_id'    => 1, //your project ID. You may see it in project preferences
    'amount' 		=> 200, //transaction sum
    'currency'      => 'EUR', //currency name
    'crypto_currency' => 'BTC', //cryptocurrency name
    'order_number'  => 24, //  number of order in your store, must bee unique for project
    'description'   => 'Order Payment #24', //order comment
    'date'          => date('d-m-Y H:i:s'), //date, as usual now()
	'autoredirect'  => 1,
    'success_url'   => 'https://some-where.com/success',
    'fail_url'   	=> 'https://some-where.com/fail',
    ));
	
// Request result will store in result property of the merchant object
//so we should to display it or may be you want to do something with it
print_r($merch->result); 
echo '<br><br>'; // or may be rerurn $merch->result;
//get transaction status
$res = json_decode($merch->result, true);
$merch->merchant(array( // After request, result will be overwritten
    'project_id'    => 1, //your project ID. You may see it in project preferences
    'transaction_id'    => $res['id'], //Transaction ID.
    ));
print_r($merch->result); 
echo '<br><br>';

?>