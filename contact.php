<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homeelite";
session_start();    


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

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>contact</title>
  <style type="text/css">

    *{margin:0;padding:0;}
    body{
              font-family: sans-serif;
        background-color: #ccc;      

    }
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

    form{
      border: 1px solid #ccc;
      padding: 20px;
      margin-top: ;
      background-color:  #0b00ff38;
    }

  </style>
</head>
<body>
  <div class="topnav">
        <header>
            <h1>HOME ELITE</h1>
            <ul>
                <li><a class="active" href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                
            </ul>
        </header>
    </div>
  <h1> contact us</h1>
<form method="POST" action="contact.php">
  Name :
  <input type="text" name="name" value="<?=$uname?>"><br><br>
  email :
  <input type="email" name="email" value="<?=$email?>" ><br><br>
Subject :
  <textarea name="subject" required></textarea><br><br>
  <input type="submit" name="submit">


</form>
</body>
</html>

<?php
if(isset($_POST['submit']))
{  
   $name = $_POST['name'];
   $email = $_POST['email'];
   $subject = $_POST['subject'];
   $sql = "INSERT INTO contactus (name,email,subject) VALUES ('$name','$email','$subject')";
   $sql_run=mysqli_query($conn,$sql); 
   if($sql_run){
    echo"<script type='text/javascript'>alert('message sended you will get replay MAIL within a week');</script>";
   }
   else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
   }
   
}
mysqli_close($conn);
?>