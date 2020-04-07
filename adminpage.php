

<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
	<style type="text/css">
		body
		{
			background-image: url("images/imginh.jpg");
			background-repeat:no-repeat;
			background-size: 200%;
			margin-left:35%;
			margin-top: 10%;
			

		}
		.link{
			font-size: 30px;
			text-decoration: none;
			text-align: center;
			border: 3px solid white;
			color: white;
			padding: 5px;
		}
		a:hover{
			background-color: #fff;
			color: black;
		}
		h1{color: #fff;} .logout{margin-left:80%; margin-top: -30%;}


	</style>
</head>
<body>
	<h1>ADMIN PAGE</h1><br>
<a class="link" href="report.php">REPORTS</a><br><br><br>
<a class="link" href="userfeedback.php">User Feedbacks</a>
<div class="logout"><a class="link" href="admin.php">Logout</a></div>

</body>
</html>
<?php
if (isset($_POST['logout']))
{
    session_destroy();
    #$_SESSION['username']="";
    header('location:admin.php'); 

}
?>
