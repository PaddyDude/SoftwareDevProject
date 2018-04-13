<?php
  include '../Models/CaseList/FormList.php';

//applicant email will be obtained from session data
  $applicantCaselist = new Formlist();
  $applicantCaselist->setStatus('Pending');
  $applicantCaselist->setApplicantEmail('first@fake.com', true);
  $myCases = $applicantCaselist->fetchCases($false);
  //$cases = $applicantCaselist->getCases();

  //echo json_encode($myCaseList->cases);
?>

  <script> $(document).ready(function(){
  /*  $('.manageTab').remove();
    var dashboardLink = document.createElement("a");
    $('#undrHdr').append(dashboardLink)*/
});</script>

  <ul class="list-group col-md-2" style="margin-top:100px; margin-left: -60px; margin-right:60px;">
    <li class="list-group-item btn btn-primary"> <a class='listLink' href="http://www.village.mamaroneck.ny.us/Pages/index" style=''>Village Home</a></li>
    <li class="list-group-item btn btn-primary"> <a class='listLink' href="" style=''>Contact Us</a></li>
    <li class="list-group-item btn btn-primary"> <a class='listLink'href="../Views/ActionFeedback.php" style=''>Leave Feedback</a></li>
  </ul>

<div class="jumbotron col-md-8" id='dashboardJumbotron'>
  <div class='row'>
    <h2 class='col-xs-10'id='dashboardCaselistHdr'>Recently Submitted Forms</h2>

  </div>

  <?php include "FormsListTemplate.php" ?>
</div>
