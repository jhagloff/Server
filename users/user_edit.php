<?php include "../database_connect.php"; 
	  include "../functions.php";
	  isAdmin(); 
	  echo "<!DOCTYPE html>";
if (isset($_GET['usr_id']) ) { 
$usr_id = (int) $_GET['usr_id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); } 
$sql = "UPDATE `users` SET  `usr_fname` =  '{$_POST['usr_fname']}' ,  `usr_lname` =  '{$_POST['usr_lname']}' ,  `usr_email` =  '{$_POST['usr_email']}' ,  `usr_phone` =  '{$_POST['usr_phone']}' ,  `usr_password` =  '{$_POST['usr_password']}' ,  `usr_type` =  '{$_POST['usr_type']}'   WHERE `usr_id` = '$usr_id' "; 
mysqli_query($con,$sql) or die(mysqli_error()); 
echo (mysqli_affected_rows($con)) ? "<h3 class='container text-success'>Edited Row. </h3><br />" : "<h3 class='container text-error'>Nothing changed. </h3><br />";  
} 
$row = mysqli_fetch_array ( mysqli_query($con,"SELECT * FROM `users` WHERE `usr_id` = '$usr_id' "));
mysqli_close($con); 
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>The Aperture Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="../adminpanel.php">The Aperture Library</a>
          <div class="nav-collapse collapse">
			<!-- <form class="navbar-search pull-left">
				<input type="text" class="search-query" placeholder="Search">
			</form> -->
			
			  <div class="pull-right">
				<form method="post" action="../logout.php">
				<a class="brand">Welcome: <? echo $_SESSION['email'] ?> </a>
				  <button class="btn" formaction="../logout.php">Log Out</button>		
					</form>
			  </div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="hero-unit container">

      <h1>Edit User</h1>
      <p>This page is for editing Users</p>
	  <form action='' method='POST'> 
<p><b>First Name:</b><br /><input type='text' required name='usr_fname' value='<?= stripslashes($row['usr_fname']) ?>' /> 
<p><b>Last Name:</b><br /><input type='text' required name='usr_lname' value='<?= stripslashes($row['usr_lname']) ?>' /> 
<p><b>User Email:</b><br /><input type='email' required name='usr_email' value='<?= stripslashes($row['usr_email']) ?>' /> 
<p><b>Phone Number:</b><br /><input type='text' required name='usr_phone' value='<?= stripslashes($row['usr_phone']) ?>' /> 
<p><b>User Password:</b><br /><input type='text' required name='usr_password' value='<?= stripslashes($row['usr_password']) ?>' /> 
<p><b>User Level:</b><br /><input type='text' name='usr_type' value='<?= stripslashes($row['usr_type']) ?>' /> 
<p><input type='submit' class="btn btn-info" value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 

	  <a href="usermanagement.php" class="btn">Back</a>
	
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>

  </body>
</html>
