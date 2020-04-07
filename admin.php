
<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <style type="text/css">
    body{
              
              font-family: sans-serif;
        background-color: #0b00ff38;
        background-image: url("images/imginh.jpg");
    background-repeat: no-repeat;
    background-size: 200%;
        }
    .box{
    width: 300px;
    height: 200px;
    border: 1px solid black;
    margin-left: 35%;
    margin-top: 8%;
    padding: 10px;
    color: #fff;
    } 
  </style>
</head>
<body>
<form class="box" action="admin.php" method="post" name="Login_Form">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="left" valign="top"><h3>Admin Login</h3></td>
    </tr>
    <tr>
      <td align="right" valign="top">Username</td>
      <td><input name="Username" type="text" class="Input" placeholder="username"></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td><input name="Password" type="password" class="Input" placeholder="password"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
    </tr>
  </table>
</form>
</body>
</html>

<?php session_start(); 
if(isset($_POST['Submit'])){
$logins = array('admin' => 'admin','admin1' => 'admin1','admin2' => 'admin2');

$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

if (isset($logins[$Username]) && $logins[$Username] == $Password){
$_SESSION['UserData']['Username']=$logins[$Username];
header("location:adminpage.php");
exit;
} else {
echo "<script type'text/javascript>alert('invalid username or password')</script>"; 
}
}
?>

