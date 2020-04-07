<!DOCTYPE html>
<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
    
    <header>
        <div class="main">
            
        
            <ul>
            <li class="active"> <a href="#">Home</a></li>
            <li> <a href="about.php">About</a></li>
            <li> <a href="contact.php">Contact Us</a></li>
            <div class="dropdown">
  <button class="dropbtn">ACCOUNT</button>
  <div class="dropdown-content">
    <a href="account.php">MY ACCOUNT</a>
    <a href="myad.php">MY ADS</a>
    <a  name="logout" href="index.php">Logout</a>
  </div>
</div>
            </ul>

        </div>

        <div class="head">
            <h1 style="color: #fff; font-family: Century Gothic; margin-right: 35% ;" >HOME ELITE</h1>
            </div>
        <div class="title">
            <h1>Property Rental Search</h1>
            <h3 style="color: #fff; margin-bottom: 20%; text-align: center;">The Best property Rental Website ! ! !</h3>
        </div>
        <div class="button">
            <a href="comm.php" class="btn">Commercial !</a>
            <a href="res.php" class="btn">Residential !</a>
            <a href="ad.php" class="btn">Post Free Ad!! !</a>
        </div>
    </header>
</body>
<script>
        var x=document.getElementsByClassName('cont');
        console.log(x)
    </script>
</html>
    


<?php
if (isset($_POST['logout']))
{
    session_destroy();
    #$_SESSION['username']="";
    header('location:index.php'); 

}
?>