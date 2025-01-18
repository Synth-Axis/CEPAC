<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

$mail = new PHPMailer();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);    

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
    $mail->Subject = 'Pedido de Subscrição de Newsletter';
    $mail->Body =
        '<html>
        <head>
            <title>Pedido de Subscrição de Newsletter</title>
        </head>
        <body>
            <p>Foi efetuado um novo pedido de subscrição de newsletter com o seguinte email: ' . $email . '</p>               
        </body>
    </html>
    ';

    if ($mail->send()) {
        $_SESSION['form_success'] = true;
        header('Location: ../inicio.php');
    } else {
        $_SESSION['form_success'] = false;
        header('Location: ../inicio.php');
    }
}
?>