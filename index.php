<?php
require 'dbcon/config.php'; 
session_start();

?>
<?php
if (isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $encptpass=md5($password);
    
    $query="select * from signup WHERE username='$username' and password = '$encptpass'";
    $query_run=mysqli_query($con,$query);
    // $row=mysqli_fetch_array($query_run, MYSQLI_ASSOC);
    if(mysqli_num_rows($query_run)>0)
    {
        $_SESSION['username']=$username;
        header('location:home.php');
       
    }  else {
   echo "<script type'text/javascript>alert('invalid username or password')</script>";    
    }
        
    
    
}
// $username=$_POST['username'];
// $query="select * from signup WHERE username='$username'";
// $query_run=mysqli_query($con,$query);
// $row=mysqli_fetch_array($query_run, MYSQLI_ASSOC);
    
//         print_r($query_run)
//     echo $row['password'];

?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
     <link rel="stylesheet" href="style.css" /> 
</head>
<body>
    <div class="login-box">
<h1>LOGIN</h1>
<form action="index.php" method="post">
    <p>User Name</p>
    <input type="text" name="username" placeholder=" username" required />
    <p>Password</p>
    <input type="password" name=" password" placeholder=" password" required/>
    <input type="submit" name="login" value=" Log In" /><br><br>
   
    <p>New to HomeElite?</p> <a href="signup.php" class="cc">Sign UP</a>
</form>


    </div>

    
    
    
</body>
</html>