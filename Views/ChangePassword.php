<?php 

if(strlen($_SESSION['login_user'])=="")
	{	
header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>



        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>



        <link href="Views/CSS/themestyle.css" rel="stylesheet" type="text/css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">

            $(function () {
                $('#newpassword').keyup(function () {

                    var ucase = new RegExp("[A-Z]+");
                    var lcase = new RegExp("[a-z]+");
                    var num = new RegExp("[0-9]+");

                    if ($("#newpassword").val().length >= 8) {
                        $("#8char").removeClass("glyphicon-remove");
                        $("#8char").addClass("glyphicon-ok");
                        $("#8char").css("color", "#00A41E");
                    } else {
                        $("#8char").removeClass("glyphicon-ok");
                        $("#8char").addClass("glyphicon-remove");
                        $("#8char").css("color", "#FF0004");
                    }

                    if (ucase.test($("#newpassword").val())) {
                        $("#ucase").removeClass("glyphicon-remove");
                        $("#ucase").addClass("glyphicon-ok");
                        $("#ucase").css("color", "#00A41E");
                    } else {
                        $("#ucase").removeClass("glyphicon-ok");
                        $("#ucase").addClass("glyphicon-remove");
                        $("#ucase").css("color", "#FF0004");
                    }

                    if (lcase.test($("#newpassword").val())) {
                        $("#lcase").removeClass("glyphicon-remove");
                        $("#lcase").addClass("glyphicon-ok");
                        $("#lcase").css("color", "#00A41E");
                    } else {
                        $("#lcase").removeClass("glyphicon-ok");
                        $("#lcase").addClass("glyphicon-remove");
                        $("#lcase").css("color", "#FF0004");
                    }

                    if (num.test($("#newpassword").val())) {
                        $("#num").removeClass("glyphicon-remove");
                        $("#num").addClass("glyphicon-ok");
                        $("#num").css("color", "#00A41E");
                    } else {
                        $("#num").removeClass("glyphicon-ok");
                        $("#num").addClass("glyphicon-remove");
                        $("#num").css("color", "#FF0004");
                    }


                });

                $('#confirmpass').keyup(function () {
                    if ($("#newpassword").val() == $("#confirmpass").val()) {
                        $("#pwmatch").removeClass("glyphicon-remove");
                        $("#pwmatch").addClass("glyphicon-ok");
                        $("#pwmatch").css("color", "#00A41E");
                    } else {
                        $("#pwmatch").removeClass("glyphicon-ok");
                        $("#pwmatch").addClass("glyphicon-remove");
                        $("#pwmatch").css("color", "#FF0004");



                    }
                });
            });


            function confirmPass() {


                var pass = document.getElementById("newpassword").value;
                var confPass = document.getElementById("confirmpass").value;
                if (pass !== confPass) {
                    alert('Password and Confirm password do not match !');
                    $('#confirmpass').focus();
                    return false;
                }
            }
        </script>
    </head>

    <body>

        <?php 
        if($_SESSION['user_type']==2){
          include("includes/header.php");
      }
      else{
          include("includes/adminheader.php");
      }
        ?>


        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 style="text-align: center">Change Password</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">

                    <form  id="passwordForm" action="index.php?controller=UserController&action=changepass" method="POST">
                        <input type="password" class="input-lg form-control" name="currentPass" id="cur_password" placeholder="Current Password" autocomplete="off" pattern="^(?=[^\d_].*?\d)\w(\w|[!@#$%]){7,20}" title="Can contain only aplhanumeric characters and special characters !@#$%. 
                                                                                                                                                                                  Can not start with a digit, underscore or special character and must contain at least one digit.
                                                                                                                                                                                  Must be 8-20 characters long" required>
                        <input type="password" class="input-lg form-control" name="newpassword" id="newpassword" placeholder="New Password" autocomplete="off" style="margin-top:30px;" pattern="^(?=[^\d_].*?\d)\w(\w|[!@#$%]){7,20}" title="Can contain only aplhanumeric characters and special characters !@#$%. 
                                                                                                                                                                                  Can not start with a digit, underscore or special character and must contain at least one digit.
                                                                                                                                                                                  Must be 8-20 characters long" required>
                        <div class="row">
                            <div class="col-sm-6">
                                <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
                                <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
                            </div>
                            <div class="col-sm-6">
                                <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
                                <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
                            </div>
                        </div>
                        <input type="password" class="input-lg form-control" name="confirmpass" id="confirmpass" placeholder="Repeat Password" autocomplete="off"  required>
                        <div class="row">
                            <div class="col-sm-12">
                                <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
                            </div>
                        </div>
                        <input type="submit" name="changepassbtn" class="col-xs-12 btn btn-primary btn-load btn-lg"  value="Change Password" onClick="return confirmPass();">
                    </form>
                </div><!--/col-sm-6-->
            </div><!--/row-->
        </div>   
    </body>

</html>


