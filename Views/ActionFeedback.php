<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel ='stylesheet' href='../CSS/style.css'>
    <link rel ='stylesheet' href='../CSS/CaseList.css'>
    <link rel ='stylesheet' href='../CSS/ActionForms.css'>
    <link rel ='stylesheet' href='../CSS/dashboard.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='../Javascripts/createFormElements.js'></script>
    <script>
      $(document).ready(function(){
          document.getElementById('navBarHeader').innerHTML = 'Action Feedback';
      });
    </script>
  </head>
  <body>
    <div>

      <?php include '../Templates/navbar.html'; ?>

      <div class="container">
        <?php
            include '../Templates/actionFeedbackTemplate.php';
          ?>
      </div>

    </div>

  </body>
</html>
