<?	include "database_connect.php";
	
	$password = $_POST['pwd'];
	$encrypt_password = md5($password);
	
	//Insert into database
	$sql = "INSERT INTO users (usr_fname,usr_lname,usr_email,usr_phone,usr_password) 
	VALUES('$_POST[user_fname]','$_POST[user_lname]','$_POST[user_email]','$_POST[phone_number]','$encrypt_password')";
	
	//If can't throw an error
	if(!mysqli_query($con, $sql)){
		echo "<h1>Error adding User: Email Taken<h1>";
		mysqli_close($con);
	}
	//else direct to confirmation
	else{
		mysqli_close($con);
		session_start();
		$_SESSION['email'] = $_POST['user_email'];
		$_SESSION['pwd'] = $password;
		//$_SESSION['name'] = $_POST['user_name'];
		header("location:created.php");
	}
	
?>