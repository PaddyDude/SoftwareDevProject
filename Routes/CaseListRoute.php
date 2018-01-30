<?php
  include '../Controllers/CaseList/FormList.php';

  $myCaseList = new Formlist();

  if(isset($_GET['status'])) {
    $caseList->setStatus($_GET['status']);
  }
  if(isset($_GET['email'])) {
    $caseList->setApplicantEmail($_GET['email']);
  }
  if(isset($_GET['startDate'])) {
    $caseList->setStartDate($_GET['startDate']);
  }
  if(isset($_GET['completionDate'])) {
    $caseList->setCompletionDate($_GET['completionDate']);
  }

  $myCaseList->fetchCases();

  //echo "here";
?>
