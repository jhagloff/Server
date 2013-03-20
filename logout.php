<?php
//Logout User
session_start();
	if(isset($_SESSION['user'])){
		unset($_SESSION['user']);
	}
	if(isset($_SESSION['admin'])){
		unset($_SESSION['admin']);
	}
	if(isset($_SESSION['email'])){
		unset($_SESSION['email']);
	}
	
session_destroy();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Logged Out</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
   <!-- <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet"> -->
	<link href="css/bootstrap.css" rel="stylesheet">
    <!-- <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet"> -->
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<script src="/index_files/jquery.js"></script>
	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
  </head>
  <body>	  
	
  <div class="container">
	
  <div class="row">
	
	<!--
  <div class="span8">
	<div class="alert alert-success">
	  Well done! You successfully read this important alert message.
	</div>
	-->

	<form class="form-horizontal" id="registerHere" method='post' action='index.php'>
	  <fieldset>
	    <legend>Successfully Logged out</legend>
		<h3>You have been successfully Logged out!</3>

	<div class="control-group">
		<label class="control-label" for="input01"></label>
	      <div class="controls">
	       <a class="btn" href="index.html">Back</a>
	       <!--This might be where the php is put to get all the info from the fields and call a PHP file. -->
	      </div>
	
	</div>
	
	
	   
	  </fieldset>
	</form>
	</div>
	
		</div>
        
        
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
	 <div class="container">
        <p>Esoteric 2013</p>
</div>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<!-- This appears to be a sneaky link that gives the dude that scripted this page free google ad hits everytime this script is used. It will be deleted once I fully verify that commenting this out will cause no issues. -->
<!--<iframe src="http://demos.9lessons.info/counter.html" frameborder="0" scrolling="no" height="0"></iframe>-->
  

  </body>
</html>

