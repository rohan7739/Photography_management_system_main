<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <style>
        .logout{
        display: flex;
        float: right;
        position: absolute;
        left: 88rem;
        top: 3rem;

        }

        .user{
            position: absolute;
            color: white;
            top: 30px;
            position: absolute;
            left: 26px;
        }
        </style>
  <link rel="stylesheet" href="../style/appointment_update.css">
    <meta charset="UTF-8">
    <title> registration form</title>
    <link rel="stylesheet" href="">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    
    
<?php
include('../connection/connection.php');
include('../ad_layout.php');
error_reporting(0);

$id = $_GET['id'];
$query = "SELECT * FROM appointments WHERE Id='$id'";
$data = mysqli_query($con,$query);
$result = mysqli_fetch_assoc($data);


?>





    <div class="main">

    <h2 id='head'>Update Appointments</h2>
        
        <form action="" method="POST">
           <br>
           <b>Name</b> :&nbsp; <input type="text" value="<?php echo $result['Name'];?>" id="input" size="30" name="username" placeholder="username"><br><br>
            <b>Contact NO.</b> : <input type="text" value="<?php echo $result['Contact'];?>" id="input" size="30" name="contact" placeholder="Contact Number"><br><br>
            <b>Email</b> : <input type="text" value="<?php echo $result['Email'];?>" size="30" id="input" name="email" placeholder="Enter your email"><br><br>
            <b>Location Address</b> : <input type="text" value="<?php echo $result['Address'];?>" size="30" height="30px" id="area" name="address" placeholder="Address"><br><br>
            <b>Order Date</b> : <input type="date" value="<?php echo $result['Date'];?>" size="30" id="input" name="date" placeholder="Address"><br><br>
            <b>Time</b> : <input type="text" size="30" value="<?php echo $result['Time'];?>" name="time" id="input" placeholder="time"><br><br>
            <b>Type of Function</b> : <input type="text" size="30" value="<?php echo $result['Function'];?>" name="functions" id="input" placeholder="function"><br><br>

            <?php
            /*
            <b>Type of Function</b> : <select name="functions" value="<?php echo $result['Function'];?>" id="input">
                <option value="wedding">Wedding</option>
                <option value="maternity">Maternity</option>
                <option value="pre-wedding">Pre-Wedding</option>
                <option value="babyshoot">Baby Shoot</option>
                <option value="fashion">MaternFashionity</option>
                <option value="product">Product</option>
                <option value="events">Events</option>
                <option value="other">Others</option>
                </select><br><br>

                
            */
            ?>
            
            <b>Current Photographer</b> : <input type="text" size="30" value="<?php echo $result['Photographer'];?>" name="Photographer" id="input" placeholder="Photographer"><br><br>
                

            <b>Change Photographer here</b> : 
            <select name="photographer" id="input"value="<?php echo $result['Photographer'];  ?>" required>


            <?php                
			 
             $display_query = "SELECT * FROM registration";             
             $results = mysqli_query($con,$display_query);   
             $count = mysqli_num_rows($results);			
             if($count>0) 
             {
                 while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
                 {
     ?>
                  <tr>
                      <option value="<?php echo $data_row['name'];?>"><?php echo $data_row['name']; ?></option>
                 </tr>
                 <?php
             }}

            
             ?>


            </select><br><br>
            <b>Requirements</b> : <input type="checkbox" value="photos" name="requirement[]"> Photos<br>
            
            <?php
            /*
            if(in_array(photos,$Options))
            {
                echo "checked";
            }
            */
            ?>
            
            
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;            
             <input type="checkbox" value="videos" name="requirement[]"> Videos<br><br>
             
             <?php
             /*
            if(in_array(videos,$Options))
            {
                echo "checked";
            }
            */
            ?>
             
             
             <input type="submit" id="submit" name="update" value="Submit">
    
    

    </div>
    </div>
  </div>
</div>

</body>
</html>

<?php

    if($_POST['update'])
    {
        $name=$_POST['username'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $photographer=$_POST['photographer'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $functions=$_POST['functions'];
        
        $Requirement=$_POST['requirement'];
        $Options = implode(" ",$Requirement);

        $sql="INSERT INTO `appointments`(`Name`, `Contact`, `Email`, `Address`,`Photographer`, `Date`, `Time`, `Function`, `Requirement`) VALUES('$name','$contact','$email','$address','$photographer','$date','$time','$functions','$Options')";
        
        $sql = "UPDATE appointments SET Name='$name',Contact='$contact',Email='$email',Address='$address',Photographer='$photographer',Date='$date',Time='$time',Function='$functions',Requirement='$requirement' WHERE Id='$id'";
        $data = mysqli_query($con,$sql);


        if($data)
        {
            echo "<script>alert('Record Updated !!')</script>";
        ?>

        <meta http-equiv="refresh" content="0; url='../view_appointments.php'" />

        <?php
        }
        else
        {
            echo "Failed To Update";
        }
        //mysqli_close($con);  <?php echo $result['Requirement'];

    }

?>