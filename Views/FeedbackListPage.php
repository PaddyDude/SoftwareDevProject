<?php
include 'Models/CaseList/ComplaintList.php';
$complaintList = new ComplaintList();
$complaintList->setStatus('Open');
$complaintList->setUserDepartment('Fire');
$complaintList->fetchCases();
//echo json_encode($myCaseList->cases);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset='utf-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
   <link rel ='stylesheet' href='CSS/style.css'>
   <link rel = 'stylesheet' href='CSS/CaseList.css'>
   <link rel = 'stylesheet' href='CSS/dashboard.css'
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
   <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <script>
     $(document).ready(function(){
         document.getElementById('navBarHeader').innerHTML = 'List Page';

      var today = new Date();
      var dd = today.getDate()+1;
      var mm = today.getMonth()+1; //January is 0!

      var yyyy = today.getFullYear();
      if(dd<10){
        dd='0'+dd;
      }
      if(mm<10){
        mm='0'+mm;
      }

      var today = yyyy+'-'+mm+'-'+dd;

      var oldMonth = new Date();
      var mm = oldMonth.getMonth();
      if(mm<10){
        mm='0'+mm;
      }
      dd=dd-01;
      var lastMonth = yyyy+'-'+mm+'-'+dd;
      //alert(today);
      document.getElementById('submittedBefore').value=today;
      document.getElementById('submittedAfter').value=lastMonth;

      //alert(today);
      });
   </script>
 </head>
 <body>

<?php include 'Templates/navbar.html'; ?>

<?php include 'Templates/CaseFilters.php'; ?>

<div class="jumbotron col-md-8 col-centered" id='dashboardJumbotron'>
  <div class='row'>
    <h2 class='col-xs-10'id='dashboardCaselistHdr'>Recently Submitted Forms</h2>
  </div>
  <?php include "Templates/FeedbackListTemplate.php" ?>
</div>

 </body>
 </html>
