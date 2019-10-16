<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Piotr Jasiczek"/>
        <meta name="robots" content="index,follow"/>
        <meta name="description" content=""/>
        <title> Strona główna </title>
        <meta name="keywords" content="inwentaryzacja"/>
        <meta name="copyright" content="Piotr Jasiczek"/>
        <link rel="stylesheet" href="css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container_upload_file_main">
            <?php
            echo "<span class='container_logout'> <a href='index.php?action=logout'> <i style='font-size:15px; color:black' class='fa'>&#xf08b;</i> </a> Witaj " . ucwords($_SESSION['user']) . " ! </span>";
            ?>
        </div>
    </body>
</html>