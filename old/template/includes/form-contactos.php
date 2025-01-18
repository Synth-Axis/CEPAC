<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

$mail = new PHPMailer();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT); 
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);    

    $mail->isSMTP();
    $mail->Host = 'smtp-pt.securemail.pro';
    $mail->Username = 'comunicacao@cepac.pt';
    $mail->Password = '12345cepac1992';
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false;
    $mail->SMTPSecure = false;
    $mail->Port = 25;
  

    $mail->setFrom('comunicacao@cepac.pt', 'CEPAC');

    // destinatário
    $mail->addAddress('comunicacao@cepac.pt', 'CEPAC');
    
    
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8'; 
    $mail->Subject = 'Pedido de Contacto';
    $mail->Body =
        '<html>
        <head>
            <title>Pedido de Contacto</title>
        </head>
        <body>
            <p>Foi efetuado um novo pedido de contacto com os seguintes dados:</p>
            <p>Nome: ' . $name . '</p>
            <p>Email: ' . $email . '</p>
            <p>Telefone: ' . $phone . '</p>         
            <p>Mensagem: ' . $message . '</p>                
        </body>
    </html>
    ';

    if ($mail->send()) {
        $_SESSION['form_success'] = true;
        header('Location: ../contactos.php');
    } else {
        $_SESSION['form_success'] = false;
        header('Location: ../contactos.php');
    }
}
?>