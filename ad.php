<?php 

include 'dbcon/config.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homeelite";
session_start();   

// echo "HI ". $_SESSION["username"];
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
	<title>freead!</title>
	<link rel="stylesheet" href="ad.css"/>
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
    <hr>
    <H1>POST YOUR ADD HERE!!!</H1>
    <div class="form">
	<form method="post" action="ad.php"  enctype="multipart/form-data">
		Upload Image here :<br><br>
        <input type="file" name="image" required><br><br>
                       <!-- <input type="text" name="image" name="image">
                       <input type="text" name="image" name="image">
                       <input type="text" name="image" name="image"> <br>
                       <input type="submit" name="browse" value="select"><br>
 --> 
 						Enter the Address details :
                        <input type="text" name="deta" placeholder="Address" required><br><br>
 						Enter your contact Number :
                        <input type="tel" name="contactno" value="<?= $ph;?>" required><br><br>
 						Enter your Email Id :
                        <input type="mail" name="email" value="<?= $email;?>" required><br><br>
 						Please select your city :
                        <select name="propertycity" id="" required>
 							 <option value="" selected disabled hidden>Enter The location</option>
 							 <option value="Chennai">Chennai</option>
 							 <option value="Bangalore">Bangalore</option>
 							  <option value="Mumbai">Mumbai</option>
 							  <option value="pune">Pune</option>
 						</select><br><br>
                        Enter your property Type:
                        <select name="propertytype" id="" required>
                            <option value="" selected disabled hidden>Enter The Type</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Residential">Residential</option>
                        </select><br><br>
                        Enter your Price Range :
                        <select name="propertyranges" id="" required>
                            <option value="" selected disabled hidden>Enter Your Range</option>
                            <option value="5000-15000">5000-15000</option>
                            <option value="15000-30000">15000-30000</option>
                            <option value="30000-45000">30000-45000</option>
                            <option value="45000-60000">45000-60000</option>
                            <option value="60000-75000">60000-75000</option>
                            <option value="75000-90000">75000-90000</option>
                        </select><br><br>
                        <input type="submit" name="submit" value="submit"> <br>
                    </form></div>
                    <?php 
                    	
                    if(isset($_POST['submit'])){
                    	$deta=$_POST['deta'];
                    	$propertycity=$_POST['propertycity'];
                    	$propertytype=$_POST['propertytype'];
                    	$propertyranges=$_POST['propertyranges'];
                    	$contactno=$_POST['contactno'];
                    	$email=$_POST['email'];
                    	$target="upload/".basename($_FILES['image']['name']);
                    	$image=$_FILES['image']['name'];
                        $username=$_SESSION['username'];
                    	if($deta=="" || $propertycity=="" || $propertytype=="" || $propertyranges=="" || $contactno=="" || $email=="" || empty($image)){
                    	}else{
                    		move_uploaded_file($_FILES['image']['tmp_name'], $target);
 							$query="INSERT INTO `property`(`id`, `details`, `city`, `type`, `ranges`, `contactno`, `email`,`image`,`username`) VALUES ('','$deta','$propertycity','$propertytype','$propertyranges','$contactno','$email','$target','$username')";
        					$query_run=mysqli_query($con,$query); 
           					 if($query_run){echo"<script type='text/javascript'>alert('property added');</script>";
             					}
                    		}
                    	}
                     ?>

</body>
</html>