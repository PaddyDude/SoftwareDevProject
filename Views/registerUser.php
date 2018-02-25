<html>
    <head>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
       
       <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
        
        <script type="text/javascript">
            function confirmPass() {
                var pass = document.getElementById("user_password").value;
                var confPass = document.getElementById("confirm_password").value;
                if(pass !== confPass) {
                    alert('Password and Confirm password do not match !');
                }
            }
        </script>
        
        <script type="text/javascript">
		$(document).ready(function() {
			$('#usernameLoading').hide();
			$('#user_name').keyup(function(){
			  $('#usernameLoading').show();
		      $.post("index.php?controller=Controller&action=remap", {
		        username: $('#user_name').val()
		      }, function(response){
		        $('#usernameResult').fadeOut();
		        setTimeout("finishAjax('usernameResult', '"+escape(response)+"')", 400);
		      });
		    	return false;
			});
		});
 
		function finishAjax(id, response) {
		  $('#usernameLoading').hide();
		  $('#'+id).html(unescape(response));
		  $('#'+id).fadeIn();
		} 
	</script>
        
    </head>
     
    
    <body>
        <div class="container">

            <form class="well form-horizontal" accept-charset="UTF-8" action="index.php?controller=Controller&action=signup" method="POST"  id="registration_form" style="margin-top: 30px;">
                <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Registration Form</b></h2></center></legend><br>

                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-4 control-label">First Name</label>  
                  <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input  name="first_name" placeholder="First Name" class="form-control"  type="text" pattern="[A-Za-z]+" required>
                    </div>
                  </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-4 control-label" >Last Name</label> 
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="last_name" placeholder="Last Name" class="form-control"  type="text" pattern="[A-Za-z]+" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Username</label>  
                  <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input  name="user_name" id="user_name" placeholder="Username" class="form-control"  type="text" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Username should only contain alphabets,letters and must be 2 to 20 characters." required>
                    
                  </div>
                  </div>
                  <span id="usernameLoading"><img src="view/images/ajax-loader.gif" alt="Ajax Indicator" /></span>
                    <span id="usernameResult"></span>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" >Password</label> 
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="user_password" name="user_password" placeholder="Password" class="form-control"  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>
                  </div>
                </div>

               
                <div class="form-group">
                  <label class="col-md-4 control-label" >Confirm Password</label> 
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control"  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  onblur="confirmPass()" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">E-Mail</label>  
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Contact No.</label>  
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="contact_no" placeholder="Phone Number" class="form-control" type="text" pattern="\d{3}[\-]\d{3}[\-]\d{4}">
                    </div>
                  </div>
                </div>

                
            
                <!-- Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-4"><br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                    
                  </div>
                </div>

                </fieldset>
            </form>
        </div>
    
    </body>
    
</html>
    