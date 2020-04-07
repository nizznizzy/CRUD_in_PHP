<!DOCTYPE html>
<html>
<head>
	<title>my ads</title>
	<style type="text/css">
		*{margin:0;padding:0;}
body{
	background:#eee;
	font-family:sans-serif;
	
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
</body>
</html>

<?php
require 'dbcon/config.php';
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
$number_of_result=10;
$query = 'SELECT username FROM property WHERE username = "'.$_SESSION["username"].'"';
$query_run=mysqli_query($con,$query);
$page=mysqli_num_rows($query_run);
$number_page=$page/$number_of_result;
$total_page=ceil($number_page);
if(!isset($_GET['pages'])){
	$page=1;
}else{
	$page=$_GET['pages'];
}


if (isset($_POST["delete"])) {
	$id = $_POST['deleteid'];
	$sql="DELETE FROM property WHERE id='$id'";
	mysqli_query($conn,$sql);
}



 $this_page_first_result=($page-1)*$number_of_result;
$querys='SELECT * from property WHERE username="'.$_SESSION["username"].'" LIMIT '.$this_page_first_result.','.$number_of_result;
$results=mysqli_query($con,$querys);
echo "<div class='wholewrap'>";
foreach($results as $result){
 echo "<div class='eachresult'>";
 echo "<div class='eachrimg'>";
 echo "<img src='".$result['image']."' height='150px' width='150px'>";
 echo "</div>";
 echo "<div class='eachdetails'>";
 echo "<span style='font-weight:bold;font-size:1.4em;'>".$result['details']."</span><br><br>";
 echo "<span><span style='font-weight:bold;'>Location:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</span>".$result['city']."</span><br><br>";
 echo "<span><span style='font-weight:bold;'>PropertyType:&nbsp &nbsp &nbsp</span>".$result['type']."</span><br><br>";
 echo "<span><span style='font-weight:bold;'>Price Range&#8377:&nbsp &nbsp 
&nbsp</span>".$result['ranges']."</span><br><br>";
 echo "</div>" ;
 echo "<div class='deleting'><br><form method='POST' action = 'myad.php'><input type='hidden' name='deleteid' value='".$result['id']."'><button name='delete' value='delete'>delete</button></form>" ;
 echo "</div >" ;
 echo "</div>";
}
 echo "</div>";

if (mysqli_num_rows($results)==0) {
	# code...
	echo "NO ads at present";
}

?>
