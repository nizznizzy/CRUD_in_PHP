<?php

require 'dbcon/config.php';

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>signup</title>
    <link rel="stylesheet" href="signup.css" />

</head>
<body>
    <div class="signup">
        <h1>SignUp</h1>
        <form action="signup.php" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder=" username" required />
            <p>Email</p>
            <input type="text" name="email" placeholder="example@gmail.com" required />
            <p>Mobile</p>
            <input type=""  name="phone" placeholder="Number" required />
            <p>Password</p>
            <input type="password" name=" password" placeholder=" password" required />
            <p>Confirm Password</p>
            <input type="password" name=" cpassword" placeholder=" password" required /> <br /><br />
            <input type="submit" name="signup" value=" Sign Up" />
            
        </form>


    </div>
<?php
if(isset($_POST['signup']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];        
            
    $encptpass=md5($cpassword);
        if ($password==$cpassword)
    {
        $query ="select * from signup WHERE username='$username'";
        $query_run=mysqli_query($con,$query);   
                

        if (mysqli_num_rows($query_run)>0)
        {
            echo "<script type='text/javascript>alert('user already exist')</script>";
        }      
            else
            {
                if(preg_match('/^[\w]+@[a-z]+.com/i', $email))
                 
                {
                 $query="insert into signup values('$username','$email','$phone','$encptpass')";
                 $query_run=  mysqli_query($con, $query);
                     if($query_run)
                     {
                         echo "<script type='text/javascript'>alert('signup successfully go to login')</script>";
                         header('location:index.php');
                     }
                     else
                     {
                        echo "<script type='text/javascript'>alert('error')</script>";
                     }   
                }
                else{
                     echo "<script type='text/javascript'>alert('check your email format')</script>";
                    }
            }


    
    }
    else
    {
        echo "<script type='text/javascript'>alert('password not matched')</script>";
   
    }


}
?>
</body>
</html>