<?php
    
    
/**
 * creates order and adds items
 * @param array $params
 * @return bool
 */
  function get_paypal_account($params)
  {
     include "../database/open_db.php";
    
     $query =  sprintf("INSERT INTO paypal_account set 
                          paypal_account.firstname = '%s',
                          paypal_account.lastname = '%s',
                          paypal_account.email = '%s',
                          paypal_account.country = '%s', 
                          paypal_account.address = '%s', 
                          paypal_account.city = '%s',
                         paypal_account.zip_code = '%s',
                         paypal_account.state = '%s',
                         paypal_account.status = '%s',
                         paypal_account.amount = '%s',
                         paypal_account.paypal_trans_id = '%s',
                          created_at = NOW() 
                  ", 
                     mysql_real_escape_string($params['first_name']),
                     mysql_real_escape_string($params['last_name']),
                     mysql_real_escape_string($params['payer_email']),
                     mysql_real_escape_string($params['address_country']),
                     mysql_real_escape_string($params['address_street']),
                     mysql_real_escape_string($params['address_city']),
                     mysql_real_escape_string($params['address_zip']),
                     mysql_real_escape_string($params['address_state']),
                     mysql_real_escape_string($params['payment_status']),
                     mysql_real_escape_string($params['mc_gross']),
                     mysql_real_escape_string($params['txn_id'])
                
                  );

    $result = mysql_query($query);
    if(!$result)
    {
       return false;
    }
  
     return true;

         include "../database/close_db.php";
  } 

 
// STEP 1: read POST data
 
// Reading POSTed data directly from $_POST causes serialization issues with array data in the POST.
// Instead, read raw POST data from the input stream. 
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
  $keyval = explode ('=', $keyval);
  if (count($keyval) == 2)
     $myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc')) {
   $get_magic_quotes_exists = true;
} 
foreach ($myPost as $key => $value) {        
   if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
        $value = urlencode(stripslashes($value)); 
   } else {
        $value = urlencode($value);
   }
   $req .= "&$key=$value";
}
 
 
// STEP 2: POST IPN data back to PayPal to validate
 
$ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
 
// In wamp-like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set 
// the directory path of the certificate as shown below:
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
if( !($res = curl_exec($ch)) ) {
    // error_log("Got " . curl_error($ch) . " when processing IPN data");
    curl_close($ch);
    exit;
}
curl_close($ch);
 
 
// STEP 3: Inspect IPN validation result and act accordingly
 
if (strcmp ($res, "VERIFIED") == 0) {
    // The IPN is verified, process it:
    // check whether the payment_status is Completed
    // check that txn_id has not been previously processed
    // check that receiver_email is your Primary PayPal email
    // check that payment_amount/payment_currency are correct
    // process the notification
 
    // assign posted variables to local variables
    $item_name = $_POST['item_name1'];
    $item_number = $_POST['item_number1'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];
	

        // update database
        
        include "connection.php";
        $query = "INSERT INTO payments (txnid,payment_amount,payment_status,itemid,createdtime)
    VALUES ('$tnx_id','$payment_amount','$payment_status','$item_number',$date)";
        $result = mysql_query($query) or die(mysql_error());

        

     

    // IPN message values depend upon the type of notification sent.
    // To loop through the &_POST array and print the NV pairs to the screen:
    foreach($_POST as $key => $value) {
      echo $key." = ". $value."<br>";
    }
} else if (strcmp ($res, "INVALID") == 0) {
    // IPN invalid, log for manual investigation
    echo "The response from IPN was: <b>" .$res ."</b>";
}
?>