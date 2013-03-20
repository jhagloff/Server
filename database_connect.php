<?php

$host = "localhost";
$username = "kkobayco_test";
$password = "PassWord123";
$database = "kkobayco_lib_db";
$tbl_name = "users";

	if (!$con = mysqli_connect($host,$username,$password,$database)){
		echo "Error connection: ". mysqli_error();
	}

?>