<?php
include('../connection/connection.php');
//error_reporting(0);

$id = $_GET['id'];

$query = "DELETE FROM appointments WHERE Id='$id'";
$data = mysqli_query($con,$query);

if($data)
{
    echo "Record Deleted";
?>
<meta http-equiv="refresh" content="0; url='../view_appointments.php'" />
<?php
}
else
{
    echo "Record deleted failed";
}
?>