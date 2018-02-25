<?php
  for($i=0; $i<count($myCaseList->cases); $i++) {
  //  echo $myCaseList->cases[$i]->status;
  echo"
  <div class='row justify-content-center'>
    <span class='col-xs-12 col-centered listElementTitle listPageTitle'>".$myCaseList->cases[$i]->type."</span>
    <div class='col-xs-8 col-centered listElement'>
      <div class='row' style='width:100'>
        <div class='col-xs-12'>Status: <span class='status".$myCaseList->cases[$i]->status."'>".$myCaseList->cases[$i]->status."</span></div>

        <div class='row' style='width:100'>
        <div class='col-xs-8'>&nbsp;&nbsp;&nbsp;&nbsp;Applicant Email:<span> &nbsp;".$myCaseList->cases[$i]->applicantEmail."<span></div>
        <div class='col-xs-4'>Submitted:<span>&nbsp;".$myCaseList->cases[$i]->submissionDate."<span></div>
        </div>";

        if (strpos($myCaseList->cases[$i]->type, 'Film') !== false) {
            echo "<div class='col-xs-11'>Approval From Police Chief</div>
            <div class='form-check'>
              <input class='form-check-input' type='checkbox' value='' id='defaultCheck1' disabled active>
            </div>

            <div class='col-xs-11'>Approval From Fire Chief</div>
            <div class='form-check'>
              <input class='form-check-input' type='checkbox' value='' id='defaultCheck1' disabled";

              if($myCaseList->cases[$i]->hasFire==1) {
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
          <input class='form-check-input' type='checkbox' value='' id='defaultCheck1' disabled active>
        </div>

        <div class='col-xs-12'><a href=''>Review</a></div>

      </div>

    </div>
  </div>
  </br>
  ";
  }
?>
