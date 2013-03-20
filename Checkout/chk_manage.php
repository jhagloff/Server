<? 	include "../database_connect.php";
	/*foreach($res as $userRow){
		$usrID = $userRow['usr_id'];
		$email = $userRow['usr_email'];
		print "<option value=$usrID>$email\n";
	}*/
	
	$userSql = "SELECT usr_id, usr_email FROM users";
	$users = mysqli_query($con,$userSql);
	
	$resSql = "SELECT res_id, res_title FROM resources";
	$res = mysqli_query($con, $resSql);
	
	echo "<form method='post' action='addrol.php'>";
	
	echo "User Email: <select name='id_num'>";
	print "<option value='0'>--Email Address--</option>";
	while($userRow = mysqli_fetch_assoc($users)){
		$usrID = $userRow['usr_id'];
		$email = $userRow['usr_email'];
		print "<option value=$usrID>$email</option>";
	}
	print "</select>\n";
	
	echo "Resource: <select name='res_num'>";
	print"<option value='0'>--Resource--</option>";
	while($resRow = mysqli_fetch_assoc($res)){
		$resID = $resRow['res_id'];
		$resTitle = $resRow['res_title'];
		print "<option value=$resID>$resTitle</option>";
		}
		print "</select>\n";
	
?>
<input type="submit" value="Check Out User">
</form>

