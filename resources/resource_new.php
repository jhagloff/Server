<?php include "../database_connect.php"; 
	  include "../functions.php";
	  isAdmin(); 
	  echo "<!DOCTYPE html>";
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); } 
$sql = "INSERT INTO `resource` ( `res_title` ,  `res_author` ,  `res_description` ,  `res_library_ID` ,  `res_type` ,  `res_volume` ,  `res_issue` ,  `res_isbn` ,  `res_date`  ) VALUES(  '{$_POST['res_title']}' ,  '{$_POST['res_author']}' ,  '{$_POST['res_description']}' ,  '{$_POST['res_library_ID']}' ,  '{$_POST['res_type']}' ,  '{$_POST['res_volume']}' ,  '{$_POST['res_issue']}' ,  '{$_POST['res_isbn']}' ,  '{$_POST['res_date']}'  ) "; 
if(!mysqli_query($con,$sql)){
	echo "<h3 class='container text-error'>Cannot Add Resource</h3><br>";
	mysqli_close($con);
}
else{
echo "<h3 class='container text-success'>Added Resource. </h3><br>"; 
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

      <h1>Add a Resource</h1>
      <p>This page is for Adding a Resource</p>
<form action='' method='POST'> 
<p><b>Title:</b><br /><input required type='text' maxlength="150" name='res_title'/> 
<p><b>Author:</b><br /><input required type='text'maxlength="200" name='res_author'/> 
<p><b>Description:</b><br /><textarea maxlength="300" rows="4" cols="10" name='res_description'>
</textarea>

<!--<input type='text' name='res_description'/> -->
<p><b>Library ID:</b><br />
<select name='res_library_ID'>
	<option value="PRIDE">Pride Club</option>
	<option value="WOMENS">Women's Centre</option>
	<option value="LPIRG">LPIRG</option>
</select>
<p><b>Resource Type:</b><br />
<select name='res_type'>
	<option value="Book">Book</option>
	<option value="Film">Film</option>
	<option value="Periodical">Periodical</option>
</select>
<p><b>Volume Number:</b><br /><input type='text' name='res_volume'/> 
<p><b>Issue Number:</b><br /><input type='text' name='res_issue'/> 
<p><b>ISBN:</b><br /><input type='text' name='res_isbn'/> 
<p><b>Date:</b><br /><input required pattern='\d{4}[\-]\d{2}[\-]\d{2}' title="Format YYYY-MM-DD" type='text' name='res_date'/> 
<p><input type='submit' class="btn btn-info" value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 


	  <a href="res_manage.php" class="btn">Cancel</a>
	
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
