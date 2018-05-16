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
 
   
   
 </head>
 <body>

<?php include("includes/header.php"); 
 ?>





<div class='container'>
  <div class='row justify-content-center'>
    
 
    
    <div class="view gradient-card-header purple-gradient narrower py-4 mx-4 mb-3 d-flex justify-content-center align-items-center">

       
        <h3 class="card-header text-center font-bold font-up py-4">Complaint History</h3>
    </div>
    
   
      <table class="table table-bordered table-striped table-condensed" >
        <thead>
        <tr>
            <th>Complaint Number</th>
            <th>Reg Date</th>
            <th>Last Updation date</th>
            <th >Status</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
            <?php 
            
           /*  $mysqli = new mysqli('localhost','root','','smartcitydb');
            if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
            } */
              
            require_once('const_db.php');
            
                $stmt =  $mysqli->prepare("select * from tblcomplaints where username='".$_SESSION['login_user']."'");
                 if (!$stmt->execute()) {
                    trigger_error('Error executing MySQL query: ' . $stmt->error);
                }

                
                //$stmt->execute();
                $rslt = $stmt->get_result();
              while($row=mysqli_fetch_assoc($rslt))
                {
                ?>
                <tr>
                    <td align="center"><?php echo htmlentities($row['complaintNumber']);?></td>
                    <td align="center"><?php echo htmlentities($row['regDate']);?></td>
                    <td align="center"><?php echo  htmlentities($row['lastUpdtionDate']);?></td>
                    <td align="center"><?php 
                      $status=$row['status'];
                      if($status=="pending"){ ?>
                        <button type="button" class="btn btn-danger">Not Process Yet</button>
                        <?php }
                      if($status=="in process"){ ?>
                        <button type="button" class="btn btn-warning">In Process</button>
                        <?php }
                      if($status=="closed") { ?>
                        <button type="button" class="btn btn-success">Closed</button>
                        <?php } ?>
                    <td align="center">
                        <a href="index.php?controller=UserController&action=compDetail&cid=<?php echo htmlentities($row['complaintNumber']);?>">
                    <button type="button" class="btn btn-primary">View Details</button></a>
                    </td>
                </tr>
            <?php } ?>
                            
        </tbody>
    </table>
        
        
        

    

   
    </div>
    <!--Bottom Table UI-->

</div>
                
            
                
 

 </body>
 
 </html>
