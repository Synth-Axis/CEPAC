<?php 

    session_start();

    $currentPage = basename($_SERVER["PHP_SELF"]);

?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="author" content="Creative Minds">
        <meta name="robots" content="index, follow">  
        <?php if($currentPage == "index.php") : ?>
            <meta http-equiv="refresh" content="0; URL='inicio.php'" />
        <?php else : ?> 
        <?php endif; ?>              
        <?php include 'includes/seo.php';?> 
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">       
        <link rel="stylesheet" type="text/css" href="css/style23.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"> 
    </head>

    <body>