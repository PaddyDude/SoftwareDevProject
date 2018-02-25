<html>

 <!DOCTYPE html>
 <head>
 <meta charset='utf-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
   <link rel ='stylesheet' href='../CSS/style.css'>
   <link rel ='stylesheet' href='../CSS/CaseList.css'>
   <link rel ='stylesheet' href='../CSS/permit.css'>
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
   <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src='../Javascripts/createFormElements.js'></script>

   <style>table, th, td {border: 2px solid black;}</style>

 </head>
  <body>

    <div id='navBar'>
      <img class='seal' src="../Images/mamaroneckSeal.jpg" alt="Village Seal" height="100" width="100">
      <h2  class='text-center' id='navBarHeader'>Film Application Form - Village Property</h2>
      </div>
      <div id='undrHdr' style='margin-bottom: 0px;'>
        <div class='row' style='width:100%'>
          <a class="btn btn-primary manageTab" href="#" role="button">Manage Forms</a>
          <a class="btn btn-primary manageTab" href="#" role="button">Manage Feedback</a>
        </div>
     </div>

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
      <form action="../PDF_Actions/action_film_permit.php" method="post">
        <fieldset>
          <legend>1. Applicant</legend>
          First Name: <input type="text" name="firstname" required>
          Last Name: <input type="text" name="lastname" required>
          Phone Number: <input type="text" name="phonenumber" required>
          <br><br>
          Street: <input type="text" name="app_street" required>
          City: <input type="text" name="app_city" required>
          State: <input type="text" name="app_state" required>
        </fieldset><br>

        <fieldset>
          <legend>2. Location of Filming</legend>
          Street: <input type="text" name="loc_street" required>
          City: <input type="text" name="loc_city" required>
          State: <input type="text" name="loc_state" required>
        </fieldset><br>

        <fieldset>
          <legend>3. Dates of Filming</legend>
          Start Date: <input type="text" name="start_date" required>
          End Date: <input type="text" name="end_date" required>
        </fieldset><br>

        <fieldset>
          <legend>4. Purpose of Film</legend>
          <textarea maxlength="300" rows="5" cols="30" name="film_purpose" required>Text...</textarea>
        </fieldset><br>

        <fieldset>
            <legend>5. Number of vehicles associated with filming (e.g. transportation to site,
              generator trucks, commissary truck, etc.)</legend>
            Number of Vehicles: <input type="number" name="number_trucks" required><br><br>
            Types of trucks at filming site: <input type="text" name="type_trucks" required><br><br>
            Will trucks be parked on the street? <input type="radio" name="rYes" value="yes" > Yes
            <input type="radio" name="rNo" value="no" > No
        </fieldset><br>

        <fieldset>
          <legend>6. It is understood that the filming, including setting up, operating and
          removing equipment, shall be conducted between the hours of 8:00 a.m. and 7:00 p.m.</legend>
          <input type="checkbox" name="iUnderstand" value="understand" required> I Understand
        </fieldset><br>

        <fieldset>
          <legend>Applicant affirms, under penalty of perjury that all statements
             contained in this application are true.</legend>
          Date: <input type="text" name="current_date" required>
          Company Name: <input type="text" name="company_name" required>
        </fieldset><br>

        <p>ELECTRONIC SIGNATURE GOES HERE</p>

        <input type="submit" value="submit">
      </form>
    </div>
  </div>
  </body>
</html>
