<?php
  include '../Controllers/CaseList/FormList.php';

  $myCaseList = new Formlist();

  /*if(isset($_GET['statusTextBox'])) {
    $myCaseList->setStatus($_GET['statusTextBox']);
  }

  if(isset($_GET['email'])) {
    $myCaseList->setApplicantEmail($_GET['email']);
  }*//*
  if(isset($_GET['startDate'])) {
    $myCaseList->setStartDate($_GET['startDate']);
  }
  if(isset($_GET['completionDate'])) {
    $myCaseList->setCompletionDate($_GET['completionDate']);
  }
*/


  $myCaseList->fetchCases();
  echo json_encode($myCaseList->cases);
  //echo"here";
  /*echo"<form action='../Views/ListPage.php' id='caselistrouteform'>
    <input id='caselistrouteValue' type='hidden' name='cases' value ='".json_encode($myCaseList->cases)."'>
  </form>
  <script src=' https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script>
  $(document).ready(function(){
      document.getElementById('caselistrouteform').submit();
   });
  </script>
  ";*/
?>
