<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/add_photographer.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Photographer</title>
</head>
<body>
 

<?php

include('ad_layout.php');

//session_start();
    if(isset($_SESSION['uname'])){
?>
 <div class="main">
        <h2 id='head'>Add Photographer</h2>
        <form action="" method="POST">
        <b>Name</b> : <input type="text" size="30" id="input" name="fname" placeholder="username" required><br><br>
        <b>Date Of Birth</b>: <input type="text" id="input" size="30" name="dob" placeholder="Enter your DOB" required><br><br>
        <b> Email</b>: <input type="text" size="30" id="input" name="email" placeholder="Email" required><br><br>
        <b>Phone</b> : <input type="text" size="30" id="input" name="phone" placeholder="Contact Number" required><br><br>
        <b> Password</b> : <input type="password" id="input" size="30" name="password" placeholder="Enter your password" required><br><br>
        <b>Confirm Password</b> : <input type="password" id="input" size="30" name="conpassword" placeholder="Enter your confirm password" required><br><br>
        <b>Location Address</b> :<br> <textarea name='address' id="area" rows='3' cols='50' required></textarea><br><br>
        <b>Experience</b> : <input type="text" size="30" name="experience" id="input" placeholder="Enter your Experience" required><br><br>
        <b>Gender</b> : 
            <div class="input-box">
            <select name="gender" id="input" required>
                <option value="Male"> Male </option>
                <option value="Female"> Female </option>
                <option value="Others"> Others </option>
            </select>
            
          </div><br><br>

             <input type="submit" id="submit" name="register" id="button" value="Submit">
           
        </form>
    </div>   
    
   

    <?php
            }
    else{
        echo "<script>location.href='login.php'</script>";
    }
?>

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
        $conpass=$_POST['conpassword'];
        $Address=$_POST['address'];
        $experience=$_POST['experience'];
        $gender = $_POST['gender'];
        

        $sql="INSERT INTO `registration`(`name`, `DOB`, `email`, `Phone`, `password`, `confirm_password`,`address`, `experience`, `gender`) VALUES('$name','$dateofbirth','$email','$phone','$password','$conpass','$Address','$experience','$gender')";
        $data = mysqli_query($con,$sql);


        if($data)
        {
            echo "<script>alert('Photographer Added Sucessfully !!')</script>";
?>

        <meta http-equiv="refresh" content="0; url='add_photographer.php'" />

<?php
        }
        else
        {
            echo "<script>alert('Failed !!')</script>";

?>
            <meta http-equiv="refresh" content="0; url='add_photographer.php'" />

<?php
        }
        //mysqli_close($con);

    }

?>
