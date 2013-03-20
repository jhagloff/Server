<?php include "functions.php";
	isAdmin();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>The Aperture Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

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
          <a class="brand" href="#">The Aperture Library</a>
          <div class="nav-collapse collapse">
			<!--<form class="navbar-search pull-left">
				<input type="text" class="search-query" placeholder="Search">
			</form> -->
			
            <form class="navbar-form pull-right" method='post'>
              <!--<button type="submit" class="btn">Sign in</button> -->
			  <div>	<a  class="brand">Welcome: <? echo $_SESSION['email'] ?> </a>			  
				  <button class="btn" formaction="../../logout.php">Log Out</button>				  						
			  </div>
			  </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

	<div class="container">
		<p>
		  <h1>Administrator Panel</h1>
		  <div class="container">
		  <div class="hero-unit" id="banner">
		  <img  src ="/img/sys_logo.png">
		  </div>
		  <div align="center" id="buttons">
		  <a href="users/usermanagement.php"> <button class="btn btn-primary" type="button">User Management</button></a>
		  <a href="resources/res_manage.php"><button class="btn btn-primary" type="button">Resource Management</button></a>
		  <a href="checkout/rol_manage.php"><button class="btn btn-primary" type="button">Resource Checkout</button></a>
		  <a href="holds/hold_manage.php"><button class="btn btn-primary" type="button">User Holds</button></a>
		  </buttons>
		</p>
		</div>
	</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>
