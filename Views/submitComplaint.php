<?php 

if(strlen($_SESSION['login_user'])=="")
	{	
header('location:index.php');
}
?>
<html>
    <head>
        <title>Complaint Form </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
       
         <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  
    
   
   <link href="Views/CSS/themestyle.css" rel="stylesheet" type="text/css"/>
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
        
        
         <script>
            function check() {
                
                    
                    var dept = $('#complaintCat');
                    if (dept.val() === 'Select Category') {
                        alert("Please select a department and then proceed.");
                         $('#complaintCat').focus();
                         return false;
                       
                    }
                    else 
                    {
                        
                       
                      return;
                      
                    }
                }
        </script>
    </head>
    <body>
       <?php include("includes/header.php"); ?>

        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">

                    <h1>Complaint Form </a></h1>

                   <form id="complaint-form" method="post" action="index.php?controller=UserController&action=submitComplaint" role="form">

                    <div class="messages"></div>

                    

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_username">Username *</label>
                                    <input id="form_username" type="text" name="username" class="form-control" placeholder="Please enter your username *" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Username should only contain alphabets,letters and must be 2 to 20 characters." required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_category">Which department is subjected to complaint? *</label>
                                    <select name="complaintCat" id="complaintCat" class="form-control" required>
                                        <option value="Select Category" selected>Select Category</option>
                                        <option value="Fire Department">Fire Department</option>
                                          <option value="Police Department">Police Department</option>
                                           <option value="Police Department">Not Sure!!</option>
                                     </select> 
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Subject *</label>
                                    <input id="form_message" name="subject" class="form-control" placeholder="Please enter subject of complaint *"  pattern="[a-zA-Z][a-zA-Z\s]+" title="Subject can contain only alphabets"  required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                          
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Complaint *</label>
                                    <textarea id="form_message" name="complaindetails" class="form-control" placeholder="Please enter complaint details *" rows="4" maxlength="200" aria-describedby="complaintHelpBlock" required></textarea>
                                    <small id="complaintHelpBlock" class="form-text text-muted">
                                        The complaint must be less than 200 characters long.
                                      </small>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" name="registerComplaint" id="registerComplaint" class="btn btn-success btn-send" value="Submit Complaint" onClick="return check();">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted"><strong>*</strong> These fields are required. </p>
                            </div>
                        </div>
                    

            </form>

                </div>

            </div>

        </div>

     
        
    </body>
    
</html>
