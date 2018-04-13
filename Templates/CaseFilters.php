<?php
    if(isset($_GET['feedbackList'])) {
      $listAction = '../Views/FeedbackListPage.php?';
    } else {
      $listAction = '../Views/FormListPage.php';
    }
  ?>

<div id='filterBar' style='width:100%;'>
<form id='caseListFilterForm' name='caseListFilterForm' action='<?php echo $listAction.'?feedbackList' ?>' method='get'>
  <div class='form-row' id='filterContainer'>

    <div class='col-md-2' id='caseIdContainer'>
      <label for='f'>Case Id</label>
      <input type='text' class='form-control' id='caseIdInput' name='caseId' placeholder='' value=''>
    </div>

    <div class='col-md-2'>
      <label for='validationDefault01'>Applicant Email</label>
      <input type='text' class='form-control' id='emailTextBox' name='email' placeholder='' value=''>
    </div>
    <div class='col-md-2'>
      <label for='example-date-input' >Submitted After</label>
      <div class='col-2'>
        <input class='form-control' type='date' value='' id='submittedAfter' name='submittedAfter'>
      </div>
    </div>

    <div class='col-md-2'>
      <label for='example-date-input' >Submitted Before</label>
      <div class='col-2'>
        <input class='form-control' type='date' value='' id='submittedBefore' name='submittedBefore'>
      </div>
    </div>

    <?php
      if(isset($_GET['feedbackList'])) {
        echo "<input type='hidden' value='' name='feedbackList'>";
        echo "<style> #filterContainer {margin-left: 12.5%;}</style>";
      }else {
        echo"
        <div class='col-md-2'>
          <label for='validationDefault01'>Type</label>
          <select class='form-control' id='typeTextBox' name='typeTextBox' placeholder='' value=''>
              <option disabled selected value> -- select an option -- </option>
              <option>Application for Film Permit - Village Property</option>
              <option>Application for Film Permit - Private Property</option>
              <option>Parking Permit for Persons with Disabilities</option>
          </select>
        </div>";
      }
      ?>

    <div class='col-md-2'>
      <label for='status'>Status</label>
      <select class='form-control' id='statusDopDown' name='statusDropDown' placeholder='' value=''>
          <option disabled selected value> -- select an option -- </option>

          <?php
              if(isset($_GET['feedbackList'])) {
                echo"
                <option>Open</option>
                <option>Closed</option>";
              }else {
                echo"
                <option>Pending</option>
                <option>Approved</option>
                <option>Rejected</option>";
              }
            ?>

      </select>
    </div>
  </div>
  <div class='col-md-12 text-center' id='submitFilter'>
    <button id='singlebutton' name='singlebutton' class='btn btn-primary'>Filter</button>
  </div>
</form>


</div>
<div class='row' style='width:100%;'>
<hr/>
</div>
