<?php
session_start();
error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="style/login_style.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<center>
	<div class="login-container">
		<form id="login-form-1" class="login-form" action="" method="post">
		  <h2>PHOTOGRAPHER LOGIN</h2>
		  <br><br>
		  <input type="text" placeholder="Username" name="uname" required>
		  <input type="password" placeholder="Password" name="pwd" required><br>
		  <input type="submit" name = "login" class="button" value="Login"><br>
		  <div class="sign-txt">Not yet member? <a href="registration.php" target="_blank">Signup now</a></div>
		</form>
	  
		<form id="login-form-2" class="login-form" action="admin_home.php" method="post">
		  <h2>ADMIN LOGIN</h2><br><br>
		  <input type="text" placeholder="Email" name = "admin_uname" required>
		  <input type="password" placeholder="Password" name = "admin_pwd" required><br>
		  <input type="submit" name = "register" class="button" value="Login"><br>
		</form>
	  </div>
	</center>
	  
</body>
</html>
  


<?php
include('connection/connection.php');

if(isset($_POST['login']))
{
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $query = "SELECT * FROM registration WHERE email = '$uname' && password= '$pwd' ";
    $data = mysqli_query($con,$query);
    $total = mysqli_num_rows($data);

    if($total == 1)
    {
        $_SESSION['uname'] = $uname;
        echo "<script>location.href='home.php'</script>";
    }
    else
    {
        echo "<script>alert('Incorrect Username or Password !!')</script>";
    }

}


?>