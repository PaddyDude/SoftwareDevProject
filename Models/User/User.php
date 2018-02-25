<?php

class User {
    public function getlogin()
    {

         include_once("../const_db.php");

        // If form is submitted or not

         if(isset($_POST['username']) && isset($_POST['password']))
        {

             if(isset($_POST) && !empty($_POST)){
                $myusername = mysqli_real_escape_string($mysqli,$_POST["username"]);
                $mypassword = md5($_POST['password']);

             }

            /*$sql = "SELECT * FROM user WHERE ";
            if(filter_var($myusername,FILTER_VALIDATE_EMAIL))
            {
                $sql .= "email='$myusername' ";
            }
            else {
               $sql .="username='$myusername'" ;
            }
            $sql .= " AND password = '$mypassword' AND active=1";
            $result = mysqli_query($db,$sql);
            $count = mysqli_num_rows($result);

             if($count == 1) {

               $_SESSION['login_user'] = $myusername;
               return 'login';
            }else {
               return 'Invalid Login Credentials';
            }             */

            $stmt = $mysqli->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
            $stmt->bind_param("ss", $myusername, $mypassword);
            $stmt->execute();

           // If result matched $myusername and $mypassword, table row must be 1 row

            $rslt = $stmt->get_result();
            if($rslt->num_rows === 0)
            {
                return 'Invalid Login Credentials';
            }
            else {
               $_SESSION['login_user'] = $myusername;
               return 'login';
            }





        }

    }

     public function addUser()
    {
         include_once("../const_db.php");

         if(isset($_POST['first_name'])&& isset($_POST['last_name']) && isset($_POST['user_name']) && isset($_POST['user_password']) && isset($_POST['email']) && isset($_POST['contact_no']) ){
            $myusername = mysqli_real_escape_string($mysqli,$_POST['user_name']);
            $email = $_POST['email'];
            $mypassword = md5($_POST['user_password']);
             $fname=$_POST['first_name'];
            $lname=$_POST['last_name'];



            $contact=$_POST['contact_no'];

            $stmt = $mysqli->prepare("INSERT INTO user(username,email,password,FirstName,LastName,Contact) VALUES(?,?,?,?,?,?)");
            $stmt->bind_param("sssssi",$myusername,$email,$mypassword,$fname,$lname,$contact);
            $stmt->execute();


            $rslt = $stmt->get_result();
            if($rslt< 0)
            {
              $msg ="User Registration Failed";
            }
            else {
              $msg = "User Created Successfully.";

            }

            $stmt->close();
            echo "<script>(function(){alert('$msg');})();</script>";
            return $msg;
         }
    }

    public function userCheck()
    {
        include_once("../const_db.php");
        if(isset($_POST) & !empty($_POST) ){

        $username =$_POST['username'];

	$sql = "SELECT * FROM user WHERE username='$username'";
	$result = mysqli_query($mysqli, $sql);
	$count = mysqli_num_rows($result);

	if($count == 1){
		echo "Username Not Available";
	}else{
		echo "Username Available";
	}
}

    }


}
