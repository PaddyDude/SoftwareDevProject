<?php

include_once("Models/User.php");


class Model {

  public $department;
   public $model;

    public function getlogin() {

        require_once('const_db.php');

        if (isset($_POST['username']) && isset($_POST['password'])) {

            if (isset($_POST) && !empty($_POST)) {
                $myusername = mysqli_real_escape_string($mysqli, $_POST["username"]);
                $mypassword = $_POST['password'];

            }

            $stmt = $mysqli->prepare("SELECT user_type,password,dept,email FROM user WHERE username = ?");
            $stmt->bind_param("s", $myusername);
            $stmt->execute();

            $stmt->bind_result($user_type,$password, $department, $user_email);
            $stmt->fetch();
            if(password_verify($mypassword,$password)){
			if ($user_type == '') {
                            return 'Invalid Login Credentials';
                        } else {
                            $_SESSION['user_dept'] = $department;
                            $_SESSION['login_user'] = $myusername;
                            $_SESSION['user_type'] = $user_type;
                            $_SESSION['user_email'] = $user_email;
                            echo "here";
                            return $user_type;
            }
		}
		else{
			return "Invalid Login Credentials";
		}



        }
    }

    public function addUser() {
        include_once("const_db.php");

        if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['user_name']) && isset($_POST['user_password']) && isset($_POST['email']) && isset($_POST['contact_no'])) {
            $myusername = mysqli_real_escape_string($mysqli, $_POST['user_name']);
            $email = $_POST['email'];
            $mypassword = $_POST['user_password'];
            $hashedPassword = password_hash($mypassword, PASSWORD_BCRYPT);
            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];



            $contact = $_POST['contact_no'];
            $type = 2;


            $stmt = $mysqli->prepare("INSERT INTO user(username,email,password,fname,lname,phone,user_type) VALUES(?,?,?,?,?,?,?)");
       $stmt->bind_param("ssssssi", $myusername, $email, $hashedPassword, $fname, $lname, $contact,$type);

         if ($stmt->execute()) {

                $msg = "User Created Successfully.";
            }
             else {
                $msg = "User Registration Failed";

            }




            $stmt->close();
            echo "<script>(function(){alert('$msg');})();</script>";
            return $msg;

        }
    }

    public function userCheck() {
        include_once("const_db.php");
        if (isset($_POST) & !empty($_POST)) {

            $user = $_POST['username'];



            $sql = "SELECT * FROM user WHERE username='$user'";
            $result = mysqli_query($mysqli, $sql);
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                echo "Username Not Available. Please try another one.";
                echo "<script>$('#register').prop('disabled',true);</script>";
            } else {
                echo "Username Available";
                echo "<script>$('#register').prop('disabled',false);</script>";
            }
        }
    }



    public function changePass() {

        include_once('const_db.php');

        if (isset($_POST['changepassbtn'])) {
            $pass =($_POST['currentPass']);
            $user = $_SESSION['login_user'];
            $newpass =$_POST['newpassword'];
            $hashedPassword = password_hash($newpass, PASSWORD_BCRYPT);

            $stmt = $mysqli->prepare("SELECT password FROM  user where username=?");
            $stmt->bind_param("s", $user);
             if ($stmt->execute()) {
                $stmt->bind_result($password);
                $stmt->fetch();
                $stmt->close();
                if(password_verify($pass,$password)){

                    if (!mysqli_query($mysqli,"UPDATE USER SET PASSWORD='$hashedPassword' WHERE username='$user'"))
                    {
                    echo '<script> alert("Password Not Changed Successfully !!")</script>';
                    }
                    else {
                        echo '<script> alert("Password Changed Successfully !!")</script>';
                    }

                 }
               else
               {
                  echo '<script> alert("Old Password not match !!")</script>';
               }
            }
            else{
                    echo '<script> alert("Old Password not match !!")</script>';
            }

        }

    }



    public function submitComplaint() {
        include_once('const_db.php');
        $cmpn = "";

        if (isset($_POST['registerComplaint'])) {


            $user = $_SESSION['login_user'];
            $category = $_POST['complaintCat'];
            $nature = $_POST['subject'];
            $complaintdetials = $_POST['complaindetails'];
            $status = "pending";


            $stmt = $mysqli->prepare("insert into tblcomplaints(username,category,nature,complaintDetails,status) values(?,?,?,?,?)");
            $stmt->bind_param("sssss", $user, $category, $nature, $complaintdetials, $status);

             if ($stmt->execute()) {

                $sql = mysqli_query($mysqli, "select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1");
            while ($row = mysqli_fetch_array($sql)) {
                $cmpn = $row['complaintNumber'];
            }
            $complainno = $cmpn;
            echo '<script> alert("Your complaint has been successfully filled and your complaintno is  "+"' . $complainno . '")</script>';
            }
             else {

                  echo '<script> alert("Not Submitted")</script>';
            }



        }
    }

    public function updateComplaint()
    {
        include_once('const_db.php');
        if (isset($_POST['update'])) {
        $complaintnumber = $_GET['cid'];
        $status = $_POST['status'];
        $remark = $_POST['remark'];

        if($_SESSION['login_user']=="admin"){
        $sql = mysqli_query($mysqli, "update tblcomplaints set status='$status',remark='$remark' where complaintNumber='$complaintnumber'");
        }
        else{
            $sql = mysqli_query($mysqli, "update tblcomplaintsdepts set deptstatus='$status',deptremark='$remark' where deptcomplaintNumber='$complaintnumber' and departmenttype=".$_SESSION['user_type']);
        }

        echo "<script>alert('Complaint details updated successfully');</script>";
    }
    }

    public function sendComplaint()
    {
        include_once('const_db.php');
        if (isset($_POST['send']))
        {
            $complaintnumber = $_GET['cid'];
            $dept = $_POST['dept'];
            $ndept = count($dept);
            $status="pending";

            if($ndept==2)
            {
                $type=4;
                $dt="Fire Department";
                $stmt = $mysqli->prepare("insert into tblcomplaintsdepts(deptcomplaintNumber,department,deptstatus,departmenttype) values(?,?,?,?)");
                $stmt->bind_param("issi", $complaintnumber,$dt , $status,$type);
                $stmt->execute();
                $stmt->close();

                $type=3;
                $dt="Police Department";
                $st = $mysqli->prepare("insert into tblcomplaintsdepts(deptcomplaintNumber,department,deptstatus,departmenttype) values(?,?,?,?)");
                $st->bind_param("issi", $complaintnumber, $dt, $status,$type);


                if ($st->execute())
                {
                    echo "<script>alert('Complaint sent successfully');</script>";
                }
                else {
                        echo "<script>alert('Complaint not sent');</script>";
                }

            }
            else
            {
                $val=json_encode($dept[0]);

                if($val=='"Police Department"')
                {
                    $type=3;
                     $dt="Police Department";
                }
                else{
                    $type=4;
                     $dt="Fire Department";
                }
                $stmt = $mysqli->prepare("insert into tblcomplaintsdepts(deptcomplaintNumber,department,deptstatus,departmenttype) values(?,?,?,?)");
                $stmt->bind_param("issi", $complaintnumber, $dt, $status,$type);

                if ($stmt->execute())
                {
                    echo "<script>alert('Complaint sent successfully');</script>";
                }
                else {
                        echo "<script>alert('Complaint not sent');</script>";
                }
            }






        }

    }
    }
