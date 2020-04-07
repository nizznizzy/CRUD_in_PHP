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
                	<th>Name</th>
                	<th>MailID</th>
                	<th>Subject</th>
                	
                </tr>
<?php
$con=mysqli_connect("localhost","root","","homeelite");
if ($con-> connect_error) {
die("connection failed:". $con-> connect_error);
} 
$sql="select name,email,subject from contactus";
$result=$con->query($sql);
if($result->num_rows>0 ) {
while($row=$result->fetch_assoc()) {
echo"<tr><td>".$row["name"]."</td> <td>".$row["email"]."</td><td>".$row["subject"]."</td></tr>";}
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