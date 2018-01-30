
<div id='filterBar' style='width:100%;'>
<form action='../Routes/CaseListRoute.php'>
  <div class='form-row'>

    <div class='col-md-2'>
      <label for='f'>Case Id</label>
      <input type='text' class='form-control' id='f' placeholder='' value=''>
    </div>

    <div class='col-md-2'>
      <label for='validationDefault01'>Applicant Name</label>
      <input type='text' class='form-control' id='validationDefault02' placeholder='' value=''>
    </div>

    <div class='col-md-2'>
      <label for='example-date-input' >Submitted After</label>
      <div class='col-2'>
        <input class='form-control' type='date' value='2011-08-19' id='example-date-input'>
      </div>
    </div>

    <div class='col-md-2'>
      <label for='example-date-input' >Submitted Before</label>
      <div class='col-2'>
        <input class='form-control' type='date' value='2011-08-19' id='example-date-input2'>
      </div>
    </div>

    <div class='col-md-2'>
      <label for='validationDefault01'>Type</label>
      <input type='text' class='form-control' id='validationDefault03' placeholder='' value=''>
    </div>
    <div class='col-md-2'>
      <label for='validationDefault01'>Status</label>
      <input type='text' class='form-control' id='validationDefault04' placeholder='' value=''>
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
