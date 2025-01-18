<?php

// session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT); 
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);    

  $captcha = $_POST["captcha"];
  $captchaUser = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);

  if(
    !empty($name) &&
    (is_numeric($name) === false) &&
    !empty($email) &&
    !empty($phone) &&
    is_numeric($phone) &&
    !empty($message) &&
    (mb_strlen($message) > 10 ) &&
    filter_var($email, FILTER_VALIDATE_EMAIL)
  ) {
    if(empty($captcha)) {
      $captchaError = array(
        "status" => "alert-danger",
        "message" => "Por favor, digite o captcha."
      );
    }
    else if($_SESSION['CAPTCHA_CODE'] == $captchaUser){
      $captchaError = array(
        "status" => "alert-success",
        "message" => "Seu formulário foi submetido com sucesso."
      );
      // $mail->SMTPDebug  = 4;
      $mail->isSMTP();
      $mail->Host = 'smtp-pt.securemail.pro';
      $mail->Username = 'comunicacao@cepac.pt';
      $mail->Password = '12345cepac1992';
      $mail->SMTPAuth = true;
      // $mail->SMTPAutoTLS = false;
      $mail->SMTPSecure = "ssl";
      $mail->Port = 465;

  

      $mail->setFrom('comunicacao@cepac.pt', 'CEPAC');
// $mail->SMTPDebug  = 2;

      // $mail->isSMTP();

      // $mail->SMTPAuth   = TRUE;
      // $mail->SMTPSecure = "tls";
      // $mail->Port       = 587;
      // $mail->Host       = "smtp.gmail.com";
      // $mail->Username = 'dev.cm.send@gmail.com';
      // $mail->Password = 'jprxldaspgskunqm';

      //   $mail->setFrom('dev.cm.send@gmail.com', 'Open Days Porto da Figueira da Foz');


      // destinatário
      // $mail->addAddress('comunicacao@cepac.pt', 'CEPAC');
      $mail->addAddress('olginha1@gmail.com', 'CEPAC');
      
      
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
      
    } else {
      $captchaError = array(
        "status" => "alert-danger",
        "message" => "Captcha é inválido."
      );
    }
  } else {
    $msgError = array(
      "status" => "alert-danger",
      "message" => "Por favor, preencha todos os campos!"
    );
  }
}
?>