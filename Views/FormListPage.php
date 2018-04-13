<?php
  include '../Models/CaseList/FormList.php';

  $thisCaseList = new Formlist();
  //set to session variable
  $thisCaseList->setUserDepartment('Police');

  $applicantType = 1;
  //$applicantType is user
  if($applicantType == 1) {
    //set to session variable email
    //will filter all results by user email
  }


  if(isset($_GET['statusTextBox'])) {
    $thisCaseList->setStatus($_GET['statusTextBox']);
  } else {
    $thisCaseList->setStatus('');
  }

  if(isset($_GET['email'])) {
    $thisCaseList->setApplicantEmail($_GET['email'], false);
  }
  if(isset($_GET['startDate'])) {
    $thisCaseList->setStartDate($_GET['startDate']);
  }
  if(isset($_GET['completionDate'])) {
    $thisCaseList->setCompletionDate($_GET['completionDate']);
  }
  if(isset($_GET['caseId'])) {
    if($_GET['caseId'] != '' ) {
      $thisCaseList->setCaseId($_GET['caseId']);
    }
  }
  if(isset($_GET['typeTextBox'])) {
    $thisCaseList->setCaseType($_GET['typeTextBox']);
  }
  if(isset($_GET['statusDropDown'])) {
    $thisCaseList->setStatus($_GET['statusDropDown']);
  }
  if(isset($_GET['submittedBefore'])) {
    $thisCaseList->setBefore($_GET['submittedBefore']);
  }
  if(isset($_GET['submittedAfter'])) {
    $thisCaseList->setAfter($_GET['submittedAfter']);
  }

  $myCases = $thisCaseList->fetchCases($false);
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

<?php include '../Templates/navbar.html'; ?>

<?php include '../Templates/CaseFilters.php'; ?>

<div class='container'>
  <?php include "../Templates/FormsListTemplate.php" ?>
</div>

 </body>
 </html>
