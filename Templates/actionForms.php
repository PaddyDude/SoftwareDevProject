<div class='col-md-8 col-centered'>
  <div class='row'>
    <h3 class='col-xs-10 col-centered' style='text-align:center; padding-bottom: 15px'>Application for Film Permit - Village Property</h3>
  </div>

	<div class='row' style='border-style: solid; border-width: 1px; padding-top: 5px; background-color: rgb(220, 220, 220);'>
		<div class='col-xs-10'>
			<?php

				$server = 'den1.mysql6.gear.host';
				$username = 'softwareproject1';
				$password = 'testDB123!';
				$dbname = 'softwareproject1';
				$conn = new mysqli($server, $username, $password, $dbname) or die($conn->connect_error);

				/* Will edit caseId = # to caseId = $caseId */

				$selectQuery = "SELECT caseId, applicant_username, date_submitted, path_to_form FROM film_applications WHERE caseId = ".$caseId." LIMIT 1";

				$result = mysqli_query($conn, $selectQuery) or die('Bad Query: $selectQuery');

				while($row = mysqli_fetch_assoc($result)) {

				  	echo "<form onsubmit='return validateForm()' name='form_appr_rej' action='ActionForms.php' method='post'>";
				  	echo 	"<input type='hidden' value='"."3"." name='caseId' id='caseId' />";
					echo  	"<span style='font-weight: bold'>Case ID: <span id='caseId_display' name='caseIdDisplay'></span>   ".$row['caseId']." </span>";
					echo    "<br>";
					echo  	"<span style='display: inline-block; font-weight: bold'>Applicant: ".$row['applicant_username']."</span> <span style='display: inline-block; float: right;'><a href=''
					  		data-toggle='modal' data-target='#contact_app'>CONTACT APPLICANT </a></span>";
					echo  	"<div class='modal fade' id='contact_app' role='dialog'>";
				    echo		"<div class='modal-dialog'>";
					echo		  	"<div class='modal-content'>";
					echo		        "<div class='modal-header' style='background-color:RGB(31,36,146);'>";
					echo		          "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
					echo		          "<h4 class='modal-title' style='color: RGB(159,214,247);text-align: center'>Contact Applicant: ".$row['applicant_username']."</h4>";
					echo		       "</div>";
					echo		        "<div class='modal-body'>";
					echo		          "<p><textarea rows='4' cols='50'></textarea></p>";
					echo		        "</div>";
					echo		        "<div class='modal-footer'>";
					echo		          "<button type='button' class='btn btn-default'>Send</button>";
					echo		          "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
					echo		        "</div>";
					echo	      	"</div>";
					echo	    "</div>";
					echo	"</div>";

					echo  "</div>";
					echo  "<span class='col-xs-12' style='font-weight: bold'>Date Submitted: ".$row['date_submitted']."</span><br>";
					echo  "<span class='col-xs-12'><a href='' data-toggle='modal' data-target='#view_form'>VIEW FORM</a></span><br>";

					echo	  "<div class='col-xs-13'>";
					echo		  "<div class='form-check'>";
					echo		    "<label class='col-xs-12'>Approve ";
					echo		    	"<input type='checkbox' name='approve' value='Approved' required>";
					echo		    	"<span class='checkmark'></span>";
					echo		    "</label><br>";
					echo		    "<label class='col-xs-12'>Reject ";
					echo		    	"<input type='checkbox' name='reject' value='Rejected' required>";
					echo		    	"<span class='checkmark'></span>";
					echo		    	"<span class='error'><p id='appr_error' style='color:red; font-size:11px;'></p></span>";
					echo		    "</label>";
					echo		  "</div>";
					echo	  "</div>";
					echo	  "<div class='col-xs-8 col-centered'>";
					echo	    "<div class='row'>";
					echo	      	"<div class='form-check2 col-xs-4 col-centered'>";
					echo			    "<label class='muni_label col-xs-13'> PD Chief Approval";
					echo			    	  "<input class='form-check-input' type='checkbox' name='pd_appr' id='defaultCheck1' disabled";

                              if($hasPolice==1) {
                                echo " checked='checked'";
                              }
          echo ">";
					echo			    	"<span class='checkmark'></span>";
					echo			    "</label><br>";
					echo			    "<span class='error'><p id='pd_error' style='color:red; font-size:11px;'></p></span>";
					echo			    "<label class='muni_label col-xs-13'> FD Chief Approval";
					echo			    	"<input class='form-check-input' type='checkbox' name='pd_appr'value='' id='defaultCheck1' disabled";

                        if($hasFire==1) {
                          echo " checked='checked'";
                        }

                        echo ">";
					echo			    	"<span class='checkmark'></span><br>";
					echo			    "</label>";
					echo			    "<span class='error'><p id='fd_error' style='color:red; font-size:11px;'></p></span>";
					echo		  	"</div>";
					echo		  "<br>";
					echo		  "<div class='col-xs-16'>";
					echo		  	"<textarea rows='4' cols='65' name='comment' ></textarea>";
					echo		  "</div>";
					echo		  "<div class='col-xs-4 col-centered sign' style='padding-top: 10px;'>";
					echo		  	"<span class='col-xs-4' style='margin-left: auto; margin-right:auto;''>";
					echo		  		"<input class='btn btn-primary' name='submit' type='submit' value='Sign & Submit'>";
					echo		  	"</span>";
					echo		  "</div>";
					echo	   "</div>";
					echo	"</div>";
					echo "</form>";

				}
			?>
		</div>
	</div>
</div>
