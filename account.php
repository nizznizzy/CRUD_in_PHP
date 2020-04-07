<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homeelite";
session_start();	


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
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
} else {
    echo "0 results";
	}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<title>my account</title>
	<style type="text/css">
	body{
              font-family: sans-serif;
        background-color: #0b00ff38;
    background-repeat: no-repeat;
    background-size: cover;
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


    .box{
    width: 250px;
    height: 250px;
    border: 1px solid black;
    margin-left: 40%;
    margin-top: 8%;
    padding: 10px;
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
	<div class="box"> <h1>My Account</h1>
	<?php echo "HI ". $_SESSION["username"];
echo "<br>"; ?> <br>
	<form method="post">
		USERNAME:
		<!-- <input type="username" name="username" value="<?= $uname;?>"> -->
		<?= $uname;?><br><br>
		EMAIL:
		<?= $email;?><br><br>
		
		Contact Number:
		<?= $ph;?><br><br>
		<a href="editaccount.php">edit profile</a>

	</form></div>

</body>
</html>

