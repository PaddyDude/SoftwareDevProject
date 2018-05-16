<?php 

if(strlen($_SESSION['login_user'])=="")
	{	
header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| In Process Complaints</title>
        
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

        <link href="Views/CSS/themestyle.css" rel="stylesheet" type="text/css"/>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
        <script src='https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js'></script>
        
    </head>
    <body>
       <?php include("includes/adminheader.php"); 
 ?>


        <div class="wrapper">
            <div class="container">
                <div class="row">
                  				
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                                <div class="module-head">
                                    <h3 class="card-header text-center font-bold font-up py-4">In Process Complaints</h3>
                                </div>
                                <div class="module-body table">



                                    <table  id="datatable1" class="table table-bordered table-striped" >
                                        <thead>
                                            <tr>
                                                <th>Complaint No</th>
                                                <th> complainant Name</th>
                                                <th>Reg Date</th>
                                                <th>Status</th>

                                                <th>Action</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            
                                              require_once('const_db.php');
                                            
                                            if($_SESSION['user_type']==3 || $_SESSION['user_type']==4 ){
                                                $query = mysqli_query($mysqli, "SELECT * FROM tblcomplaints a INNER JOIN tblcomplaintsdepts b ON a.complaintNumber=b.deptcomplaintNumber where b.deptstatus='in process' and b.departmenttype=".$_SESSION['user_type']);

                                            }
                                            else {
                                               $query = mysqli_query($mysqli, "select * from tblcomplaints where status='in process' "); 
                                            }
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>										
                                                <tr>
                                                    <td><?php echo htmlentities($row['complaintNumber']); ?></td>
                                                    <td><?php echo htmlentities($row['username']); ?></td>
                                                    <td><?php echo htmlentities($row['regDate']); ?></td>

                                                    <td><button type="button" class="btn btn-warning">In Process</button></td>

                                                    <td>    <a href="index.php?controller=UserController&action=admincompDetail&cid=<?php echo htmlentities($row['complaintNumber']);?>">
                                                            <button type="button" class="btn btn-primary">View Details</button></a>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>						



                        </div><!--/.content-->
                    </div><!--/.span9-->
                </div>
            </div><!--/.container-->
        </div><!--/.wrapper-->





        <script>
            $(document).ready(function () {
                $('#datatable1').dataTable();
              
            });
        </script>
    </body>
</html>
