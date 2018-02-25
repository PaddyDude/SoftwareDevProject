<?php
  include '../Models/CaseList/FormList.php';

  $myCaseList = new Formlist();

  if(isset($_GET['statusTextBox'])) {

    $myCaseList->setStatus($_GET['statusTextBox']);
  }

  if(isset($_GET['email'])) {
    $myCaseList->setApplicantEmail($_GET['email']);
  }
  if(isset($_GET['startDate'])) {
    $myCaseList->setStartDate($_GET['startDate']);
  }
  if(isset($_GET['completionDate'])) {
    $myCaseList->setCompletionDate($_GET['completionDate']);
  }
  if(isset($_GET['caseId'])) {
    if($_GET['caseId'] != '' ) {
      $myCaseList->setCaseId($_GET['caseId']);
    }
  }
  if(isset($_GET['typeTextBox'])) {
    $myCaseList->setCaseType($_GET['typeTextBox']);
  }
  if(isset($_GET['statusDropDown'])) {
    $myCaseList->setStatus($_GET['statusDropDown']);
  }
  if(isset($_GET['submittedBefore'])) {
    $myCaseList->setBefore($_GET['submittedBefore']);
  }
  if(isset($_GET['submittedAfter'])) {
    $myCaseList->setAfter($_GET['submittedAfter']);
  }


  $myCaseList->fetchCases();
//  json_encode($myCaseList->cases);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset='utf-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
   <link rel ='stylesheet' href='../CSS/style.css'>
   <link rel ='stylesheet' href='../CSS/CaseList.css'>
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
   <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <script>
     $(document).ready(function(){
         document.getElementById('navBarHeader').innerHTML = 'List Page';

         /*$.post("../Routes/CaseListRoute.php", function(data, status){
             alert("Data: " + data + "\nStatus: " + status);
         });*/

    /*  $("#singlebutton").click(function(){

      $.ajax({
      url: '../Routes/CaseListRoute.php',
      type: 'GET',
      error: function(xhr, status, error) {
          alert("Error Getting Data");
        //  alert(xhr.responseText);
      },
      success: function(results) {
          var objJson = JSON.parse(results);

      }
  });
});*/
      });
   </script>
 </head>
 <body>

<?php include '../Templates/navbar.html'; ?>

<?php include '../Templates/CaseFilters.php'; ?>

<div class='container'>
  <?php include "../Templates/FormsListTemplate.php" ?>
</div>

 </body>
 </html>
