<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .Heading h1{
            position: absolute;
            top: 0px;
            left: 0px;
            width: 95rem;
        }
        .logout{
            position: absolute;
            top: 4rem;
            left: 4rem;
        }
    </style>


    <title>Edit Image</title>
    <link rel="stylesheet" href="style/image.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>
<body>



<?php
include('layout.php');
require 'connection/database_connection.php';



    if(isset($_SESSION['uname'])){
?>

<div class="container disable">
        <h2>Image Editor</h2>
        <div class="wrapper">
            <div class="editor-panel">
                <div class="filter">
                    <label class="title">Filters</label>
                    <div class="options">
                        <button id="brightness" class="active">Brightness</button>
                        <button id="saturation">Saturation</button>
                        <button id="inversion">Inversion</button>
                        <button id="grayscale">Grayscale</button>
                    </div>
                    <div class="slider">
                        <div class="filter-info">
                            <p class="name">Brighteness</p>
                            <p class="value">100%</p>
                        </div>
                        <input type="range" value="100" min="0" max="200">
                    </div>
                </div>
                <div class="rotate">
                    <label class="title">Rotate & Flip</label>
                    <div class="options">
                        <button id="left"><i class="fa-solid fa-rotate-left"></i></button>
                        <button id="right"><i class="fa-solid fa-rotate-right"></i></button>
                        <button id="horizontal"><i class='bx bx-reflect-vertical'></i></button>
                        <button id="vertical"><i class='bx bx-reflect-horizontal' ></i></button>
                    </div>
                </div>
            </div>
            <div class="preview-img">
                <img src="image-placeholder.svg" alt="preview-img">
            </div>
        </div>
        <div class="controls">
            <button class="reset-filter">Reset Filters</button>
            <div class="row">
                <input type="file" class="file-input" accept="image/*" hidden>
                <button class="choose-img">Choose Image</button>
                <button class="save-img">Save Image</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>



<?php
        }

else{
    echo "<script>location.href='login.php'</script>";
}
?>


</body>
</html>



