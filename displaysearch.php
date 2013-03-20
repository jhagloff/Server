<?php 
session_start(); 
include "search.php";
echo "<!DOCTYPE html>";
?>

<!-- saved from url=(0054)http://twitter.github.com/bootstrap/examples/hero.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>The Aperture Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
   <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet">
	<!--<link href="../../bootstrap/css/bootstrap.css" rel="stylesheet"> -->
	
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">
	<!--<link href="../../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"> -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="http://twitter.github.com/bootstrap/assets/ico/favicon.png">
  <style type="text/css">
  
  body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
  
  </style></head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.html">The Aperture Library</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.html">Home</a></li>              
            </ul>
			<form class="navbar-form pull-left" method='post' action='displaysearch.php'>
				<input type="text" class="search-query" name="search" placeholder="Search">
				<button type="submit" class="btn">Search</button> </a>
			</form>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Username">
              <input class="span2" type="password" placeholder="Password">
              <!--<button type="submit" class="btn">Sign in</button> -->
			  <div class="btn-group">				  
				  <button class="btn">Sign In</button>				  						
				<a href="form.html" class="btn">Join</a>
			  </div>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
	  
		  <p> <h1>Search Results</h1> 
			<p>				
				<?php					
					search();
				?>
			</p>		
		<br>       
      </div>
	  <a href="index.html"><button class="btn btn-primary" type="button">Back</button></a>
      <hr>
		
      <footer>
        <p>© Esoteric 2013</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./index_files/jquery.js"></script>
    <script src="./index_files/bootstrap-transition.js"></script>
    <script src="./index_files/bootstrap-alert.js"></script>
    <script src="./index_files/bootstrap-modal.js"></script>
    <script src="./index_files/bootstrap-dropdown.js"></script>
    <script src="./index_files/bootstrap-scrollspy.js"></script>
    <script src="./index_files/bootstrap-tab.js"></script>
    <script src="./index_files/bootstrap-tooltip.js"></script>
    <script src="./index_files/bootstrap-popover.js"></script>
    <script src="./index_files/bootstrap-button.js"></script>
    <script src="./index_files/bootstrap-collapse.js"></script>
    <script src="./index_files/bootstrap-carousel.js"></script>
    <script src="./index_files/bootstrap-typeahead.js"></script> 	

</body></html>

