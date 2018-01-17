<?php
    //include 'FormList.php';
    //$dashboard = new CaseList();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset='utf-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
   <link rel ='stylesheet' href='../CSS/style.css'>
   <link rel ='stylesheet' href='../CSS/CaseList.css'>
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
   <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src='../Javascripts/createFormElements.js'></script>
  <script>
  var myCat = "Kitten";
  </script>
 </head>
 <body>

<div id='navBar' class='jumbotron text-center'>
  <h2 id='navBarHeader'>My Dashboard</h2>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/SoftwareProject/Templates/CaseFilters.php'; ?>

<div class='container'>
  <div class='row'>
    <span class='col-xs-12 col-centered listElementTitle'>Film Permit Application - Village Property</span>
    <div class='col-xs-8 col-centered listElement'>
      <div class='row'>
        <div class='col-xs-12'>Status: <span class='statusPending'>Pending</span></div>

        <div class='col-xs-12'>Submitted:<span>11/2/2017<span></div>

        <div class='col-xs-11'>Approval From Police Chief</div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        </div>

        <div class='col-xs-11'>Approval From Fire Chief</div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        </div>

        <div class='col-xs-11'>Approval From Village Manager</div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        </div>

        <div class='col-xs-12'><a href="">Review</a></div>

      </div>

    </div>
  </div>
</div>

 </body>
 </html>