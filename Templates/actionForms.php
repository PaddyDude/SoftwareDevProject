<div class='col-md-8 col-centered'>
  <div class='row'>
    <h3 class='col-xs-10 col-centered' style='text-align:center; padding-bottom: 15px'>Application for Film Permit - Village Property</h3>
  </div>

	<div class='row' style='border-style: solid; border-width: 1px; padding-top: 5px; background-color: rgb(220, 220, 220);'>
		<div class='col-xs-10'>
			<?php
	  $userType = $_SESSION['user_dept'];
      $caseId = "";
      if(isset($_GET['caseId'])) {
        $caseId = $_GET['caseId'];
      }

				$server = 'den1.mysql6.gear.host';
				$username = 'softwareproject1';
				$password = 'testDB123!';
				$dbname = 'softwareproject1';
				$conn = new mysqli($server, $username, $password, $dbname) or die($conn->connect_error);
          		

				$selectQuery = "SELECT fa.caseId as caseId, fa.applicant_username as applicant_username, fa.date_submitted as date_submitted, fa.path_to_form as path_to_form, u.email as email, u.phone as phone FROM film_applications fa, user u  WHERE u.username = fa.applicant_username AND caseId = ".$caseId."  LIMIT 1";
          
				$result = mysqli_query($conn, $selectQuery) or die('Bad Query: $selectQuery');
          
				while($row = mysqli_fetch_assoc($result)) {

				  	echo "<form name='form_appr_rej' action='index.php?controller=UserController&action=actionForm&' method='POST'>";
            echo      "<input id='' name='controller' type='hidden' value='UserController'>";
            echo      "<input id='' name='action' type='hidden' value='actionForm'>";
          	echo 	"<input type='hidden' value='".$caseId."' name='caseId' id='caseId' />";
					echo  	"<span style='font-weight: bold'>Case ID: <span id='caseId_display' name='caseIdDisplay'></span>   ".$row['caseId']." </span>";
					echo    "<br>";
					echo  	"<span style='display: inline-block; font-weight: bold'>Applicant: ".$row['applicant_username']."</span> <span style='display: inline-block; float: right;'><a href=''
					  		data-toggle='modal' data-target='#contact_app'>CONTACT APPLICANT </a></span>";
					  			//Where modal was
					echo  "</div>";
					echo  "<span class='col-xs-12' style='font-weight: bold'>Date Submitted: ".$row['date_submitted']."</span><br>";
					echo  "<span class='col-xs-12'><a href='".$row['path_to_form']."' target='_blank'>VIEW FORM</a></span><br>";

					echo	  "<div class='col-xs-13'>";
					echo		  "<div class='form-check'>";
					echo		    "<label class='col-xs-12'>Approve ";
					echo		    	"<input type='checkbox' id='appr' name='approve' value='Approved'>";
					echo		    	"<span class='checkmark'></span>";
					echo		    "</label><br>";
					echo		    "<label class='col-xs-12'>Reject ";
					echo		    	"<input type='checkbox' id='rej' name='reject' value='Rejected'>";
					echo		    	"<span class='checkmark'></span>";
					echo		    	"<span class='error'><p id='appr_error' style='color:red; font-size:11px;'></p></span>";
					echo		    "</label>";
					echo		  "</div>";
					echo	  "</div>";
					echo	  "<div class='col-xs-8 col-centered'>";
					echo	    "<div class='row'>";
					echo	      	"<div class='form-check2 col-xs-4 col-centered'>";
					echo			    "<label class='muni_label col-xs-13'> PD Chief Approval";
					echo			    	"<input type='checkbox' id='pd_appr' name='pd_appr'>";
					echo			    	"<span class='checkmark'></span>";
					echo			    "</label><br>";
					echo			    "<span class='error'><p id='pd_error' style='color:red; font-size:11px;'></p></span>";
					echo			    "<label class='muni_label col-xs-13'> FD Chief Approval";
					echo			    	"<input type='checkbox' id='fd_appr' name='fd_appr'>";
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
               		echo 	        "<input type='hidden' value='".$userType."' name='decider' id='decider' />";
					echo		  "</div>";
					echo	   "</div>";
					echo	"</div>";
					echo "</form>";
					//New MODAL SPOT BELOW
					echo  	"<div class='modal fade' id='contact_app' role='dialog'>";
				    echo		"<div class='modal-dialog'>";
					echo		  	"<div class='modal-content'>";
					echo		        "<div class='modal-header' style='background-color:RGB(31,36,146);'>";
					echo		          "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
					echo		          "<h4 class='modal-title' style='color: RGB(159,214,247);text-align: center'>Contact Applicant: ".$row['applicant_username']."</h4>";
					echo		       "</div>";
					echo		        "<div class='modal-body'>";
					echo 					"<table id='contactTable' class='table table-striped'>";
					echo 						"<tr>";
					echo 							"<th>Applicant Email</th>";
					echo 							"<td>".$row['email']."</td>";
					echo 						"</tr>";
					echo 						"<tr>";
					echo 							"<th>Applicant Phone</th>";
					echo 							"<td>".$row['phone']."</td>";
					echo 						"</tr>";
					echo 					"</table>";
					echo 				"</div>";
					echo		        "<div class='modal-footer'>";
					echo		          "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
					echo		        "</div>";
					echo	      	"</div>";
					echo	    "</div>";
					echo	"</div>";
				}
			?>
		</div>
	</div>
</div>
