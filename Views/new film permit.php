<html>

 <!DOCTYPE html>
 <head>
 <meta charset='utf-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
   <link rel ='stylesheet' href='Views/CSS/themestyle.css'>
   <link rel ='stylesheet' href='CSS/CaseList.css'>
   <link rel ='stylesheet' href='CSS/permit.css'>
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
   <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src='Javascripts/createFormElements.js'></script>

   <style>table, th, td {border: 2px solid black;}</style>

 </head>
  <body>

    <?php include("includes/header.php"); 
 ?>
 

  <div class="container">
    <div id='formIntro' class="jumbotron col-md-12 col-centered">
      <p> Application is hereby made to the Village of Mamaroneck for a permit to film in the Village
      and applicant subscribes to the law and code governing same (chapter 178 - film permits).
      Current fees are as follows: </p>
      <table>
        <tr>
            <td> Per day, per location,  8 a.m. to 7 p.m. </td>
            <td> $ 1500.00 </td>
        </tr>
        <tr>
            <td> Parking of vehicles on public roads related to
            filming operation, per vehicle- space, per day
            (if a vehicle takes 2 or 3 spaces, charge is per space). </td>
            <td> $ 20 per space, per day. </td>
        </tr>
      </table><br>
    </div>

    <div id='userInfo' class="jumbotron col-md-12 col-centered">
      <form action="index.php?controller=UserController&action=actionfilm" method="post" enctype="multipart/form-data">
        <fieldset>
          <legend>1. Applicant</legend>
          First Name: <input type="text" name="firstname" required placeholder="John" pattern="[A-Za-z]+" title="First Name can contain only alphabtets such as Tom, tom.">
          Last Name: <input type="text" name="lastname" required placeholder="Smith" pattern="[A-Za-z]+" title="First Name can contain only alphabtets such as Tom, tom.">
          Phone Number: <input type="text" name="phonenumber" required placeholder="123-456-7890" pattern="\d{3}[\-]\d{3}[\-]\d{4}" title="Format should be like 111-111-1111">
          <br><br>
          Street: <input type="text" name="app_street" required placeholder="Main Street" pattern="[a-zA-Z0-9]+(?:[ '-][a-zA-Z]+)*" title=" Main Street">
          City: <input type="text" name="app_city" required placeholder="New York City" pattern="[a-zA-Z]+(?:[ '-][a-zA-Z]+)*" title=" New York City">
          State: <input type="text" name="app_state" required placeholder="New York" pattern="[a-zA-Z]+(?:[ '-][a-zA-Z]+)*" title="New York">
        </fieldset><br>

        <fieldset>
          <legend>2. Location of Filming</legend>
          Street: <input type="text" name="loc_street" required placeholder="Main Street">
          City: <input type="text" name="loc_city" required placeholder="New York City" pattern="[a-zA-Z]+(?:[ '-][a-zA-Z]+)*" title=" New York City">
          State: <input type="text" name="loc_state" required placeholder="New York" pattern="[a-zA-Z]+(?:[ '-][a-zA-Z]+)*" title="New York">
        </fieldset><br>

        <fieldset>
          <legend>3. Dates of Filming</legend>
          Start Date: <input type="date" name="start_date" required>
          End Date: <input type="date" name="end_date" required>
        </fieldset><br>

        <fieldset>
          <legend>4. Purpose of Film</legend>
          <textarea maxlength="300" rows="5" cols="30" name="film_purpose" required placeholder="Reasons for film." pattern="[a-zA-Z]+" title="Only alphabtets. Max length 300 Characters"></textarea>
        </fieldset><br>

        <fieldset>
            <legend>5. Number of vehicles associated with filming (e.g. transportation to site,
              generator trucks, commissary truck, etc.)</legend>
            Number of Vehicles: <input type="number" name="number_trucks" required><br><br>
            Types of trucks at filming site: <input type="text" name="type_trucks" required placeholder="Semi" pattern="[a-zA-Z]+" title="Only alphabtets."><br><br>
            Will trucks be parked on the street? <input type="radio" name="truck_parking" value="yes" > Yes
            <input type="radio" name="truck_parking" value="no" > No
        </fieldset><br>

        <fieldset>
          <legend>6. It is understood that the filming, including setting up, operating and
          removing equipment, shall be conducted between the hours of 8:00 a.m. and 7:00 p.m.</legend>
          <input type="checkbox" name="iUnderstand" value="I Understand" required> I Understand
        </fieldset><br>

        <fieldset>
          <legend>Applicant affirms, under penalty of perjury that all statements
             contained in this application are true.</legend>
          Date: <input type="date" name="current_date" required>
          Company Name: <input type="text" name="company_name" required placeholder="Marvel" pattern="[a-zA-Z]+" title="Only alphabtets.">
        </fieldset><br>

        Electronic Signature: <input type="file" name="Signature_picture2" accept="image/*" required>
        <input type="checkbox" name="verify_signature" value="yes" required> I legally verify that the uploaded file is my signature.<br><br>

        
        <div>
            <span>
              <a data-toggle="modal" data-target="#paymentModal">Click Here To Enter Payment Details Before Submitting</a>
            </span>
          </div>
  
          <input id='submitFilmApp' type='submit' value='Submit' disabled>
        </form>

        <div id="paymentModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header" style='background-color: lightblue'>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enter Payment Information</h4>
              </div>
              <div class="modal-body">
                <div class='container'>
                  <form action='Templates/charge.php' method='POST' id='paymentForm'>
                    <div class="form-row">
                      <input type='text' id="payer-name" name='payerName' class='form-control mb-3 StripeElement
                        StripElement--empty' placeholder="Enter name as it appears on card">
                      <input type='email' id='email' name='emailAddress' class='form-control mb-3 StripeElement
                        StripElement--empty' placeholder="Enter email address">
                      <div id="card-element" class='form-control'>
                        <!-- A Stripe Element will be inserted here. -->
                      </div>

                      <!-- Used to display form errors. -->
                      <div id="card-errors" role="alert"></div>
                    </div>
                    <div>
                      <button id='submitPay'>Submit Payment</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script src='Javascripts/payment.js'></script>
  </body>
</html>
