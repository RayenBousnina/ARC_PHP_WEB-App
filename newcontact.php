<?php
$con=mysqli_connect("localhost","root","azerty@33","test_db");
 if (isset($_GET["submit"])){ 


$username=$_GET['username'];}else{
    echo"errroooorr";
}
$email=$_GET["email"];
$country=$_GET["country"];
$message=$_GET["message"];
mysqli_query($con,"INSERT  into contact values (null,'frfrfr','frfrfrfr@gmail.com','frfrdz','tgtgzez')");

/* mysqli_query($con,"INSERT  into contact values (null,'{$username}','{$email}','{$country}','{$message}')");
mysqli_query($con,"INSERT  into contact values (null,'{$username}','{$email}','{$country}','{$message}')");

*//* $req1=mysqli_query($con,"insert into contact values (null,'{$username}','{$email}','{$country}','{$message}')");
 *//* $res1=mysqli_fetch_array($req1); */
//echo "what's the problem heeeeeeeeeeeeeeeeyyyy";
//header("location: ../contact.php");
/* if($res1!=0)
{
    echo 'message sent_thank you!!';
}
  else{
    echo 'submission failed _try again later';
    header("location:contact.php");

  }
} */
header("location:contact.php");

?>
<!--end get-->
