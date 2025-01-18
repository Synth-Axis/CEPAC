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
        <link rel="stylesheet" type="text/css" href="css/style35.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"> 
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
    </head>

    <body>