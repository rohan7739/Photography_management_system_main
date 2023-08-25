<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	


	<link rel="stylesheet" href="style/search_invoice.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>

<?php
include('layout.php');
	if(isset($_SESSION['uname'])){
?>
    <div class="main">
       <form method="POST">
       <h4> Customer Email :</h4>    <input type="text" id="email" name="cust_email" placeholder="Enter Customer Email here">&nbsp;&nbsp;&nbsp;
       <input type="submit" id="button" name="ok" id="ok" value="OK"></h2>
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
if (isset($_POST['ok'])) {
  // check if email is valid
  $email = $_POST['cust_email'];
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email";
  } else {
    // connect to the database and fetch data
    $conn = mysqli_connect("localhost", "root", "", "photography");
    $query = "SELECT * FROM appointments WHERE Email='$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      // display the fetched data in input fields
    ?>
   
   <div class="col-lg-12" align="center">
			<br>
			<h2 align="center">Invoice Details</h2>
			<br>
			<table class="content-table">
			<thead>
			  <tr>
				<th width="5%">ID</th>
				<th width="10%">Cust name</th>
				<th width="10%">Contact #</th>
                <th width="10%">Email </th>
				<th width="10%">Address</th>
				<th width="5%">Photographer</th>
                <th width="5%">Date</th>
                <th width="5%">Time</th>
                <th width="5%">Function</th>
                
				<th width="10%">Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php                
			require 'connection/database_connection.php'; 
			$display_query = "SELECT T1.Id, T1.Name, T1.Contact, T1.Email, T1.Address,T1.Photographer, T1.Date, T1.Time, T1.Function FROM appointments T1 WHERE Email='$email'";             
			$results = mysqli_query($con,$display_query);   
			$count = mysqli_num_rows($results);			
			if($count>0) 
			{
				while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
				{
					?>
				 <tr>
				 	<td><?php echo $data_row['Id']; ?></td>
				 	<td><?php echo $data_row['Name']; ?></td>
				 	<td><?php echo $data_row['Contact']; ?></td>
				 	<td><?php echo $data_row['Email']; ?></td>
                    <td><?php echo $data_row['Address']; ?></td>
					<td><?php echo $data_row['Photographer']; ?></td>
                    <td><?php echo $data_row['Date']; ?></td>
                    <td><?php echo $data_row['Time']; ?></td>
                    <td><?php echo $data_row['Function']; ?></td>
				 	<td>
				 		<a href="pdff_make.php?Id=<?php echo $data_row['Id']; ?>&ACTION=VIEW" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> View PDF</a> &nbsp;&nbsp; 
				 		<a href="pdff_make.php?Id=<?php echo $data_row['Id']; ?>&ACTION=DOWNLOAD" class="btn btn-danger"><i class="fa fa-download"></i> Download PDF</a>
						&nbsp;&nbsp;
					</td>
				 </tr>
				 <?php
                 
				}
			}
			?>
			</tbody>
			</table>
		</div>
	</div>
</div>











<?php

      // add more input fields as needed
    } else {
      echo "No data found";
    }
  }
}

?>  