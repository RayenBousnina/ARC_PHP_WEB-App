<?php
$cnx=mysqli_connect("localhost","root","azerty@33","test_db");
$FirstName=$_GET["FirstName"];
$LastName=$_GET["LastName"];
$UserName=$_GET["UserName"];
$Country=$_GET["Country"];
$PassWord=$_GET["PassWord"];
$CityCode=$_GET["CityCode"];
mysqli_query($cnx,"insert into users values (null,'{$UserName}','{$PassWord}','{$FirstName}','{$LastName}','{$Country}','{$CityCode}')");
//header("location:session.php");
header("location:login.php");

?>