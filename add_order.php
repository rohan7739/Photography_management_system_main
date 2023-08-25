<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="style/order.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
</head>
<body>



<?php
include('layout.php');
require 'connection/database_connection.php';



    if(isset($_SESSION['uname'])){
?>

    <div class="main">
        <h2 id='head'>Appointment Details</h2>
        <form action="" method="POST">
            
            <b>Name</b> :&nbsp; <input type="text" id="input" size="30" name="username" placeholder="username"><br><br>
            <b>Contact NO.</b> : <input type="text" id="input" size="30" name="contact" placeholder="Contact Number"><br><br>
            <b>Email</b> : <input type="text" size="30" id="input" name="email" placeholder="Enter your email"><br><br>
            <b>Location Address</b> : <textarea id='area' name='address' rows='3' cols='50' required></textarea><br><br>
            <b>Order Date</b> : <input type="date" size="30" id="input" name="date" placeholder="Address"><br><br>
            <b>Time</b> : <input type="time" size="30" name="time" id="input" placeholder="time"><br><br>
            <b>Type of Function</b> : <select name="functions" id="input">
                <option value="wedding">Wedding</option>
                <option value="maternity">Maternity</option>
                <option value="pre-wedding">Pre-Wedding</option>
                <option value="babyshoot">Baby Shoot</option>
                <option value="fashion">MaternFashionity</option>
                <option value="product">Product</option>
                <option value="events">Events</option>
                <option value="other">Others</option>
                </select><br><br>
                
                <b>Photographer</b> : 
            <select name="photographer" id="input" required>
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
                      <option value="<?php echo $data_row['name']; ?>"><?php echo $data_row['name']; ?></option>
                 </tr>
                 <?php
             }
             ?>

            </select><br><br>
            <b>Requirements</b> :
            <input type="checkbox" name="requirement[]" value="photos"> Photos<br>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;            
            <input type="checkbox" name="requirement[]" value="videos"> Videos<br><br>


             <input type="submit" id="submit" name="register" value="Submit">
        </form>
    
   

    </div>
<?php
        }
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
        $Name=$_POST['username'];
        $Contact=$_POST['contact'];
        $Email=$_POST['email'];
        $Address=$_POST['address'];
        $photographer=$_POST['photographer'];
        $Date=date('Y-m-d', strtotime($_POST['date']));
        $Time=$_POST['time'];
        $Function=$_POST['functions'];
        $Requirement=$_POST['requirement'];
        $Options = implode(" ",$Requirement);
            //only one value goes to database


        $sql="INSERT INTO APPOINTMENTS(`Name`, `Contact`,`Email`,`Address`,`Photographer`, `Date`, `Time`, `Function`,`Requirement`) VALUES('$Name','$Contact','$Email','$Address','$photographer','$Date','$Time','$Function','$Options')";
        $data = mysqli_query($con,$sql);


        if($data)
        {
            echo "<script>alert('Your Appointment Booked !!')</script>";
?>

        <meta http-equiv="refresh" content="0; url='add_order.php'" />

<?php
        }
        else
        {
            echo "<script>alert('Failed !!')</script>";

?>
            <meta http-equiv="refresh" content="0; url='home.php'" />

<?php
        }
        //mysqli_close($con);

    }

?>