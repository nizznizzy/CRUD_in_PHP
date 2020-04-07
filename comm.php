<!DOCTYPE html>
<html>
<head>
	<title>Commericial</title>
	<style>
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


    }
    .booking{

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
    <br>
    <br>
    <?php
require 'dbcon/config.php';

$number_of_result=5;

$query="select * from property where type='Commercial';";
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
$querys="SELECT * FROM property WHERE type='Commercial' LIMIT ".$this_page_first_result.','.$number_of_result;
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
 echo "<div class='booking'><br><br><br><br><form method='GET'><input type='hidden' name='id' value='".$result['id']."'><button formaction='book.php'>Book Now</button></form>" ;
 echo "</div >" ;
 echo "</div>";
}
 echo "</div>";
for($pages=1; $pages<=$total_page; $pages++){
 echo '<a href="comm.php?pages='.$pages.'">'.$pages.'</a>'."   ";

}
?>
</body>
</html>