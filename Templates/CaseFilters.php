
<div id='filterBar' style='width:100%;'>
<form id='caseListFilterForm' name='caseListFilterForm' action='../Views/ListPage.php' method='get'>
  <div class='form-row'>

    <div class='col-md-2'>
      <label for='f'>Case Id</label>
      <input type='text' class='form-control' id='caseIdInput' name='caseId' placeholder='' value=''>
    </div>

    <div class='col-md-2'>
      <label for='validationDefault01'>Applicant Name</label>
      <input type='text' class='form-control' id='emailTextBox' name='email' placeholder='' value=''>
    </div>

    <div class='col-md-2'>
      <label for='example-date-input' >Submitted After</label>
      <div class='col-2'>
        <input class='form-control' type='date' value='2011-08-19' id='submittedAfter' name='submittedAfter'>
      </div>
    </div>

    <div class='col-md-2'>
      <label for='example-date-input' >Submitted Before</label>
      <div class='col-2'>
        <input class='form-control' type='date' value='2011-08-19' id='submittedBefore' name='submittedBefore'>
      </div>
    </div>

    <div class='col-md-2'>
      <label for='validationDefault01'>Type</label>
      <select class='form-control' id='typeTextBox' name='typeTextBox' placeholder='' value=''>
          <option disabled selected value> -- select an option -- </option>
          <option>Application for Film Permit - Village Property</option>
          <option>Application for Film Permit - Private Property</option>
          <option>Parking Permit for Persons with Disabilities</option>
      </select>
    </div>
    <div class='col-md-2'>
      <label for='status'>Status</label>
      <select class='form-control' id='statusDopDown' name='statusDropDown' placeholder='' value=''>
          <option disabled selected value> -- select an option -- </option>
          <option>Pending</option>
          <option>Approved</option>
          <option>Rejected</option>
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
