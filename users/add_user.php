<?php include "../database_connect.php"; 
	  include "../functions.php";
	  isAdmin(); 
	  echo "<!DOCTYPE html>";
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); } 
$encrypass = md5($_POST['usr_password']);
$sql = "INSERT INTO `users` ( `usr_fname` ,  `usr_lname` ,  `usr_email` ,  `usr_phone` ,  `usr_password` ,  `usr_type`  ) VALUES(  '{$_POST['usr_fname']}' ,  '{$_POST['usr_lname']}' ,  '{$_POST['usr_email']}' ,  '{$_POST['usr_phone']}' ,  '{$encrypass}' ,  '{$_POST['usr_type']}'  ) "; 
if(!mysqli_query($con,$sql)){
	echo "<h3 class='container text-error'>Cannot Add User: Email Already Taken </h3><br>";
	mysqli_close($con);
}
else{
echo "<h3 class='container text-success'>Added User. </h3><br>"; 
mysqli_close($con);
}

} 

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

      <h1>Add User</h1>
      <p>This page is for Adding a User</p>
<form action='' method='POST'> 
<p><b>First Name:</b><br /><input required type='text' name='usr_fname'/> 
<p><b>Last Name:</b><br /><input required type='text' name='usr_lname'/> 
<p><b>User Email:</b><br /><input required type='email' name='usr_email'/> 
<p><b>Phone Number:</b><br /><input required type='tel' pattern='[\(]\d{3}[\)][\ ]\d{3}[\-]\d{4}'  title="Format(999) 999-9999" name='usr_phone'/> 
<p><b>User Password:</b><br /><input type='text' name='usr_password'/> 
<p><b>User Level:</b><br />
<select name='usr_type'>
	<option value="0">Regular</option>
	<option value="1">Administrator</option>
</select>

<!--<input type='text' name='usr_type'/>  -->
<p><input type='submit' class="btn btn-info" value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 


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
