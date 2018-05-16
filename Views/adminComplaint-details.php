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
            <title>Admin| Complaint Details</title>
            
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
            <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

            <link href="Views/CSS/themestyle.css" rel="stylesheet" type="text/css"/>

            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
            <script src='https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js'></script>
            
            <script language="javascript" type="text/javascript">
                var popUpWin=0;
                function popUpWindow(URLStr, left, top, width, height)
                {
                 if(popUpWin)
                {
                if(!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
                }

            </script>

        </head>
        <body>
             <?php include("includes/adminheader.php"); ?>

            <div class="wrapper">
                <div class="container">
                    <div class="row">
    				
                        <div class="span9">
                            <div class="content">




                                <div class="module">
                                    <div class="module-head">
                                        <h3 class="card-header text-center font-bold font-up py-4">Complaint Details</h3>
                                    </div>
                                    <div class="module-body table">
                                        <table  id="datatable1" class="table table-bordered table-striped" >

                                            <tbody>

                                                <?php
                                                $st = "";
                                                $comNo=$_GET['cid'];
                                                $deptst="";
                                                 require_once('const_db.php');
                                                $query = mysqli_query($mysqli, "select * from tblcomplaints where complaintNumber='" . $_GET['cid'] . "'");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    ?>									
                                                    <tr>
                                                        <td><b>Complaint Number</b></td>
                                                        <td><?php echo htmlentities($row['complaintNumber']); ?></td>
                                                        <td><b>Complainant Name</b></td>
                                                        <td> <?php echo htmlentities($row['username']); ?></td>
                                                        <td><b>Reg Date</b></td>
                                                        <td><?php echo htmlentities($row['regDate']); ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Category </b></td>
                                                        <td><?php echo htmlentities($row['category']); ?></td>
                                                        <td ><b>Nature of Complaint</b></td>
                                                        <td colspan="3"> <?php echo htmlentities($row['nature']); ?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><b>Complaint Details </b></td>

                                                        <td colspan="5"> <?php echo htmlentities($row['complaintDetails']); ?></td>

                                                    </tr>

                                                   
                                                     <?php if ($_SESSION['user_type'] == 1)  { ?>

                                                     <tr>
                                                        <td><b>Remark</b></td>
                                                        <td colspan="5"><?php echo htmlentities($row['remark']); ?> <b>Remark Date :</b><?php echo htmlentities($row['remarkDate']); ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Status</b></td>
                                                        <td colspan="5"><?php 
                                                        if($row['status']=="closed"){
                                                                $st="closed";
                                                            }
                                                        echo htmlentities($row['status']); ?></td>
                                                    </tr>    
                                                            
                                                    <?php } 
                                                    else {
                                                     
                                                        
                                                        $cno=$_GET['cid'];
                                                        $typeuser=$_SESSION['user_type'];
                                                        
                                                        $stmt = $mysqli->prepare("select * from tblcomplaintsdepts where deptcomplaintNumber=? and departmenttype=?");
                                                        $stmt->bind_param("ii",$cno ,$typeuser );
                                                        $stmt->execute();
                                                        $rslt = $stmt->get_result();
                                                        $rw = mysqli_fetch_array($rslt);
                                                        
                                                        if($rw['deptstatus']=="closed"){
                                                                $deptst="closed";
                                                            }
                                                    
                                                    ?>  
                                                    
                                                    <tr>
                                                        <td><b>Remark</b></td>
                                                        <td colspan="5"><?php echo htmlentities($rw['deptremark']); ?> <b>Remark Date :</b><?php echo htmlentities($rw['deptremarkDate']); ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Status</b></td>
                                                        <td colspan="5"><?php echo htmlentities($rw['deptstatus']); ?></td>
                                                    </tr> 
                                                    
                                                      <?php } ?>
                                                    
                                                    <?php 
                                                        if($_SESSION['login_user']=="admin"){
                                                            
                                                        
                                                        $rslt = mysqli_query($mysqli, "select * from tblcomplaintsdepts where deptcomplaintNumber='" . $_GET['cid'] . "'");
                                                       
                                                    ?>
                                                     <tr>
                                                        <td><b>Reviewing Department(s)</b></td>
                                                        
                                                        <td colspan="5">
                                                            <?php 
                                                           while ($row = mysqli_fetch_array($rslt)) { ?>
                                                            <table>
                                                                <tr>
                                                                    
                                                                
                                                            <?php 
                                                            
                                                            echo htmlentities($row['department']); ?><b>; Status:</b><?php echo htmlentities($row['deptstatus']); ?> <b>; Remark:</b><?php echo htmlentities($row['deptremark']); ?> <b>; Remark Date :</b><?php echo htmlentities($row['deptremarkDate']); ?>
                                                            </tr>
                                                            </table>
                                                       <?php } ?>
                                                        </td></tr>
                                                    
                                                        <?php } ?>
                                                    
                                                    <tr>
                                                        <td><b>Action</b></td>

                                                        <td colspan="5"> 
                                                <?php if ($st == "closed" || $deptst == "closed") {

                                                        } else {
                                                           
                                                            ?>
                                                                <a href="javascript:void(0);"  onClick="popUpWindow('index.php?controller=UserController&action=updatecompDetail&cid=<?php echo htmlentities($comNo);?>');">
                                                            <button type="button" class="btn btn-primary">Take Action</button></a>
                                                            
                                                             <?php if ($_SESSION['user_type'] == 1)  { ?>

                                                             <a href="javascript:void(0);"  onClick="popUpWindow('index.php?controller=UserController&action=sendcompDetail&cid=<?php echo htmlentities($comNo);?>');">
                                                            <button type="button" class="btn btn-primary">Send Complaint</button></a></td>
                                                            
                                                             <?php } ?>     
                                                            <?php } ?>
                                                        

                                                    </tr>
                                                    
                                                
                                                <?php } ?>

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
                    $('#datatable-1').dataTable();
                });
            </script>
        </body>
    </html>