<? 
include('database_connect.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Hold Id</b></td>"; 
echo "<td><b>User Email</b></td>"; 
echo "<td><b>Resource Name</b></td>"; 
echo "<td><b>Hold Start</b></td>"; 
echo "<td><b>Hold End</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `userhold`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['hold_id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['user_email']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['resource_name']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['hold_start']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['hold_end']) . "</td>";  
echo "<td valign='top'><a href=hold_edit.php?hold_id={$row['hold_id']}>Edit</a></td><td><a href=hold_delete.php?hold_id={$row['hold_id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=hold_add.php>New Row</a>"; 
?>