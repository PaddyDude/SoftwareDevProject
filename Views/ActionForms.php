<?php
  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);

  //include('/connection.php');

  //$conn->Connect();
  $server = 'den1.mysql6.gear.host';
  $username = 'softwareproject1';
  $password = 'testDB123!';
  $dbname = 'softwareproject1';
  $conn = new mysqli($server, $username, $password, $dbname) or die($conn->connect_error);
  $msg = 'Please fill all required fields before submitting!';

  $approve = "";
  $reject = "";
  $pd_appr = "";
  $fd_appr = "";
  $comment = "";
  $caseId = "";
  $hasFire = 0;
  $hasPolice = 0;
  $hasVillage = 0;
  $hasDoctor = 0;

  //if(isset($_POST['approve'])) {
    $approve = $conn->real_escape_string($_POST['approve']);
  //}

  if(isset($_POST['reject'])) {
    $reject = $conn->real_escape_string($_POST['reject']);
  }

  if(isset($_POST['pd_appr'])) {
    $approve = $pd_appr = $conn->real_escape_string($_POST['pd_appr']);
  }

  if(isset($_POST['fd_appr'])) {
    $fd_appr = $conn->real_escape_string($_POST['fd_appr']);
  }

  if(isset($_POST['comment'])) {
    $comment = $conn->real_escape_string($_POST['comment']);
  }

  if(isset($_GET['caseId'])) {
    $caseId = $conn->real_escape_string($_GET['caseId']);
  }


    if(isset($_GET['hasVillage'])) {
      $hasVillage = $conn->real_escape_string($_GET['hasVillage']);
    }

    if(isset($_GET['hasFire'])) {
      $hasFire = $conn->real_escape_string($_GET['hasFire']);
    }

    if(isset($_GET['hasPolice'])) {
      $hasPolice = $conn->real_escape_string($_GET['hasPolice']);
    }

    if(isset($_GET['hasDoctor'])) {
      $hasDoctor = $conn->real_escape_string($_GET['hasDoctor']);
    }

  $approveQuery = "UPDATE film_applications SET status = '$approve', pd_appr = '$pd_appr', fd_appr= '$fd_appr', comment = '$comment'
    WHERE caseId = ".$caseId.";";

  $rejectQuery = "UPDATE film_applications SET status = '$reject' WHERE caseId = ".$caseId.";";

  if(isset($_POST['submit']))
  {
    if($approve == 'Approved') {
       $result = mysqli_query($conn, $approveQuery);
     }
     elseif($reject == 'Rejected') {
      $result = mysqli_query($conn, $rejectQuery);
     }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel ='stylesheet' href='../CSS/style.css'>
    <link rel ='stylesheet' href='../CSS/ActionForms.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../JS/actionForms.js"></script>
    <script>
      $(document).ready(function(){
        document.getElementById('navBarHeader').innerHTML = 'Manage Forms';
      });
    </script>
  </head>
  <body>
    <div>

      <?php include '../Templates/navbar.html'; ?>

      <div class="container">
        <?php
            include '../Templates/actionForms.php';
          ?>
      </div>

    </div>
  </body>
</html>
