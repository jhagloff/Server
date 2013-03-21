<?php  
	function search() 
	{
		if(isset($_POST['search'])) 
		{ 
		  $connx = mysqli_connect('localhost', 'kkobayco_test', 'PassWord123','kkobayco_lib_db') or die("connx"); 
		  //$db = mysqli_select_db($connx, 'kkobay') or die(mysqli_error()); 
		  # convert to upper case, trim it, and replace spaces with "|": 
		  $search = (ini_get('magic_quotes_gpc')) ? stripslashes($_POST['search']) : $_POST['search'];		
		  $search = mysqli_real_escape_string($connx, $search);					 		  
		  $search = strtoupper(preg_replace('/\s+/', '|', trim($_POST['search'])));   
		  # create a MySQL REGEXP for the search: 
		  //$regexp = "REGEXP '[[:<:]]($search)[[:>:]]'"; // Use this for if you want to limit search to complete words only
		  $regexp = "REGEXP '^.*($search).*\$'"; // Use this if you want to search for partial word fragments as well as complete words.
		  $query = "SELECT * FROM `resource` WHERE UPPER(`res_title`) $regexp OR "."`res_description` $regexp OR "."`res_author` $regexp";   
						  
		  $result = mysqli_query($connx, $query) or die($query . " - " . mysqli_error($connx));  					
			if (mysqli_num_rows($result) > 0) 
			{			
				echo "
				<div class=\"bs-docs-example\">
				<table class=\"table table-striped table-hover table-condensed\">
				  <thead>
					<tr>
					  <th>id</th>
					  <th>Title</th>
					  <th>Author</th>
					  <th>Description</th>
					  <th>Library</th>				  
					  <th>Type</th>                  
					  <th>Volume</th>
					  <th>Issue</th>
					  <th>ISBN</th>
					</tr>
				  </thead>
				";
				
				while($row = mysqli_fetch_assoc($result)) 
				{ 
					echo "<tr>"; 				 
					{ 					 
						echo "<tr>";
						echo "<td>" . $row['res_id'] . "</td>";
						echo "<td>" . $row['res_title'] . "</td>";
						echo "<td>" . $row['res_author'] . "</td>";
						echo "<td>" . $row['res_description'] . "</td>";
						echo "<td>" . $row['res_library_ID'] . "</td>";					
						echo "<td>" . $row['res_type'] . "</td>";					
						echo "<td>" . $row['res_volume'] . "</td>";
						echo "<td>" . $row['res_issue'] . "</td>";
						echo "<td>" . $row['res_isbn'] . "</td>";
						echo "<td><button type=\"button\" class=\"btn btn-primary\">Hold</button></td>";						
					} 					
					echo "</tr>\n"; 
				}
			echo "</table>";
			} 
			else 
			{			
				echo "
					<div class=\"alert alert-error\">
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
					<strong>Sorry</strong> No results found.
					</div>
				";
			}	  
		} 
	}
?>