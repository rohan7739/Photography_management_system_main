<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="style/layout_style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
</head>
<body>
 
<?php

    if(isset($_SESSION['uname'])){
    

        echo "<div class='user'><h3>Welcome ".$_SESSION['uname']."</h3></div>";
    
        echo "<br><div class='logout'><a href='logout.php'><input type='button' value='logout' name='logout'></a></div>";

        //echo "<br> <a href='home.php'><input type='button' name='back' value='back'></a>";
        ?>
<div class="Heading">
        <h1>Abhi Aghav Films & Photography</h1>
    </div>

    <div class="sidebox">
        <li><a href="home.php">Home</a></li>
        <li><a href="add_order.php">Add Order</a></li>
        <li><a href="requirements.php">Requirements</a></li>    
        <li><a href="edit_image.php">Edit Image</a></li>
        <li><a href="invoice.php">Invoice</a></li>
    </div>

    <?php

}
else{
    echo "<script>location.href='login.php'</script>";
}
?> 

   
</body>
</html>