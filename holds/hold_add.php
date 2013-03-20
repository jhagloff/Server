<? 
include('database_connect.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `userhold` ( `user_email` ,  `resource_name` ,  `hold_start` ,  `hold_end`  ) VALUES(  '{$_POST['user_email']}' ,  '{$_POST['resource_name']}' ,  '{$_POST['hold_start']}' ,  '{$_POST['hold_end']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='hold_list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>User Email:</b><br /><input type='text' name='user_email'/> 
<p><b>Resource Name:</b><br /><input type='text' name='resource_name'/> 
<p><b>Hold Start:</b><br /><input type='text' name='hold_start'/> 
<p><b>Hold End:</b><br /><input type='text' name='hold_end'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
