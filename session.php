<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ARC &mdash; Logistics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">



    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-3" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <h1 class="mb-0"><a href="index.php" class="text-white h2 mb-0">Logistics</a></h1>
          </div>
          


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>


  

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">     
        <div class="row align-items-center justify-content-center text-center">
        

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                 
                
            <h1 class="text-white font-weight-light text-uppercase font-weight-bold">Hello </h1> 
           
            <p class="breadcrumb-custom"><a href="index.php">Login</a> <span class="mx-2">&gt;</span> <span>Session</span></p>
          </div>
        </div>
      </div>
    </div>  

    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">

            

            
          </div>
          <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head> 
    <body style='background:#fff;'>
          <div id="content">
            
            <a href='session.php?deconnexion=true'><span>logout</span></a> <!--  when i press logout the variable deconnection take the value "true" -->
            
            <!-- verify the user is connected -->
            <?php
                
                if(!isset($_SESSION['user_name'])){
                    header("location:login.php");
                }
                else{
                    if(isset($_GET['deconnexion']))
                    { 
                       if($_GET['deconnexion']==true)  // deconnexion tsan3et f line 10
                         {  
                            session_unset();
                            header("location:login.php");
                        }
                   }
                    else if($_SESSION['user_name'] !==""){  // verify if there is any one using the session
                      $user = $_SESSION['user_name'];
                      $pass=$_SESSION['password'];
                     // $id = $_SESSION['id'];
                      echo "<br>hello $user, you are connected in your own session";
                   }
                }
                
            ?>  
           
            <?php

              echo "<a href='addRes.php?'>New Reservation</a>";
              $cnx=mysqli_connect("localhost","root","azerty@33","test_db");
              $req33=mysqli_query($cnx,"select id from users where user_name='{$user}'");
              
              $idd=mysqli_fetch_array($req33);
              $idde=implode ($idd);
              $len = strlen($idde);
              //echo  substr($idde,$len/2);
              //substr(string_name, start_position,string_length_to_cut )
              $len = strlen($idde);
              $_SESSION['id']=substr($idde,$len/2);
              //$_SESSION['id']=substr($idde,$len/2));
             // echo $_SESSION['id'];
              //ession_start();
              //$id=$_SESSION['id'];
           $_SESSION['user_name'];
              //$a5=$_SESSION['id'];
              //$a5=$_GET["id"];
                $req1=mysqli_query($cnx,"SELECT * from reservations where id_user='{$_SESSION['id']}'");
              
              echo "<table border=1>";
              while($d=mysqli_fetch_array($req1)){ 
            

              //$req1=mysqli_query($cnx,"select * from reservations  where user_name='{$user}'");  //{$id}
             
             
                echo "<tr>";
              echo "<td>" .$d["ref"]. "</td>";
               echo "<td>". $d["dep"]. "</td>";
                echo "<td>". $d["dest"] . "</td>"; 
               echo "<td>". $d["freight"] . "</td>";
                echo "<td>". $d["commodity"] . "</td>";
                echo "<td><a href='delph.php?ref={$d["ref"]}'>delete</a></td>";
               echo "</tr>";}
            ?>

              
        </div>
      </div>
    </div>
         

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
