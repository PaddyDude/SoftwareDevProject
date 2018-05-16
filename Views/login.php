

<html> 
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="Views/CSS/login.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <?php 
      if(isset($_POST['username']) && isset($_POST['password']))
        {
        echo "<script>(function(){alert('$result');})();</script>";
        }
    
    ?>
        
    
    <body style="background-size:100% 100%;">
            <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="Views/Images/logo.png" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form accept-charset="UTF-8" role="form" class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
                                        <input class="form-control" placeholder="Username" name="username" type="text"  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Username should only contain alphabets and letters and must be atleast 2 characters long." required>
                                        <input class="form-control" placeholder="Password" name="password" type="password"  pattern="^(?=[^\d_].*?\d)\w(\w|[!@#$%]){7,20}" title="Can contain only aplhanumeric characters and special characters !@#$%. 
                                                                                                                                                                                  Can not start with a digit, underscore or special character and must contain at least one digit.
                                                                                                                                                                                  Must be 8-20 characters long" required>
          
                                        
                                        <br></br>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login »"> 
                                        
    
                                        <label class="panel-login" style="margin-top: 10px;">Don't have an account? <a href="index.php?controller=UserController&action=signup">Sign up now</a>.</label>
                                        
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
</html> 
    
