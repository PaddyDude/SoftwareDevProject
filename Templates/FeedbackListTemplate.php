<?php
  for($i=0; $i<count($complaintList->cases); $i++) {
  //  echo $myCaseList->cases[$i]->status;
  echo"
      <div class='row' class='elementRow'>
        <span class='col-xs-12 col-centered listElementTitle'>".$complaintList->cases[$i]->subject."</span>
        <div class='col-xs-8 col-centered listElement'>
          <div class='row'>
            <div class='col-xs-12'>Submitted By: <span>".$complaintList->cases[$i]->applicantEmail."</span></div>

            <div class='col-xs-12'>Submitted:<span>".$complaintList->cases[$i]->submissionDate."<span></div>

              <textarea rows='4' cols='50' class='text-center' class='feedbackTextArea' disabled>".$complaintList->cases[$i]->complaintDetails."
              </textarea>

            <div class='col-xs-12'><a href=''>Respond</a></div>

          </div>

        </div>
        </div>

        </div>

  ";
  }
?>
