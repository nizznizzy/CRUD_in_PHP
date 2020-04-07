<?php

require 'dbcon/config.php';
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homeelite";
#session_start();    


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = 'SELECT username, email, phone FROM signup WHERE username = "'.$_SESSION["username"].'"';
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $uname = $row["username"];
        $email = $row["email"];
        $ph = $row["phone"];
    }
}
if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $ph=$_POST["phone"];
 
$query='update signup SET email="'.$email.'",phone="'.$ph.'" WHERE username="'.$_SESSION["username"].'"';
if(mysqli_query($conn, $query)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}
 $conn->close();       
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>editaccount</title>
    <style type="text/css">
        body{
              font-family: sans-serif;
        background-color: #0b00ff38;
    background-repeat: no-repeat;
    background-size: cover;
        }
    .editaccount{
    width: 250px;
    height: 300px;
    border: 1px solid black;
    margin-left: 35%;
    margin-top: 6%;
    padding: 10px;
    color: black;
    }

    *{margin:0;padding:0;}

.topnav{
    background:rgba(56,62,66,1);
    color:white;
    padding: 10px;
    overflow: hidden;
}
.topnav header h1{
    margin:5px 0 0 30px;
    float:left;
}
.topnav header ul{
    float:right;
    list-style: none;
    margin-right:20px;
}
.topnav header ul li {
    float: left;
    margin:0 10px;
}
.topnav header ul li a {
    padding:7px 12px;
    margin:5px;
    color:whitesmoke;
    background:#232222;
    display:block;
    text-decoration: none;
    border-radius:2px;
    transition:all .5s;
}
.topnav header ul li a:hover{
    background:white;
    color:rgba(56,62,66,1);}
.wholewrap{
    width:70%;
    margin:auto;
}
.eachresult{
    background: #fff;
    min-height: 167px;
    padding-left: 5px;
    padding-right: 5px;
    padding-bottom: 25px;
    margin-bottom:20px;
    cursor:pointer;
}
.eachrimg{
    display: inline-block;
    float:left;
     width: 20%
}
.eachrimg>img{
   
    margin:20px 0 0 0;
    margin-bottom: 12px;
    display:inline-block;
    }
    .eachdetails{
        padding-top: 3%;
        display: inline-block;
height: 100%;
width: 60%;
float:left;
    }

    </style>

</head>
<body>
    <div class="topnav">
        <header>
            <h1>HOME ELITE</h1>
            <ul>
                <li><a class="active" href="home.php">Home</a></li>
                <!-- <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li> -->
                
            </ul>
        </header>
    </div>

    <div class="editaccount">
        <h2>HI <?= $uname;?></h2><br>
        <h3>Edit Account</h3><br>
        <form action="editaccount.php" method="post">
           
           <h4>Tap to edit</h4><br>
            <p>Email</p>
            <input type="text" name="email" placeholder="example@gmail.com" value="<?= $email;?>" required /><br><br>
            <p>Mobile</p>
            <input type=""  name="phone" placeholder="Number" value="<?= $ph;?>" required /><br><br>
            <input type="submit" name="submit" value="submit" />
            
        </form>


    </div>
</body>

</html>