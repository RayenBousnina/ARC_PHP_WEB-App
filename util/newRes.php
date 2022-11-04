<?php
session_start();
$cnx=mysqli_connect("localhost","root","azerty@33","test_db");
if (isset($_POST["dep"])){
    $dep=$_POST["dep"];
} else {
    echo"error man !!!";
}
$dest=$_POST["dest"];
$fr=$_POST["freight"];
$com=$_POST["commodity"];
$id=$_Session["id"];
//mysqli_query($cnx,"select user_name from users where ");
//$user = $_SESSION['user_name'];
//mysqli_query($cnx,"insert into reservations values (null,'{$y}','{$z}','{$t}','{$c}',4)");
mysqli_query($cnx,"INSERT  into reservations values (null,'{$dep}','{$dest}','{$fr}','{$com}','{$_SESSION['id']}')");

header("location:../session.php");
session_destroy();?>