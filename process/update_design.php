




<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../style/ad_layout.css">
    <link rel="stylesheet" href="../style/update_design.css">
    
    <title> update_photographer</title>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
include('../connection/connection.php');
include('../ad_layout.php');
error_reporting(0);

$id = $_GET['id'];
$query = "SELECT * FROM registration WHERE Id='$id'";
$data = mysqli_query($con,$query);
$result = mysqli_fetch_assoc($data);

?>



<div class="img">
  <div class="container">
    <h2 id='head'>Update Photographer Details</h2>
    <div class="content">

      <form action="#" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" id="input" value="<?php echo $result['name'];  ?>" placeholder="Enter your name" name="fname" required>
          </div>

          <div class="input-box">
            <span class="details">Date Of Birth</span>
            <input type="text" id="input" value="<?php echo $result['DOB']; ?>" placeholder="Enter your DOB" name="dob" required>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" id="input" value="<?php echo $result['email']; ?>" placeholder="Enter your email" name="email" required>
          </div>

          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" id="input" value="<?php echo $result['Phone']; ?>" placeholder="Enter your number" name="phone" required>
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" id="input" value="<?php echo $result['password']; ?>" placeholder="Enter your password" name="password" required>
          </div>

          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" id="input" value="<?php echo $result['confirm_password']; ?>" placeholder="Confirm your password" name="conpassword" required>
          </div>

          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" id="input" value="<?php echo $result['address']; ?>" placeholder="Enter your address" name="address" required>
          </div>

          <div class="input-box">
            <span class="details">Experience</span>
            <input type="text" id="input" value="<?php echo $result['experience']; ?>" placeholder="Enter your Experience" name="experience" required>
          </div>

        </div>
        <div class="gender-details">
          
          <span class="gender-title">Gender</span>
          <div class="input-box">
            <select name="gender" id="input">
                <option value=""> select</option>

                <option value="Male"
                    <?php 
                        if($result['gender'] == 'Male')
                        {
                            echo "selected";
                        }
                    ?>
                > Male </option>
                <option value="Female"
                    <?php 
                        if($result['gender'] == 'Female')
                        {
                            echo "selected";
                        }
                    ?>
                > Female </option>
                <option value="Others
                    <?php 
                        if($result['gender'] == 'Male')
                        {
                            echo "selected";
                        }
                    ?>
                "> Others </option>
            </select>
          </div>

        </div>
        <div class="button">
          <input type="submit" id="submit" value="Register" name="update">
        </div>

      </form>

    </div>
  </div>
</div>

</body>
</html>

<?php

    if($_POST['update'])
    {
        $name=$_POST['fname'];
        $dateofbirth=$_POST['dob'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $conpass=$_POST['conpassword'];
        $Address=$_POST['address'];
        $experience=$_POST['experience'];
        $gender = $_POST['gender'];
        

        $sql="INSERT INTO `registration`(`name`, `DOB`, `email`, `Phone`, `password`, `confirm_password`, `experience`, `gender`) VALUES('$name','$dateofbirth','$email','$phone','$password','$conpass','$experience','$gender')";
        
        $sql = "UPDATE registration SET name='$name',DOB='$dateofbirth',email='$email',Phone='$phone',password='$password',confirm_password='$conpass',address='$Address',experience='$experience',gender='$gender' WHERE Id='$id'";
        $data = mysqli_query($con,$sql);


        if($data)
        {
            echo "<script>alert('Record Updated !!')</script>";
        ?>

        <meta http-equiv="refresh" content="0; url='../view_cameraman.php'" />

        <?php
        }
        else
        {
            echo "Failed To Update";
        }
        //mysqli_close($con);

    }

?>