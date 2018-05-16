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
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Forms
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?controller=UserController&action=film">Film Permit</a></li>
          <li><a href="index.php?controller=UserController&action=parking">Parking Permit</a></li>
            <li><a id='formHistoryLink' href="index.php?controller=UserController&action=approverdashboard">Form History</a><li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Complaint
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?controller=UserController&action=submitComplaint">Submit Complaint</a></li>
          <li><a href="index.php?controller=UserController&action=CompHistory">Complaint History</a></li>

        </ul>
      </li>

      <li><a href="index.php?controller=UserController&action=changepass">Change Password</a></li>

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
