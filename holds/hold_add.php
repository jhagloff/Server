<?php include "../database_connect.php"; 
	  include "../functions.php";
	  isAdmin(); 
	  echo "<!DOCTYPE html>";
if (isset($_POST['submitted'])) { 

	$curDate = date("Y-m-d",time());
	$dueDate = date('Y-m-d', strtotime('+2 week'));
	$res = $_POST['resource_name'];
	$res_id = "SELECT res_library_ID from resource where res_title = '$res'";
	$lib_result = mysqli_query($con,$res_id);


	$userRow = mysqli_fetch_assoc($lib_result);
	$libID= $userRow['res_library_ID'];

foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); } 
$sql = "INSERT INTO `userhold` ( `user_email` ,  `resource_name` , `res_library_ID` , `hold_start` ,  `hold_end`  ) VALUES(  '{$_POST['user_email']}' ,  '{$_POST['resource_name']}' , '{$libID}', '{$curDate}' ,  '{$dueDate}'  ) "; 

if(!mysqli_query($con,$sql)){
	echo "<h3 class='container text-error'>Cannot create User Hold</h3><br>";
	mysqli_close($con);
}
else{
echo "<h3 class='container text-success'>User Hold Created </h3><br>"; 
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
	 textarea{
		height:100px; 
		max-height:100px; 
		width:200px; 
		max-width:200px 
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

      <h1>Create a User Hold</h1>
      <p>This page is for creating a User Hold</p>
<form action='' method='POST'> 
<p><b>User Email:</b><br /><input type='email' required name='user_email'/> 
<p><b>Resource Name:</b><br /><input type='text' required name='resource_name'/>  
<p><input type='submit' class="btn btn-info" value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 


	  <a href="hold_manage.php" class="btn">Back</a>
	
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
