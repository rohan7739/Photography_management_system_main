<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
        <link rel="stylesheet" href="style/ad_layout.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
</head>
<body>
 
<?php

    

        echo "<div class='user'><h3>Welcome ".$_SESSION['uname']."</h3></div>";
    
        echo "<br><div class='logout'><a href='logout.php'><input type='button' value='logout' name='logout'></a></div>";

        //echo "<br> <a href='home.php'><input type='button' name='back' value='back'></a>";
        ?>
<div class="Heading">
        <h1>Abhi Aghav Films & Photography</h1>
    </div>

    <div class="sidebox">
        <li><a href="admin_home.php">Home</a></li>
        <li><a href="view_appointments.php">View Appointments</a></li>
        <li><a href="add_photographer.php">Add Photographer</a></li>
        <li><a href="view_cameraman.php">View Photographers</a></li>
        <li><a href="index_invoice.php">Invoice</a></li>
        <li><a href="index_invoice.php">Invoice</a></li>
    </div>


    

   
</body>
</html>