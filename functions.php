<?php
/*
	functions.php
	Includes various functions needed for operation.
	March 11, 2013

*/

function isUser(){
	session_start();
	if(!isset($_SESSION['user'])){
		session_destroy();
		header("location:index.html");
	}
}

function isAdmin(){
	session_start();
	if(!isset($_SESSION['admin'])){
		session_destroy();
		header("location:index.html");
	}
}

function logout(){
	if(isset($_SESSION['user'])){
		unset($_SESSION['user']);
	}
	if(isset($_SESSION['admin'])){
		unset($_SESSION['admin']);
	}
	if(isset($_SESSION['email'])){
		unset($_SESSION['email']);
	}
	
}

function sendEmail($address){
	//Grab Information from session
	$email = $address;
	$password = $_SESSION['pwd'];
	$to = $address;
	
	//Prepare the Email
	$subject = "User Account";
	$header = "from: Admin <Admin@kkobay.com>";
	$message= "Welcome to The Aperture Library System\n";
	$message.= "Email Address: " . $email;
	$message.= "\nPassword: " . $password;
	$message.= "\nThank you for registering!";
	
	//Send Email
	$sentmail = mail($to,$subject,$message,$header);
	
	//Report Back
	if($sentmail){
		echo "An email has been sent.";
	}
	else {
		echo "Error: Cannot send email.";
	}
} //End of send Email()

function createUserHold(){
	include "database_connect.php";
	
	$sql = "SELECT res_id, res_title FROM resource";
	$result = mysqli_query($con,$sql);


	echo "<form action='holds.php' method='post'>";
	echo "Resource: <select name='res_num'>";
	echo "<option value='0'>--Resource--</option>";
	while($resRow = mysqli_fetch_assoc($result)){
		$resID = $resRow['res_id'];
		$resTitle = $resRow['res_title'];
		echo "<option value=$resID>$resTitle</option>";
	}
		echo "</select>";
		echo "<button class='btn' type='submit' formaction=''>Create Hold</button>";
		echo "</form>";
}
		
function createResourceOut(){
	include "database_connect.php";
	
	$userSql = "SELECT usr_id, usr_email FROM users";
	$users = mysqli_query($con,$userSql);
	
	$resSql = "SELECT res_id, res_title FROM resource";
	$res = mysqli_query($con, $resSql);
	
	echo "<form action='rol.php' method='post'>";
	echo "User Email: <select name='id_num'>";
	echo "<option value='0'>--Email Address--</option>";
	while($userRow = mysqli_fetch_assoc($users)){
		$usrID = $userRow['usr_id'];
		$email = $userRow['usr_email'];
		echo "<option value=$usrID>$email</option>";
	}
	echo "</select>\n";
	echo "Resource: <select name='res_num'>";
	echo"<option value='0'>--Resource--</option>";
	while($resRow = mysqli_fetch_assoc($res)){
		$resID = $resRow['res_id'];
		$resTitle = $resRow['res_title'];
		echo "<option value=$resID>$resTitle</option>";
	}
		echo "</select>\n";
		echo "<button class='btn' type='submit' formaction='rol.php'>Assign Resource</button>";
		echo "</form>";
		

}

