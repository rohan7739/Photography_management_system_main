<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="style/home.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    


<?php
include('layout.php');

if(isset($_SESSION['uname']))
{

    ?>

    <div class="main">
        <div class="info">
            <img id="image" src="pictures/index_image.jpg" alt="photographer"/>
            <h2 id="welcome">Welcome To</h2>
            <h2 id="label1">Abhi Aghav Studio</h2>
        </div>
        <hr>

        <h2>ALBUMS</h2>

            <input type="radio" id="Wedding" name="button" checked>
            <input type="radio" id="Maternity" name="button">
            <input type="radio" id="Baby_shoot" name="button">
            <input type="radio" id="pre-wedding" name="button">
            <input type="radio" id="product" name="button">
            <input type="radio" id="events" name="button">
            
        <div class="types">
            
            <label class="tag tag1" for="Wedding">Wedding</label>
            <label class="tag tag2" for="Maternity">Maternity</label>
            <label class="tag tag4" for="Baby_shoot">Baby shoot</label>
            <label class="tag tag5" for="pre-wedding">Pre-Wedding</label>
            <label class="tag tag6" for="product">Product</label>
            <label class="tag tag7" for="events">Events</label>
            <br>
        </div>
        
            <div class="images">
                        
                    <img src="pictures/maternity/Maternity.jpg"  class="Maternity">
                    <img src="pictures/maternity/Maternity1.jpg"  class="Maternity">
                    <img src="pictures/maternity/Maternity2.jpg"  class="Maternity">
                    <img src="pictures/maternity/Maternity3.jpg"  class="Maternity">

            
                    <img src="pictures/weddings/wedding.jpg" alt="image" class="Wedding">
                    <img src="pictures/weddings/wedding1.jpg" alt="image"  class="Wedding">
                    <img src="pictures/weddings/wedding2.jpg" alt="image" class="Wedding">
                    <img src="pictures/weddings/wedding3.jpg" alt="image" class="Wedding">


                    <img src="pictures/Baby_shoot/Baby_shoot1.jpg"  class="Baby_shoot">
                    <img src="pictures/Baby_shoot/Baby_shoot2.jpg"  class="Baby_shoot">
                    <img src="pictures/Baby_shoot/Baby_shoot3.jpg"  class="Baby_shoot">
                    <img src="pictures/Baby_shoot/Baby_shoot4.jpg"  class="Baby_shoot">

                
                    <img src="pictures/pre-wedding/pre-wedding1.jpg"  class="pre-wedding">
                    <img src="pictures/pre-wedding/pre-wedding2.jpg"  class="pre-wedding">
                    <img src="pictures/pre-wedding/pre-wedding3.jpg"  class="pre-wedding">
                    <img src="pictures/pre-wedding/pre-wedding4.jpg"  class="pre-wedding">


                    <img src="pictures/product/product1.jpg"  class="product">
                    <img src="pictures/product/product2.jpg"  class="product">
                    <img src="pictures/product/product3.jpg"  class="product">
                    <img src="pictures/product/product4.jpg"  class="product">


                    <img src="pictures/Events/event1.jpg"  class="events">
                    <img src="pictures/Events/event2.jpg"  class="events">
                    <img src="pictures/Events/event3.jpg"  class="events">
                    <img src="pictures/Events/event4.jpg"  class="events">
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