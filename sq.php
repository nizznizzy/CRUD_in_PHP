<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homeelite";
session_start();	

echo "HI ". $_SESSION["username"];
echo "<br>";
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



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homeelite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "ALTER TABLE property ADD COLUMN username VARCHAR(30), ADD CONSTRAINT FK_PersonOrder FOREIGN KEY (username) REFERENCES signup(username)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
$conn->close();
?>
