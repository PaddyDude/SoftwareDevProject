<?php
  include_once('Models/Caselist/FormList.php');
//applicant email will be obtained from session data
  $applicantCaselist = new Formlist();
  $applicantCaselist->setStatus('Pending');
  $applicantCaselist->setApplicantEmail($_SESSION['user_email'], true);
  $myCases = $applicantCaselist->fetchCases(false);
  //$cases = $applicantCaselist->getCases();

  //echo json_encode($myCaseList->cases);
?>

  <ul class="list-group col-md-2" style="margin-top:100px; margin-left: -60px; margin-right:60px;">
    </ul>

<div class="jumbotron col-md-8" id='dashboardJumbotron'>
  <div class='row'>
    <h2 class='col-xs-10'id='dashboardCaselistHdr'>Recently Submitted Forms</h2>
	
  </div>

  <?php include "FormsListTemplate.php" ?>
</div>
