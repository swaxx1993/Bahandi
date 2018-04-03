<?php 
session_start();
if(isset($_SESSION['public']))
	$id=$_SESSION['id2'];
{ 
	
?>
<?php
include('connection.php');
if ($_POST['submit2'])

{
	
  $queryCheck = "INSERT into confirm_orders SELECT * FROM cart where costumerid='$id'";
		 $resultCheck = mysql_query($queryCheck);
		 $queryCheck = "DELETE FROM cart where costumerid='$id'";
		 $resultCheck = mysql_query($queryCheck);
			  mysql_close($connect); 
}
?>


<?php
// Database variables

$host = "localhost"; //database location

$user = "root"; //database username

$pass = ""; //database password

$db_name = "thesis"; //database name

 

// PayPal settings

$paypal_email = 'kevinolimba321@gmail.com';

$return_url = 'http://localhost/thesis/thank.php';

$cancel_url = 'http://localhost/thesis/costumer.php';

$notify_url ='http://localhost/thesis/payment_ipn.php';

$total=$_GET['total'];
$item=$_GET['item'];
$item_name = 'Total Amount';

$item_amount = $total;

 

// Include Functions

include("functions.php");

 

//Database Connection

$link = mysql_connect($host, $user, $pass);

mysql_select_db($db_name);

 

// Check if paypal request or response

if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){

 

    // Firstly Append paypal account to querystring

    $querystring .= "?business=".urlencode($paypal_email)."&";

 

    // Append amount& currency (£) to quersytring so it cannot be edited in html

 

    //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.

    $querystring .= "item_name=".urlencode($item_name)."&";

    $querystring .= "amount=".urlencode($item_amount)."&";

 

    //loop for posted values and append to querystring

    foreach($_POST as $key => $value){

        $value = urlencode(stripslashes($value));

        $querystring .= "$key=$value&";

    }

 

    // Append paypal return addresses

    $querystring .= "return=".urlencode(stripslashes($return_url))."&";

    $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";

    $querystring .= "notify_url=".urlencode($notify_url);

 

    // Append querystring with custom field

    //$querystring .= "&custom=".USERID;

 

    // Redirect to paypal IPN

    header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);

    exit();

 

}else{

    // Response from PayPal

}

// Database variables

$host = "localhost"; //database location

$user = "root"; //database username

$pass = ""; //database password

$db_name = "thesis"; //database name

 

// PayPal settings

$paypal_email = 'kevinolimba321@gmail.com';

$return_url = 'http://localhost/thesis/thank.php';

$cancel_url = 'http://localhost/thesis/costumer.php';

$notify_url ='http://localhost/thesis/payment_ipn.php';
 

$item_name = 'Total Amount';

$item_amount = $total;

// Include Functions

include("functions.php");

 

//Database Connection

$link = mysql_connect($host, $user, $pass);

mysql_select_db($db_name);

 
// Check if paypal request or response

if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){

    // Request from step 3

}else{

 

    // Response from Paypal

 

    // read the post from PayPal system and add 'cmd'

    $req = 'cmd=_notify-validate';

    foreach ($_POST as $key => $value) {

        $value = urlencode(stripslashes($value));

        $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix

        $req .= "&$key=$value";

    }


    // assign posted variables to local variables

    $data['item_name']          = $_POST['item_name'];

    $data['item_number']        = $_POST['item_number'];

    $data['payment_status']     = $_POST['payment_status'];

    $data['payment_amount']     = $_POST['mc_gross'];

    $data['payment_currency']   = $_POST['mc_currency'];

    $data['txn_id']             = $_POST['txn_id'];

    $data['receiver_email']     = $_POST['receiver_email'];

    $data['payer_email']        = $_POST['payer_email'];

    $data['custom']             = $_POST['custom'];

 

    // post back to PayPal system to validate

    $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";

    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";

    $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

 

    $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

 

    if (!$fp) {

        // HTTP ERROR

    } else {

                mail('ash@evoluted.net', '0', '0');

        fputs ($fp, $header . $req);

        while (!feof($fp)) {

            $res = fgets ($fp, 1024);

            if (strcmp ($res, "VERIFIED") == 0) {

 

                // Validate payment (Check unique txnid & correct price)

                $valid_txnid = check_txnid($data['txn_id']);

                $valid_price = check_price($data['payment_amount'], $data['item_number']);

                // PAYMENT VALIDATED & VERIFIED!

                if($valid_txnid && $valid_price){

                    $orderid = updatePayments($data);

                    if($orderid){

                       $sql = mysql_query("INSERT INTO `payments` (txnid, payment_amount, payment_status, itemid, createdtime) VALUES (

                '".$data['txn_id']."' ,

                '".$data['payment_amount']."' ,

                '".$data['payment_status']."' ,

                '".$data['item_number']."' ,

                '".date("Y-m-d H:i:s")."'

                )", $link);

    return mysql_insert_id($link);
                    }
                }else{

                    // Payment made but data has been changed

                    echo "<script>alert('ok')</script><meta http-equiv='refresh' content='0;url=checkout.php'>";

                }

 

            }else if (strcmp ($res, "INVALID") == 0) {

 

                // PAYMENT INVALID & INVESTIGATE MANUALY!

                // E-mail admin or alert user

            }

        }

    fclose ($fp);
    }
}

?>
<?php

}
?>