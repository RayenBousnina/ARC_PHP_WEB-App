<?php
$cnx=mysqli_connect("localhost","root","azerty@33","test_db");
$y=$_GET["dep"];
$z=$_GET["dest"];
$t=$_GET["freight"];
$c=$_GET["commodity"];
mysqli_query($cnx,"insert into reservations values(null,'{$y}','{$z}','{$t}','{$c}',null)");
header("location:session.php");

?>