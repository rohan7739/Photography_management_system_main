

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .paragraph{
        position: absolute;
        left: 24rem;
        top: 14rem;
        font-size: 48px;
        color: blanchedalmond;
    }
    </style>
    
    <link rel="stylesheet" href="style/ad_home.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    


<?php
include('ad_layout.php');
$uname="admin123";
$pwd = "admin";

//session_start();

    if(isset($_SESSION['uname'])){

?>

<section class="bg-image">
    <h1 id="hello">Hello Admin </h1>
<br><br>
    <p class="paragraph">Welcome to Abhi Aghav Films And Photography </p>
</section>
   
<?php
}

else{
    if($_POST['admin_uname']==$uname && $_POST['admin_pwd']==$pwd){

        $_SESSION['uname']=$uname;

            echo "<script>location.href='admin_home.php'</script>";
        }
        else{
            echo "<script>alert('username or password incorrect !')</script>";

            echo "<script>location.href='login.php'</script>";
    }
}
?>



</body>
</html>