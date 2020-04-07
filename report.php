<?php

require 'dbcon/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>report</title>
	<style>
		
	</style>
</head>
<body>
                <table cellpadding="15" cellspacing="10">
                <tr>
                	<th>ID</th>
                	<th>Details</th>
                	<th>city</th>
                	<th>type</th>
                	<th>ranges in Rupees</th>
                	<th>contact</th>
                	<th>email</th>
                	<th>image</th>
                </tr>
<?php
$con=mysqli_connect("localhost","root","","homeelite");
if ($con-> connect_error) {
die("connection failed:". $con-> connect_error);
} 
$sql="select id,details,city,type,ranges,contactno,email,image from property";
$result=$con->query($sql);
if($result->num_rows>0 ) {
while($row=$result->fetch_assoc()) {
echo"<tr><td>".$row["id"]."</td> <td>".$row["details"]."</td><td>".$row["city"]."</td><td>".$row["type"]."</td><td>".$row["ranges"]."</td><td>".$row["contactno"]."</td><td>".$row["email"]."</td><td>".$row["image"]."</td></tr>";}
echo"</table>";
}
else{
"0 result";
}
$con->close();
?>
</table>
</body>
</html>