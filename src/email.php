<?php 

// 1 - Carregar o autoload
require_once '../vendor/autoload.php';

function sendEmail(){
    $phpmailer = new PHPMailer\PHPMailer\PHPMailer();

    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth =true;
    $phpmailer->Port = 587;
    $phpmailer->Username = 'e9e0eaf0ef7ab9';
    $phpmailer->Password = '0d63a1d40e26e5';


    //Configuracoes de email
    $phpmailer->setFrom('banco@gmail.com', 'Banco Meu Dinheiro');
    $phpmailer->addAddress('fabricionsilva26@gmail.com', 'Fabricio Nascimento');
    $phpmailer->Subject = 'FEEDBACK SOBRE ATENDIMENTO';
    $phpmailer->Body = 'teste conteudo email .............' ;


    //tentar enviar o email
    if($phpmailer->send()){
        echo 'Email enviado com sucesso';
    }else{
        echo 'Erro ao enviar o email' . $phpmailer->ErrorInfo;
    }
    
}

?>