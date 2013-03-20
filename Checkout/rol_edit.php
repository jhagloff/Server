<?php include "../database_connect.php"; 
	  include "../functions.php";
	  isAdmin(); 
	  echo "<!DOCTYPE html>";
if (isset($_GET['rol_id']) ) { 
$rol_id = (int) $_GET['rol_id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); } 
$sql = "UPDATE `rol` SET  `user_email` =  '{$_POST['user_email']}' ,  `resource_name` =  '{$_POST['resource_name']}' ,  `res_library_ID` =  '{$_POST['res_library_ID']}' ,  `date_signed_out` =  '{$_POST['date_signed_out']}' ,  `date_due` =  '{$_POST['date_due']}'   WHERE `rol_id` = '$rol_id' "; 
mysqli_query($con,$sql) or die(mysqli_error($con)); 
echo (mysqli_affected_rows($con)) ? "<h3 class='container text-success'>Checkout Edited. </h3><br />" : "<h3 class='container text-error'>Nothing changed. </h3><br />";  
} 
$row = mysqli_fetch_array ( mysqli_query($con,"SELECT * FROM `rol` WHERE `rol_id` = '$rol_id' ")); 
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
<form action='' method='POST'> 
<p><b>User Email:</b><br /><input type='text' required name='user_email' value='<?= stripslashes($row['user_email']) ?>' /> 
<p><b>Resource Name:</b><br /><input type='text' required name='resource_name' value='<?= stripslashes($row['resource_name']) ?>' /> 
<p><b>Res Library ID:</b><br /><input type='text' required name='res_library_ID' value='<?= stripslashes($row['res_library_ID']) ?>' /> 
<p><b>Date Signed Out:</b><br /><input type='text' required name='date_signed_out' value='<?= stripslashes($row['date_signed_out']) ?>' /> 
<p><b>Date Due:</b><br /><input type='text' name='date_due'  required value='<?= stripslashes($row['date_due']) ?>' /> 
<p><input type='submit' class="btn btn-info" value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 

	  <a href="rol_manage.php" class="btn">Back</a>
	
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
