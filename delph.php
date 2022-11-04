<?php
$cnx=mysqli_connect("localhost","root","azerty@33","test_db");
$x=$_GET["ref"];
mysqli_query($cnx,"delete from reservations where ref={$x}");
header("location:session.php");
?>