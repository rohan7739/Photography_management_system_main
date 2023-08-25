<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="stylesheet" href="style/view_appointments.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographers Details</title>
</head>
<body>

<?php
include('ad_layout.php');
if(isset($_SESSION['uname'])){
    include('connection/connection.php');
    //error_reporting(0);
    
    
    $query = "SELECT * FROM registration";
    $data = mysqli_query($con,$query);
    
    $total = mysqli_num_rows($data);

?>
        
        
        <br>
        <h1 class="h1"> Photographers Details</h1><br>
        <center>
        <table class="content-table">
            <tr>
                <Th width="3%">ID</th>
                <Th width="15%">Name</th>
                <Th width="9%">DOB</th>
                <Th width="15%">Email</th>
                <Th width="10%">Phone</th>
                <Th width="10%">Password</th>
                <Th width="10%">Address</th>
                <Th width="2%">experience</th>
                <Th width="3%">Gender</th>
                <Th width="10%">Operation</th>
            </tr>
        
        
        
        
        
<?php
        if($total != 0)
        {
            while($result = mysqli_fetch_assoc($data))
            {
                echo "
                <tbody>
                <tr>
                        <td>".$result['Id']."</td>
                        <td>".$result['name']."</td> 
                        <td>".$result['DOB']."</td> 
                        <td>".$result['email']."</td> 
                        <td>".$result['Phone']."</td> 
                        <td>".$result['password']."</td> 
                        <td>".$result['address']."</td> 
                        <td>".$result['experience']."</td> 
                        <td>".$result['gender']."</td>
        
                        <td><a href='process/update_design.php?id=$result[Id]'>Update</a>
                        <a href='process/delete.php?id=$result[Id]'>Delete</a></td>
        
                      </tr>   
                      </tbody>     
                     ";
            }
        }
        else
        {
            echo "No records";
        }
        
?>
        </table>
        </center>
        
        <script>
            function checkdelete()
            {
                return confirm('Are you sure you want to delete the records ?');
            }
        </script>


<?php        
        
    }
    else{
        echo "<script>location.href='login.php'</script>";
    }
?>

</body>
</html>