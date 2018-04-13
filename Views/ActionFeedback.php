<?php
  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);

  //include('SoftwareDevProject-master 2/connection.php');

  //$conn = Connect();
  $server = 'den1.mysql6.gear.host';
  $username = 'softwareproject1';
  $password = 'testDB123!';
  $dbname = 'softwareproject1';
  $conn = new mysqli($server, $username, $password, $dbname) or die($conn->connect_error);
  $comments = $conn->real_escape_string($_POST['comments']);
  $query = "INSERT into table (placeholder) VALUES('"+$comments+"');";

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
    <script src='../Javascripts/createFormElements.js'></script>
    <script>
      $(document).ready(function(){
          document.getElementById('navBarHeader').innerHTML = 'Manage Feedback';
      });
    </script>
  </head>
  <body>
    <div>

      <?php include '../Templates/navbar.html'; ?>

      <div class="container">
        <?php
            include '../Templates/actionFeedback.php';
          ?>
      </div>

    </div>

  </body>
</html>