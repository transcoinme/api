See detailed manual here  http://transcoinme.github.io/apidocs/

# Merchant Example

```php
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
    'project_id'      => 1, //your project ID. You may see it in project preferences
    'amount'          => 200, //transaction sum
    'currency'        => 'EUR', //currency name
    'crypto_currency' => 'BTC', //cryptocurrency name
    'order_number'    => 24, //  number of order in your store
    'description'     => 'Order Payment #24', //order comment
    'date'            => date('d-m-Y H:i:s'), //date, as usual now()
    ));
    
// Request result will store in result property of the merchant object
//so we should to display it or may be you want to do something with it
print_r($merch->result); 
echo '<br><br>'; // or may be rerurn $merch->result;

?>
```

# Exchange examples

```php
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
print_r($exch->result); 
echo '<br><br>';

$exch->process(array(
    'partner_id'    => <Your ID>, //you may find on the settings page on our website
    'wallet'        => <Your wallet>, // be very careful and attentive - erroneous data 
                                      //can lead to the access to your financial transactions by others
    'email'         => <Your email>,
    'method'        => 2, //method ID (you may get it from request getCalcData)
    'from'          => 2, //currency ID (you may get it from request getCalcData)
    'to'            => 3, //cryptocurrency ID (you may get it from request getCalcData)
    'amount'        => 200, //transaction sum
    'lang_code'     => 'en', //language code (en,ru,lv,ee)
    ));
    
// Request result will store in result property of the Exchange object (will be overwriten upon repeated request)
print_r($exch->result); 
echo '<br><br>';

$exch->getCalcComissions(array(
    'method'        => 2, //method ID (you may get it from request getCalcData)
    'from'          => 2, //currency ID (you may get it from request getCalcData)
    'to'            => 3, //cryptocurrency ID (you may get it from request getCalcData)
    'amount'        => 200, //transaction sum (may be null)
    ));
    
// Request result will store in result property of the Exchange object (will be overwriten upon repeated request)
print_r($exch->result); 
echo '<br><br>';
?>
```