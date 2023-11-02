<?php 

// 1 - Carregar o autoload
require_once '../vendor/autoload.php';

function sendEmail($destinario, $nomeDestinatario, $subject) {
    $phpmailer = new PHPMailer\PHPMailer\PHPMailer();

    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 587;
    $phpmailer->Username = 'e9e0eaf0ef7ab9';
    $phpmailer->Password = '0d63a1d40e26e5';

    $phpmailer->setFrom('banco@gmail.com', 'Banco Meu Dinheiro');
    $phpmailer->addAddress($destinario, $nomeDestinatario);
    $phpmailer->Subject = $subject;
    $phpmailer->isHTML(true);
    $phpmailer->Body = '<html>
    <head>
        <meta charset="UTF-8">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
            }
            .container {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            }
            h1 {
                color: red;
            }
            p {
                color: #666;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Olá,</h1>
            <p>Este é um exemplo de e-mail com estilo.</p>
        </div>
    </body>
</html>' ;


    //tentar enviar o email
    $phpmailer->send();
        }
?>