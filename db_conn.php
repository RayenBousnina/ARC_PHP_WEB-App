<?php

$sname= "localhost";
$email= "root";
$password = "azerty@33";

$db_name = "test_db";

$conn = mysqli_connect($sname, $email, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}