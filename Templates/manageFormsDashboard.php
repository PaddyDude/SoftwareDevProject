<?php
  include '../Models/CaseList/FormList.php';

  $myCaseList = new Formlist();
  $myCaseList->setStatus('Pending');
  $myCaseList->fetchCases();
  //echo json_encode($myCaseList->cases);
?>

<div class="jumbotron col-md-8 col-centered" id='dashboardJumbotron'>
  <div class='row'>
    <h2 class='col-xs-10'id='dashboardCaselistHdr'>Recently Submitted Forms</h2>
    <a href="ListPage.php" style=''>View more</a>
  </div>
  <?php include "FormsListTemplate.php" ?>
</div>
