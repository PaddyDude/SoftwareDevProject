<div class="container">
   <div class="page-header">
     <h1 style="text-align: center;">Complaints Notification</h1>

   </div>
   <section id="main-content">
   <section class="wrapper">

       <div class="row">
           <div class="col-lg-9 main-chart">


               <div class="col-md-2 col-sm-2 box0">
                   <div>

                   </div></div>


               <div class="col-md-2 col-sm-2 box0">
                   <div class="box1">
                       <span class="li_news"></span>
                       <?php
                        if($_SESSION['login_user']=="admin"){
                            $rt = mysqli_query($mysqli, "SELECT * FROM tblcomplaints where status='pending'");
                        }
                        else if($_SESSION['user_type']==3 || $_SESSION['user_type']==4 ){
                            $rt = mysqli_query($mysqli, "SELECT * FROM tblcomplaints a INNER JOIN tblcomplaintsdepts b ON a.complaintNumber=b.deptcomplaintNumber where b.deptstatus='pending' and b.departmenttype=".$_SESSION['user_type']);


                        }
                       else {
                           $rt = mysqli_query($mysqli, "SELECT * FROM tblcomplaints where username='".$_SESSION['login_user']."' and status='pending'");
                      }

                       $num1 = mysqli_num_rows($rt);
                       {
                           ?>
                           <h3><?php echo htmlentities($num1); ?></h3>
                       </div>
                       <p><?php echo htmlentities($num1); ?> Complaints not Process yet</p>
                   </div>
<?php } ?>


               <div class="col-md-2 col-sm-2 box0">
                   <div class="box1">
                       <span class="li_news"></span>
                       <?php
                       $status = "in Process";
                       if($_SESSION['login_user']=="admin"){
                            $rt = mysqli_query($mysqli, "SELECT * FROM tblcomplaints where status='in process'");
                        }
                         else if($_SESSION['user_type']==3 || $_SESSION['user_type']==4 ){
                            $rt = mysqli_query($mysqli, "SELECT * FROM tblcomplaints a INNER JOIN tblcomplaintsdepts b ON a.complaintNumber=b.deptcomplaintNumber where b.deptstatus='in process' and b.departmenttype=".$_SESSION['user_type']);


                        }
                       else {
                           $rt = mysqli_query($mysqli, "SELECT * FROM tblcomplaints where username='".$_SESSION['login_user']."' and  status='in process'");
                      }

                       $num1 = mysqli_num_rows($rt);
                       {
                           ?>
                           <h3><?php echo htmlentities($num1); ?></h3>
                       </div>
                       <p><?php echo htmlentities($num1); ?> Complaints Status in process</p>
                   </div>
<?php } ?>

               <div class="col-md-2 col-sm-2 box0">
                   <div class="box1">
                       <span class="li_news"></span>
                       <?php
                       $status = "closed";
                       if($_SESSION['login_user']=="admin"){
                            $rt = mysqli_query($mysqli, "SELECT * FROM tblcomplaints where status='closed'");
                        }
                         else if($_SESSION['user_type']==3 || $_SESSION['user_type']==4 ){
                            $rt = mysqli_query($mysqli, "SELECT * FROM tblcomplaints a INNER JOIN tblcomplaintsdepts b ON a.complaintNumber=b.deptcomplaintNumber where b.deptstatus='closed' and b.departmenttype=".$_SESSION['user_type']);


                        }
                       else {
                            $rt = mysqli_query($mysqli, "SELECT * FROM tblcomplaints where username='".$_SESSION['login_user']."' and  status='closed'");
                      }

                       $num1 = mysqli_num_rows($rt);
                       {
                           ?>
                           <h3><?php echo htmlentities($num1); ?></h3>
                       </div>
                       <p><?php echo htmlentities($num1); ?> Complaint has been closed</p>
                   </div>

<?php } ?>


           </div><!-- /row mt -->






   </section>
</section>
</div>
