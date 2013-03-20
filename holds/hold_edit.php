<? 
include('database_connect.php'); 
if (isset($_GET['hold_id']) ) { 
$hold_id = (int) $_GET['hold_id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `userhold` SET  `user_email` =  '{$_POST['user_email']}' ,  `resource_name` =  '{$_POST['resource_name']}' ,  `hold_start` =  '{$_POST['hold_start']}' ,  `hold_end` =  '{$_POST['hold_end']}'   WHERE `hold_id` = '$hold_id' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='hold_list.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `userhold` WHERE `hold_id` = '$hold_id' ")); 
?>

<form action='' method='POST'> 
<p><b>User Email:</b><br /><input type='text' name='user_email' value='<?= stripslashes($row['user_email']) ?>' /> 
<p><b>Resource Name:</b><br /><input type='text' name='resource_name' value='<?= stripslashes($row['resource_name']) ?>' /> 
<p><b>Hold Start:</b><br /><input type='text' name='hold_start' value='<?= stripslashes($row['hold_start']) ?>' /> 
<p><b>Hold End:</b><br /><input type='text' name='hold_end' value='<?= stripslashes($row['hold_end']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 
