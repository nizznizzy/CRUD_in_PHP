<!DOCTYPE html>
<html>
<head>
	<title>residential</title>
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
	color:rgba(56,62,66,1);
}
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
    .wrap{
    	width:70%;
    	margin:auto;
    }
    .wrap>.title{
    	font-size:2.5em;
    	display: block;
    	text-align:center;
    }
    .wrap>.detail>.dt{
    	font-size:1.5em;
    	font-weight: bold;
    }
    .wrap>.detail>.dd{
    	font-size:1.2em;
    }
    .image{
    	display:inline-block;
    	float:left;
    	width:30%;
    }
    .detail{
    	display:inline-block;
    	float:right;
    	width:70%;
    	padding:4%;
    	box-sizing: border-box;
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
                <li><a href="#logout">Logout</a></li>
            </ul>
        </header>
    </div>
    <br>
    <br>
<?php
require 'dbcon/config.php';
$id=$_GET['id'];
$query="select * from property WHERE id=$id";
$queryr=mysqli_query($con,$query);
foreach($queryr as $queryo){
echo "<div class='wrap'><span class='title'>".$queryo['details']."</span><br><div class='image'><img src='".$queryo['image']."' height='300px' width='300px'><br>";

echo "</div><div class='detail'>";

echo "<span class='dt'>City : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><span class='dd'>".$queryo['city']."</span><br><br>";
echo "<span class='dt'>Property Type : &nbsp&nbsp&nbsp&nbsp</span><span class='dd'>".$queryo['type']."</span><br><br>";
echo "<span class='dt'>Price Range : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><span class='dd'>".$queryo['ranges']."</span><br><br>";
echo "<span class='dt'>Contact Number: &nbsp</span><span class='dd'>".$queryo['contactno']."</span><br><br>";
echo "<span class='dt'>Mail ID : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><span class='dd'>".$queryo['email']."</span><br><br><div>";
}
?>
