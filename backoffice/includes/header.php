<?php 
    // session_start();
    $currentPage = basename($_SERVER['PHP_SELF']); 

    require_once "../db/config.php";

    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
<!DOCTYPE html>
    <html lang="pt">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="Backoffice">
            <meta name="author" content="Creative Mids">
            <title>BackOffice</title>
            <!-- Favicon -->
            <link rel="icon" href="../images/favicon.png" type="image/png">
            <!-- Fonts -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
            <!-- Icons -->
            <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
            <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
            <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">
            <!-- Page plugins -->
            <!-- Argon CSS -->
            <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
            <link rel="stylesheet" href="assets/css/style1.css" type="text/css">
            <link rel="stylesheet" href="assets/css/style1.css" type="text/css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.1/tinymce.min.js" integrity="sha512-DBzdPxwo73sEoRl/rr2AwNV0R7tgPB2ffOc1grbUS9JxWd4kzzyp/VFRixYCtcdXzqhcIU5fpDkmDU7B1rBpVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> <script>
                tinymce.init({
                    selector: '.mytextarea',
                    plugins: [
                        'advlist', 'autolink' ,'lists', 'link' ,'image', 'charmap' ,'preview' ,
                        'searchreplace' ,'wordcount', 'visualblocks' ,'visualchars' ,'code' ,'fullscreen',
                        'insertdatetime', 'media','table' ,'directionality','emoticons'
                    ],
                    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons '
                    });
            </script>
        </head>

    <body>