<?php
  include 'Models/CaseList/FormList.php';

  $myCaselist = new Formlist();
  $myCaselist->setUserDepartment($_SESSION['user_dept']);
  $myCaselist->setStatus('Pending');
  $myCases = $myCaselist->fetchCases(true);

  //echo json_encode($myCaseList->cases);
?>

<div class="jumbotron col-md-8 col-centered" id='dashboardJumbotron'>
  <div class='row'>
    <h2 class='col-xs-10'id='dashboardCaselistHdr'>Recently Submitted Forms</h2>
    <a href="index.php?controller=UserController&action=listPage" style=''>View more</a>
  </div>
  <?php include "FormsListTemplate.php" ?>
</div>
