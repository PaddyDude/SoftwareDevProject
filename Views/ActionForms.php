<?php


    $server = 'den1.mysql6.gear.host';
	$username = 'softwareproject1';
    $password = 'testDB123!';
    $dbname = 'softwareproject1';
    $conn = new mysqli($server, $username, $password, $dbname) or die($conn->connect_error);
    $msg = 'Please fill all required fields before submitting!';

	$selectQuery="";

  if(isset($_POST['submit'])) {
    
     if(isset($_POST['approve'])) {
       $approve = $_POST['approve'];
     }
     if(isset($_POST['reject'])) {
       $reject = $_POST['reject'];
     }
     if(isset($_POST['pd_appr'])) {
       $pd_appr = $_POST['pd_appr'];
      
     }
     if(isset($_POST['fd_appr'])) {
       $fd_appr = $_POST['fd_appr'];
      
     }
     if(isset($_POST['comment'])) {
       $comment = $_POST['comment'];
     }
     if(isset($_POST['caseId'])) {
       $caseId = $_POST['caseId'];
     }
 

    $approveQuery = "";
	
    $rejectQuery = "UPDATE film_applications SET status = 'Rejected' WHERE caseId = ".$caseId." ;";
	
    $department = $_SESSION['user_dept'];
    
    if($department == "Police") {
      $approveQuery = "UPDATE film_applications SET pd_appr = 1 WHERE caseId = ".$caseId." ;";
    } else if($department === "Fire") {
		$approveQuery = "UPDATE film_applications SET fd_appr = 1 WHERE caseId = ".$caseId.";";
    }  else if($_SESSION['user_type'] == 1) {

		$newResult = $conn->query("SELECT pd_appr, fd_appr FROM film_applications WHERE caseId = ".$caseId." LIMIT 1");
	 	$row = $newResult->fetch_assoc();
	 	$policeAppr = $row['pd_appr'];
     	$fireAppr = $row['fd_appr'];
     
      	if($policeAppr == 1 && $fireAppr == 1) {
           $approveQuery = "UPDATE film_applications SET status = 'Approved' WHERE caseId = ".$caseId." ;";
      } else {
       	echo "<script>alert('You have to wait until the application is approved by the fire and police departments')</script>"; 
       }

    }

    if($approve == 'Approved') {
      
       $result = mysqli_query($conn, $approveQuery);
       echo"<script>window.location = 'index.php?controller=UserController&action=dashboard'</script>";
     
     } else {
   		//$result = mysqli_query($conn, $rejectQuery);
        echo"<script>window.location = 'index.php?controller=UserController&action=dashboard'</script>";
    }
      
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel ='stylesheet' href='CSS/style.css'>
    <link rel ='stylesheet' href='CSS/ActionForms.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="Javascripts/actionForms.js"></script>
    <script>
     $(document).ready(function(){
       if($('#decider').val() === 'Police'){
         $('#fd_appr').attr("disabled", true);
         $('#pd_appr').attr("disabled", true);
        // $('#appr').attr("disabled", true);
        // $('#rej').attr("disabled", true);
       }
       else if($('#decider').val() === 'Fire'){
          $('#fd_appr').attr("disabled", true);
         $('#pd_appr').attr("disabled", true);
         //$('#appr').attr("disabled", true);
        // $('#rej').attr("disabled", true);
       }
	   else if($('#decider').val() !== 'Fire' || $('#decider').val() !== 'Police'){
         $('#pd_appr').attr("disabled", true);
         $('#fd_appr').attr("disabled", true);
       }
     });
   </script>
  </head>
  <body>
    <div>

      <?php include 'includes/adminheader.php'; ?>

      <div class="container">
        <?php
            include 'Templates/actionForms.php';
          ?>
      </div>
    </div>
  </body>



</html>



