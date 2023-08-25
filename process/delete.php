<?php
include('../connection/connection.php');
//error_reporting(0);

$id = $_GET['id'];

$query = "DELETE FROM registration WHERE Id='$id'";
$data = mysqli_query($con,$query);

if($data)
{
    echo "Record Deleted";
?>
<meta http-equiv="refresh" content="0; url='../view_cameraman.php'" />
<?php
}
else
{
    echo "Record deleted failed";
}
?>