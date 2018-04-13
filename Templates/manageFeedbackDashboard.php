<?php
  include '../Models/CaseList/ComplaintList.php';

  $complaintList = new ComplaintList();
  $complaintList->setUserDepartment('Fire');
  $complaintList->setStatus('Open');
  $complaintList->fetchCases();
  //echo json_encode($myCaseList->cases);
?>

<div class="jumbotron col-md-8 col-centered" id='dashboardJumbotron'>
  <div class='row'>
    <h2 class='col-xs-10'id='dashboardCaselistHdr'>Recently Submitted Forms</h2>
    <a href="FeedbackListPage.php?feedbackList" style=''>View more</a>
  </div>
  <?php include "FeedbackListTemplate.php" ?>
</div>
