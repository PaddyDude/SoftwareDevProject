<?php

  for($i=0; $i<count($myCases); $i++) {
  //  echo $thisCaselist->myCases[$i]->status;
      $reviewUrl="";
  if($_SESSION['user_type']==2) {
	$reviewUrl = $myCases[$i]->pathToForm;
  }else {
    $reviewUrl = "index.php?controller=UserController&action=actionForm&caseId=".$myCases[$i]->caseId."&path_to_form=".$myCases[$i]->pathToForm.".&hasFire=".$myCases[$i]->hasFire.".&hasPolice=".$myCases[$i]->hasPolice.".&hasDoctor=".$myCases[$i]->hasDoctor;
  }
  if($myCases[$i]->type == null) {
    $myCases[$i]->type = "Parking Permit for Disabled Person";
  }
  echo"
  <div class='row justify-content-center' style=''>
    <span class='col-xs-12 col-centered listElementTitle listPageTitle' style='max-width: 500px;'>".$myCases[$i]->type."</span>
    <div class='col-xs-8 col-centered listElement' style='max-width: 500px;'>
      <div class='row' style='width:100%;'>
        <div class='col-xs-12'>Status: <span class='status".$myCases[$i]->status."'>".$myCases[$i]->status."</span></div>

        <div class='row' style='width:100%;'>
        <div class='col-xs-12'>&nbsp;&nbsp;&nbsp;&nbsp;Applicant Email:<span> &nbsp;".$myCases[$i]->applicantEmail."<span></div>
        <div class='col-xs-12' style='margin-left:15px;'>Submitted:<span>&nbsp;".$myCases[$i]->submissionDate."<span></div>
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

        <div class='col-xs-12'><a href='".$reviewUrl."'>Review</a></div>

      </div>

    </div>
  </div>
  </br>
  ";
  } ?>
