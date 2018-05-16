
<div id='navBar'>
  <img class='seal' src="/Images/mamaroneckSeal.jpg" alt="Village Seal" height="100" width="100">
  <h2  class='text-center' id='navBarHeader'></h2>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   <div class="navbar-header">
      <a id="homeLink" class="navbar-brand" href="index.php?controller=UserController&action=dashboard">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a id='formHistoryLink' href="index.php?controller=UserController&action=approverdashboard">Form History</a><li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Complaint
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a id="npc" href="index.php?controller=UserController&action=noprocessComplaint">Not Processed Complaints</a></li>
          <li><a id="ipc" href="index.php?controller=UserController&action=inprocessComplaint">Pending Complaints</a></li>
          <li><a id="cc" href="index.php?controller=UserController&action=closedComplaint">Closed Complaints</a></li>

        </ul>
      </li>

      <li><a id="cp" href="index.php?controller=UserController&action=changepass">Change Password</a></li>

    </ul>
    <div class="pull-right">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome: <?php echo  $_SESSION['login_user']; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li><a id='lg' href="index.php?controller=UserController&action=logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
              </div>
  </div>
</nav>
