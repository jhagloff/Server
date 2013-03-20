<?	include "../database_connect.php";
	
	$user = $_POST['id_num'];
	$res = $_POST['res_num'];
	$curDate = date("Y-m-d",time());
	$dueDate = date('Y-m-d', strtotime('+2 week'));
	
	$sql = "SELECT usr_email FROM users WHERE usr_id='$user'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_row($result);
	
	
	$resSql = "SELECT res_title FROM resources WHERE res_id='$res'";
	$resResult = mysqli_query($con, $resSql);
	$resRow = mysqli_fetch_row($resResult);
	

	$Insert = "INSERT INTO rol (user_email,resource_name,date_signed_out,date_due) 
	VALUES('$row[0]','$resRow[0]','$curDate','$dueDate')";
	
	if(!mysqli_query($con,$Insert)){
		echo "Cannot add to the database";
		}
		else {
		echo $row[0] . " has successfully taken out : " . $resRow[0];
		}

	mysqli_close($con);

?>
	<form action="chk_manage.php" method="post">
	<input type="submit" value="Back">
	</form>