<?php
session_start();
   if (!isset($_SESSION['login_user']))
   {
       header("Location: index.php");
       die();
   }
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$urlParts = explode('/', str_ireplace(array('http://', 'https://'), '', $url));
$newUrl = 'http://'.$_SERVER['HTTP_HOST']."/".$urlParts[1]."/index.php?controller=UserController&action=dashboard";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel ='stylesheet' href='CSS/style.css'>
    <link rel ='stylesheet' href='CSS/CaseList.css'>
    <link rel ='stylesheet' href='CSS/dashboard.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='Javascripts/createFormElements.js'></script>
    <script>
        </script>
  </head>
  <body>
    <div>


      <?php
 
      if($_SESSION['user_type']==2){
          include("includes/header.php");
      }
      else{
          include("includes/adminheader.php");
      }
     ?>

      <div class="container">
        <?php
          if(isset($_GET['manageFeedback'])) {
            //include 'Templates/manageFeedbackDashboard.php';
          } else if($_SESSION['user_type']==2){
            include 'Models/Caselist/Formlist.php';
            include 'Templates/ApplicantFormDashboard.php';
          } else {
            include 'Models/Caselist/Formlist.php';
            include 'Templates/manageFormsDashboard.php';
          }
          ?>
      </div>

    </div>

  </body>
</html>
