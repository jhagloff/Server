<?php include "database_connect.php";
	  include "functions.php";

//Grab Table Name
$tbl_name = "users";

//Get Users name/ Password
$myemail = $_POST['email'];
$mypassword = $_POST['pwd'];
$adminbit = 1;

//Encrypt Password
$encrypted_mypassword = md5($mypassword);
//Check database for login
$sql = "SELECT * FROM $tbl_name WHERE usr_email='$myemail' and usr_password='$encrypted_mypassword'";

//Capture the result
$result = mysqli_query($con, $sql);

$count = mysqli_num_rows($result);
$row = mysqli_fetch_row($result);

//check if number of rows is one
mysqli_close($con);

if($count == true && (($row[6] == 1) || ($row['usr_type'] == 1))){
	session_start();
	$_SESSION["email"]=$_POST['email'];
	$_SESSION["admin"]=1;
	header("location:adminpanel.php");
}
elseif($count == true && (($row[6] == 0) || ($row['usr_type'] == 0))){
	session_start();
	//$_SESSION('isuser') = "1";
	$_SESSION["email"]= $_POST['email'];
	header("location:userloggedin.php");
}
else{
header("location:incorrect.html");
}


?>