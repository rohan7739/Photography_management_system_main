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
error_reporting(0);
//session_start();

    if(isset($_SESSION['uname'])){
        include('connection/connection.php');
        //error_reporting(0);
        
        
        $query = "SELECT * FROM appointments";
        $data = mysqli_query($con,$query);
        
        $total = mysqli_num_rows($data);

?>
        
        
        <br>
        <h1 class="h1"> Appointments Details</h1><br>
        <center>
        <table class="content-table">
            <tr>
                <th width="3%">ID</th>
                <th width="15%">Name</th>
                <th width="9%">Contact</th>
                <th width="15%">Email</th>
                <th width="10%">Address</th>
                <th width="5%">Photographer</th>
                <th width="2%">Date</th>
                <th width="3%">Time</th>
                <th width="3%">Function</th>
                <th width="10%">Operation</th>
            </tr>
        
        
        
        
        
<?php
        if($total != 0)
        {
            while($result = mysqli_fetch_assoc($data))
            {
                echo "<tbody><tr>
                        <td>".$result['Id']."</td>
                        <td>".$result['Name']."</td> 
                        <td>".$result['Contact']."</td> 
                        <td>".$result['Email']."</td> 
                        <td>".$result['Address']."</td>
                        <td>".$result['Photographer']."</td> 
                        <td>".$result['Date']."</td> 
                        <td>".$result['Time']."</td> 
                        <td>".$result['Function']."</td> 
                        
        
                        <td><a href='process/appointment_update.php?id=$result[Id]'>Update</a>
                        <a href='process/appointment_delete.php?id=$result[Id]'>Delete</a></td>
        
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