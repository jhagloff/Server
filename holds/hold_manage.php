<?php include "../functions.php";
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
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="..//css/bootstrap.css" rel="stylesheet">
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

      <h1>User Holds</h1>
      <p>This page is for editing a User Holds</p>
	  
	  
	  <? 
include('../database_connect.php'); 
echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"table table-striped table-bordered\" id=\"example\" >"; 
echo"<thead>";
echo "<tr class=\"colhead\"> "; 
echo "<th>Hold Id</th>"; 
echo "<th>User Email</th>"; 
echo "<th>Resource Name</th>"; 
echo "<th>Libray</th>";
echo "<th>Hold Start</th>"; 
echo "<th>Hold End</th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>"; 
echo "</thead>";
echo "<tfoot>";
echo "<tr class=\"colhead\"> "; 
echo "<th>Hold Id</th>"; 
echo "<th>User Email</th>"; 
echo "<th>Resource Name</th>"; 
echo "<th>Libray</th>";
echo "<th>Hold Start</th>"; 
echo "<th>Hold End</th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>"; 
echo "</tfoot>";

echo "<tbody>";
$result = mysqli_query($con,"SELECT * FROM `userhold`") or trigger_error(mysql_error($con)); 
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 

echo "<tr>";  
echo "<td>" . nl2br( $row['hold_id']) . "</td>";  
echo "<td>" . nl2br( $row['user_email']) . "</td>";  
echo "<td>" . nl2br( $row['resource_name']) . "</td>"; 
echo "<td>" . nl2br( $row['res_library_ID']) . "</td>"; 
echo "<td>" . nl2br( $row['hold_start']) . "</td>";  
echo "<td>" . nl2br( $row['hold_end']) . "</td>";  
echo "<td><a class=\"btn btn-info\" href=hold_edit.php?hold_id={$row['hold_id']}>Edit</a></td>";
echo "<td><a class=\"btn btn-danger\" href=hold_delete.php?hold_id={$row['hold_id']}>Delete</a></td> "; 
echo "</tr>"; 

} 
echo "</tbody>";
echo "</table>"; 
echo "<a class=\"btn btn-info\" href=hold_add.php>New Row</a>"; 
?>
	  
	  
	  
	  <a href="../adminpanel.php" class="btn">Back</a>
	
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
	<script src="../js/dataTables.bootstrap.js"</script>
    <script src="../js/TableTools.js"></script>
    <script src="../js/jquery.dataTables.js"></script>
    <script src="../js/ZeroClipboard.js"></script>
    
    
    <script type="text/javascript" charset="utf-8">
$(document).ready( function () {
	$('#example').dataTable( {
		"sDom": "<'row-fluid'<'span6'T><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"oTableTools": {
			"aButtons": [
				"copy",
				"print",
				{
					"sExtends":    "collection",
					"sButtonText": 'Save <span class="caret" />',
					"aButtons":    [ "csv", "xls", "pdf" ]
				}
			]
		}
	} );
} );
    </script>
  </body>
</html>
