<?php 

if(strlen($_SESSION['login_user'])=="")
	{	
header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css'>


        <link href="Views/CSS/themestyle.css" rel="stylesheet" type="text/css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




        <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
        <script src='https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js'></script>


        <script>
            $(document).ready(function () {
                document.getElementById('navBarHeader').innerHTML = 'Handle Complaints';
                $('#example').DataTable();
            });

        </script>
    </head>
    <body>

        <?php include("includes/header.php");
        ?>





        <div class='container' >
            <div class='row justify-content-center'>



                <div class="view gradient-card-header purple-gradient narrower py-4 mx-4 mb-3 d-flex justify-content-center align-items-center">


                    <h3 class="card-header text-center font-bold font-up py-4">Complaint Detail</h3>
                </div>


                <?php
                 require_once('const_db.php');
                $query = mysqli_query($mysqli, "select * from tblcomplaints where username='" . $_SESSION['login_user'] . "' and complaintNumber='" . $_GET['cid'] . "'");
                while ($row = mysqli_fetch_array($query)) {
                    ?>
               
                <div class="row" style="margin-top: 30px;background-color:  gainsboro ">
                        <label class="col-md-3"><b>Complaint Number : </b></label>
                        <div class="col-md-3">
                            <p><?php echo htmlentities($row['complaintNumber']); ?></p>
                        </div>
                        <label class="col-md-3"><b>Reg. Date :</b></label>
                        <div class="col-md-3">
                            <p><?php echo htmlentities($row['regDate']); ?></p>
                        </div>
                    </div>


                    <div class="row" style="margin-top: 30px;background-color: gainsboro;">
                        <label class="col-md-3"><b>Category :</b></label>
                        <div class="col-md-3">
                            <p><?php echo htmlentities($row['category']); ?></p>
                        </div>
                        <label class="col-md-3"><b>Nature of Complaint :</b></label>
                        <div class="col-md-3">
                            <p><?php echo htmlentities($row['nature']); ?></p>
                        </div>
                    </div>
                
                   
                    <div class="row" style="margin-top: 30px;background-color: gainsboro;">
                        <label class="col-md-3"><b>Complaint Details </label>
                        <div class="col-md-9">
                            <p><?php echo htmlentities($row['complaintDetails']); ?></p>
                        </div>
                       

                    </div> 
                
                     <div class="row" style="margin-top: 30px;background-color: gainsboro;">
                        
                        <label class="col-md-3"><b>Remark :</b></label>
                        <div class="col-md-9">
                            <p><?php echo htmlentities($row['remark']); ?> <b>(Remark Date :</b><?php echo htmlentities($row['remarkDate']); ?><b>)</b></p>
                        </div>
                    </div>

               
               <?php } ?>
                 







            </div>
           

        </div>





    </body>

</html>

