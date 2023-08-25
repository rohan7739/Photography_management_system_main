<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> registration form</title>
    <link rel="stylesheet" href="style/reg_style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="img">
  <div class="container">
    <center><div class="title">Photographer Registration</div></center>
    <div class="content">

      <form action="" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="fname" required>
          </div>

          <div class="input-box">
            <span class="details">Date Of Birth</span>
            <input type="text" placeholder="Enter your DOB" name="dob" required>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required>
          </div>

          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phone" required>
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" required>
          </div>

          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="conpassword" required>
          </div>

          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter your address" name="address" required>
          </div>


          <div class="input-box">
            <span class="details">Experience</span>
            <input type="text" placeholder="Enter your Experience" name="experience" required>
          </div>

        </div>
        <div class="gender-details">
          
          <span class="gender-title">Gender</span>
          <div class="input-box">
            <select name="gender">
                <option value="Male"> Male </option>
                <option value="Female"> Female </option>
                <option value="Others"> Others </option>
            </select>
          </div>

        </div>
        <div class="button">
          <input type="submit" value="Register" name="register">
        </div>

      </form>

    </div>
  </div>
</div>

</body>
</html>




<?php
include('connection/connection.php');

    if($_POST['register'])
    {
        $name=$_POST['fname'];
        $dateofbirth=$_POST['dob'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $conpassword=$_POST['conpassword'];
        $Address=$_POST['address'];
        $experience=$_POST['experience'];
        $gender = $_POST['gender'];

        if($password == $conpassword)
        {
          $sql="INSERT INTO `registration`(`name`, `DOB`, `email`, `Phone`, `password`, `confirm_password`,`address`, `experience`, `gender`) VALUES('$name','$dateofbirth','$email','$phone','$password','$conpassword','$Address','$experience','$gender')";
          $data = mysqli_query($con,$sql);
  
  
          if($data)
          {
              echo "<script>alert('Data Inserted Sucessfully !!')</script>";
  ?>
  
          <meta http-equiv="refresh" content="0; url='login.php'" />
  
  <?php
          }
          else
          {
              echo "<script>alert('Failed !!')</script>";
  
  ?>
              <meta http-equiv="refresh" content="0; url='registration.php'" />
  
        }
        else
        {
          $_SESSION['status']="password doesnt match";
  ?>
              <meta http-equiv="refresh" content="0; url='registration.php'" />

        }
      
        

       
<?php
        }
        //mysqli_close($con);

    }
  }

?>