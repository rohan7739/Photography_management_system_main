<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="photography";
    $con=mysqli_connect($servername,$username,$password,$database);
    if($con)
    {
        //die("Error deleting record:".mysqli_error($con));
       //echo "connection ok";
    }

    else
    {
        echo "Connection failed";
    }

?>