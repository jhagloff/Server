<? 
include('database_connect.php'); 
$hold_id = (int) $_GET['hold_id']; 
mysql_query("DELETE FROM `userhold` WHERE `hold_id` = '$hold_id' ") ; 
echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
?> 

<a href='hold_list.php'>Back To Listing</a>