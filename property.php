<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Property</title>
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
	<?php
require 'dbcon/config.php';

$number_of_result=5;

$query="select * from property where type='Residetal';";
$query_run=mysqli_query($con,$query);
$page=mysqli_num_rows($query_run);
$number_page=$page/$number_of_result;
$total_page=ceil($number_page);
if(!isset($_GET['pages'])){
	$page=1;
}else{
	$page=$_GET['pages'];
}
 $this_page_first_result=($page-1)*$number_of_result;
$querys="SELECT * FROM property WHERE type='Residetal' LIMIT ".$this_page_first_result.','.$number_of_result;
$results=mysqli_query($con,$querys);
foreach($results as $result){
 echo "<div>";
 echo "<img src='".$result['image']."' height='100px' width='100px'>";
 echo "<span>".$result['details']."</span><br>";
 echo "<span>".$result['city']."</span><br>";
 echo "<span>".$result['type']."</span><br>";
 echo "<span>".$result['ranges']."</span><br>"; 
 echo "</div>";
}
for($pages=1; $pages<=$total_page; $pages++){
 echo '<a href="property.php?pages='.$pages.'">'.$pages.'</a>'."   ";
 
}?>
</body>
</html>

