<?php 
  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);
?>

<?php 
require_once('config.php');

\Stripe\Stripe::setApiKey($stripe['secret_key']);

 $server = 'den1.mysql6.gear.host';
 $username = 'softwareproject1';
 $password = 'testDB123!';
 $dbname = 'softwareproject1';
 $conn = new mysqli($server, $username, $password, $dbname) or die($conn->connect_error);
 $payerName = $conn->real_escape_string($_POST['payerName']);
 $email = $conn->real_escape_string($_POST['emailAddress']);
 $stripeToken = $conn->real_escape_string($_POST['stripeToken']);

/*
  $insertQuery = "INSERT INTO paymentInfo (fullName, email, stripeToken) VALUES ('$payerName', '$email', '$stripeToken')";
*/
  if(isset($payerName, $email, $stripeToken))
  {
    $result = mysqli_query($conn, $insertQuery);
  }
  else
  {
  	echo $payerName.' '.$email.' '.$stripeToken;
    echo ' Did not work';
  }
?>