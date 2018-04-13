<?php
  $width = "800px;";
  if (strpos($_SERVER['REQUEST_URI'], 'ApproverDashboard') !== false) {
      $width = "600px;";
  }

  for($i=0; $i<count($myCases); $i++) {
  //  echo $thisCaselist->myCases[$i]->status;
  echo"
  <div class='row justify-content-center'>
    <span class='col-xs-12 col-centered listElementTitle listPageTitle'>".$myCases[$i]->type."</span>
    <div class='col-xs-8 col-centered listElement' style='width: ".$width.";'>
      <div class='row' style='width:100'>
        <div class='col-xs-12'>Status: <span class='status".$myCases[$i]->status."'>".$myCases[$i]->status."</span></div>

        <div class='row' style='width:100'>
        <div class='col-xs-8'>&nbsp;&nbsp;&nbsp;&nbsp;Applicant Email:<span> &nbsp;".$myCases[$i]->applicantEmail."<span></div>
        <div class='col-xs-4'>Submitted:<span>&nbsp;".$myCases[$i]->submissionDate."<span></div>
        </div>";

        if (strpos($myCases[$i]->type, 'Film') !== false) {
            echo "<div class='col-xs-11'>Approval From Police Chief</div>
            <div class='form-check'>
              <input class='form-check-input' type='checkbox' value='' id='defaultCheck1' disabled";

              if($myCases[$i]->hasPolice==1) {
                echo " checked='checked'";
              }

            echo ">

            <div class='col-xs-11'>Approval From Fire Chief</div>
            <div class='form-check'>
              <input class='form-check-input' type='checkbox' value='' id='defaultCheck1' disabled";

              if($myCases[$i]->hasFire==1) {
                echo " checked='checked'";
              }

            echo ">


            </div>";
          } else {
            echo "<div class='col-xs-11'>Doctor Signature</div>
            <div class='form-check'>
              <input class='form-check-input' type='checkbox' value='' id='defaultCheck1' disabled active>
            </div>";
          }

        echo"
        <div class='col-xs-11'>Approval From Village Manager</div>
        <div class='form-check'>
          <input class='form-check-input' type='checkbox' value='' id='defaultCheck1' disabled active";
          if($myCases[$i]->hasVillage==1) {
            echo " checked='checked'";
          }
        echo">
        </div>

        <div class='col-xs-12'><a href='../Views/ActionForms.php?caseId=".$myCases[$i]->caseId."&hasVillage=".$myCases[$i]->hasVillage."&hasFire=".$myCases[$i]->hasFire."&hasPolice=".$myCases[$i]->hasPolice."&hasDoctor=".$myCases[$i]->hasDoctor."&path=".$myCases[$i]->pathToForm."&applicantEmail=".$myCases[$i]->applicantEmail."'>Review</a></div>

      </div>

    </div>
  </div>
  </br>
  ";
  } ?>