function currentResources($email){
	//include database connection
	include "database_connect.php";
	
	//Query 
	$result = mysqli_query($con, "SELECT * FROM rol WHERE user_email='$email'");

	echo "<table class='table table-hover table-condensed table-striped' border='1'>
	<tr><th>Resource</th> <th>Library</th><th>Date Signed Out</th> <th class='text-error'>Date Due</th> </tr>";

	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>" . $row['resource_name'] . "</td>";
		echo "<td>" . $row['res_library_ID'] . "</td>";
		echo "<td>" . $row['date_signed_out'] . "</td>";
		echo "<td class='text-error' >" . $row['date_due'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($con);

}

function currentHolds($email){
include "database_connect.php";
	$result = mysqli_query($con, "SELECT * FROM userhold WHERE user_email='$email'");

	echo "<table class='table table-hover table-condensed table-striped' border='1'>
	<tr><th>Resource</th><th>Hold Start Date</th> <th>Hold Due Date</th> </tr>";

	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>" . $row['resource_name'] . "</td>";
		//echo "<td>" . $row['library_id'] . "</td>";
		echo "<td>" . $row['hold_start'] . "</td>";
		echo "<td>" . $row['hold_end'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($con);

}

function listUsers(){
	include('database_connect.php'); 
	echo "<table class=\"table table-condensed table-striped\" >"; 
	echo "<thead>";
	echo "<tr>";
	
	//echo "<td><b>ID Number</b></td>"; 
	echo "<th>First Name</th>"; 
	echo "<th>Last Name</th>"; 
	echo "<th>User Email</th>"; 
	echo "<th>Phone Number</th>"; 
	echo "<th>User Password</th>"; 
	echo "<th>User Level</th>"; 
	
	echo "</tr>"; 
	echo "</thead>";
	$result = mysqli_query($con,"SELECT * FROM `users`") or trigger_error(mysqli_error()); 
	while($row = mysqli_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	echo "<tr>";  
	//echo "<td valign='top'>" . nl2br( $row['usr_id']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['usr_fname']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['usr_lname']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['usr_email']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['usr_phone']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['usr_password']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['usr_type']) . "</td>";  
	echo "<td valign='top'><a href=user_edit.php?usr_id={$row['usr_id']} class=\"btn btn-info\">Edit</a></td>";
	echo "<td><a href=delete_user.php?usr_id={$row['usr_id']} class=\"btn btn-danger\">Delete</a></td> "; 
	echo "</tr>"; 
	} 
	echo "</table>"; 
	echo "<a href=add_user.php class=\"btn btn-info\">Add User</a>"; 
}

function deleteUser($id){
	include('database_connect.php'); 
	//$usr_id = (int) $_GET['usr_id']; 
	$usr_id = $id;
	mysqli_query($con,"DELETE FROM `users` WHERE `usr_id` = '$usr_id' ") ; 
	echo (mysqli_affected_rows($con)) ? "<h3 class='container text-success'>User Deleted. </h3><br />" : "<h3 class='container text-error'>Unable to Delete User. </h3><br />"; 

}

function deleteResource($id){
	include('database_connect.php'); 
	//$usr_id = (int) $_GET['usr_id']; 
	$res_id = $id;
	mysqli_query($con,"DELETE FROM `resource` WHERE `res_id` = '$res_id' ") ;
	echo (mysqli_affected_rows($con)) ? "<h3 class='container text-success'>Resource Deleted. </h3><br />" : "<h3 class='container text-error'>Unable to Delete Resource. </h3><br />"; 
}

function listResources(){
	include('database_connect.php'); 
	echo "<table class=\"table table-condensed table-striped\" >"; 
	echo "<thead>";
	echo "<tr>";
	echo "<th>Title</th>"; 
	echo "<th>Author</th>"; 
	echo "<th>Description</th>"; 
	echo "<th>Library ID</th>"; 
	echo "<th>Resource Type</th>"; 
	echo "<th>Volume Number</th>"; 
	echo "<th>Issue Number</th>"; 
	echo "<th>ISBN</th>"; 
	echo "<th>Date</th>"; 
	echo "</tr>"; 
	echo "</thead>";
	$result = mysqli_query($con,"SELECT * FROM `resource`") or trigger_error(mysqli_error($con)); 
	while($row = mysqli_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	echo "<tr>";  
	//echo "<td valign='top'>" . nl2br( $row['usr_id']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['res_title']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['res_author']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['res_description']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['res_library_ID']) . "</td>";
	echo "<td valign='top'>" . nl2br( $row['res_type']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['res_volume']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['res_issue']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['res_isbn']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['res_date']) . "</td>";  
	echo "<td valign='top'><a href=resource_edit.php?res_id={$row['res_id']} class=\"btn btn-info\">Edit</a></td>";
	echo"<td><a href=resource_delete.php?res_id={$row['res_id']} class=\"btn btn-danger\">Delete</a></td> "; 
	
	echo "</tr>"; 
	} 
	echo "</table>"; 
	echo "<a href=resource_new.php class=\"btn btn-info\">Add a Resource</a>"; 
}

function displayForm(){
	session_start();
	if(!isset($_SESSION['admin']) || ($_SESSION['user'])){
	
		echo"<form class=\"navbar-form pull-right\" method='post' action='checklogin.php'>";
		echo"<input class=\"span2\" type=\"email\" name=\"email\" placeholder=\"Email Address\">";
		echo"<input class=\"span2\" type=\"password\" name=\"pwd\" placeholder=\"Password\">";		  				
		echo"<button class=\"btn\" formaction=\"checklogin.php\">Sign In</button>	";			  						
		echo"<button class=\"btn\" formaction=\"form.html\">Sign Up</a>";  
		echo"</form>";
	}
	else {
	$email = $_SESSION['email'];
		echo"<form class=\"navbar-form pull-right\" method='post'>";
		echo"<div>	<a  class=\"brand\">Welcome: $email</a>";			  
		echo"<button class=\"btn\" formaction=\"logout.php\">Log Out</button>";		  						
		echo"</div>";
		echo"</form>";
	
	}
}
function list_rol(){
	include('database_connect.php'); 
	echo "<table class=\"table table-condensed table-striped\" >"; 
	echo "<thead>";
	echo "<tr>";
	
	//echo "<td><b>ID Number</b></td>"; 
	echo "<th>ID Number</th>"; 
	echo "<th>User Email</th>"; 
	echo "<th>Resource Name</th>"; 
	echo "<th>Library ID</th>"; 
	echo "<th>Date Signed Out</th>"; 
	echo "<th>Date Due</th>"; 
	
	echo "</tr>"; 
	echo "</thead>";
	$result = mysqli_query($con,"SELECT * FROM `rol`") or trigger_error(mysqli_error()); 
	while($row = mysqli_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	echo "<tr>";  
	//echo "<td valign='top'>" . nl2br( $row['usr_id']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['rol_id']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['user_email']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['resource_name']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['res_library_ID']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['date_signed_out']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['date_due']) . "</td>";
	echo "<td valign='top'><a href=rol_edit.php?rol_id={$row['rol_id']} class=\"btn btn-info\">Edit</a></td>";
	echo "<td><a href=rol_delete.php?rol_id={$row['rol_id']} class=\"btn btn-danger\">Delete</a></td> "; 
	echo "</tr>"; 
	} 
	echo "</table>"; 
	echo "<a href=rol_add.php class=\"btn btn-info\">Checkout User</a>"; 
}

function deleteRol($id){
	include('database_connect.php'); 
	//$usr_id = (int) $_GET['usr_id']; 
	$rol_id = $id;
	mysqli_query($con,"DELETE FROM `rol` WHERE `rol_id` = '$rol_id' ") ;
	echo (mysqli_affected_rows($con)) ? "<h3 class='container text-success'>Resource on Loan Deleted. </h3><br />" : "<h3 class='container text-error'>Unable to Delete Resource on Loan. </h3><br />"; 
}

?>