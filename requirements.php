<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="style/requirement.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirements</title>
</head>
<body>

<?php
include('layout.php');
    if(isset($_SESSION['uname'])){
?>
    <div class="main">
       <form method="POST">
       <h4 id="head1"> Customer Email :</h4>  &nbsp;&nbsp;  <input type="text" id="email" name="cust_email" placeholder="Enter Customer Email here">&nbsp;&nbsp;&nbsp;
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
    $query = "SELECT * FROM APPOINTMENTS WHERE Email='$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      // display the fetched data in input fields
    ?>
    <label id="label"><b>Location : </b></label>
    <?php
      echo "<input type='text' id='address' name='Address' value='".$row['Address']."'>";
      ?><br><br>
    <label id="label"><b>Date : </b></label>
    <?php
      echo "<input type='text' id='address' name='date' value='".$row['Date']."'>";
    ?><br><br>
    <label id="label"><b>Function : </b></label>
    <?php
      echo "<input type='text' id='address' name='Function' value='".$row['Function']."'>";
      ?><br><br>

<?php

      // add more input fields as needed
    } else {
      echo "No data found";
    }
  }
}

?>  