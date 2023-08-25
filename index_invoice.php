<?php
//session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	

	<link rel="stylesheet" href="style/admin_invoice.css">

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>

<?php
include('ad_layout.php');
//session_start();

	if(isset($_SESSION['uname'])){
?>



    <div class="container">
	<div class="row">


		<div class="col-lg-12" align="center">
			<br>
			<h5 id="head">Invoice Details</h5>
			<br>
			<table class="content-table">
			<thead>
			  <tr>
				<th width="3%">ID</th>
				<th width="10%">Cust name</th>
				<th width="5%">Contact #</th>
                <th width="5%">Email </th>
				<th width="10%">Address</th>
				<th width="5%">Photographer</th>
                <th width="3%">Date</th>
                <th width="3%">Time</th>
                <th width="3%">Function</th>
                
				<th width="10%">Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php                
			require 'connection/database_connection.php'; 
			$display_query = "SELECT T1.Id, T1.Name, T1.Contact, T1.Email, T1.Address,T1.Photographer, T1.Date, T1.Time, T1.Function FROM appointments T1";             
			$results = mysqli_query($con,$display_query);   
			$count = mysqli_num_rows($results);			
			if($count>0) 
			{
				while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
				{
					?>
				<tbody>
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
				</tbody>
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
    }
    else{
        echo "<script>location.href='login.php'</script>";
    }
?>







</body>
</html>




