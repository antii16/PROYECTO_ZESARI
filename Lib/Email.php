<?php

namespace Lib;
use PHPMailer\PHPMailer\PHPMailer;
use Utils\Utils;

class Email {
    public function enviarEmail($datos) {

        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.gmail.com';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 587;
        $phpmailer->Username = 'pilatescentrosalud@gmail.com';
        $phpmailer->Password = 'qxolbjdbmgpissfy';

        $phpmailer->setFrom('pilatescentrosalud@gmail.comm');
        $phpmailer->addAddress('alvareznella45@gmail.com', 'Cliente');
        $phpmailer->Subject = 'Bienvenida ZESARI';
        $phpmailer->isHTML(true);
        $phpmailer->CharSet = 'UTF-8';

        $email = $datos['email'];
        $password = $datos['password'];

        $phpmailer->Body = '';

        $phpmailer->Body .= " <div style='border-color: #84778C;'>
        <h1>Te damos la bienvenida a ZESARI </h1> 
        <h2> Gracias por confiar en nosotros </h2>
            <ul>
                <li style='color:#84778C;'>Email: $email</li>
                <li style='color:#84778C;'>Contraseña: $password</li>
            </ul>
            <h2>Recuerda cambiar la contraseña</h2>
            <div>";
            
        $phpmailer->send();
    }  
}