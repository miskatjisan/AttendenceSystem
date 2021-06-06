<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    Session::init();
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php'); 
    spl_autoload_register(function($class){
        include_once "Classes/".$class.".php";
    });
    $stu = new Student();  
    $db = new Database();
    $fm = new Format();
    $cur_date = date('Y-m-d');   
?>
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!-- <script src="asset/js/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
    <script src="asset/js/popper.min.js" type="text/javascript"></script>
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script> -->
</head>

<body>
    <div class="container">
        <!-- navbar-1 -->
        <nav class="navbar navbar-1 navbar-expand-lg navbar-light bg-light">
            <div>
            <a class="navbar-brand" href="index.php">
                <img class="logo" src="asset/image/logo.png" alt="logo" />
            </a>
            <span>
                <h2 class="title-logo">ONLINE ATTENDENCE SYSTEM</h2>
                <P class="slogan">onlineeducation.com</P>
            </span>
               
        </div>  
        </nav>
       