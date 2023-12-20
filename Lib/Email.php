<?php

namespace Lib;
use PHPMailer\PHPMailer\PHPMailer;
use Utils\Utils;

class Email {
    public function enviarEmail($datos) {
        $email = $datos['email'];
        $password = $datos['password'];
        
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.gmail.com';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 587;
        $phpmailer->Username = 'pilatescentrosalud@gmail.com'; /**correo desde que se le envía */
        $phpmailer->Password = 'ocdj qhhm qjdu xmet'; /**contraseña de este correo */

        $phpmailer->setFrom('pilatescentrosalud@gmail.com');
        $phpmailer->addAddress($email, 'Cliente');
        $phpmailer->Subject = 'Bienvenida ZESARI';
        $phpmailer->isHTML(true);
        $phpmailer->CharSet = 'UTF-8';

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
            
        $enviado = $phpmailer->send();
        if($enviado) {
            return true;
        }else{
            return false;
        }
    }  


    public function enviarEmailZesari($datos){
        /**Función que utiliza el usuario para enviar un
         * mensaje a la empresa.
         */
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.gmail.com';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 587;
        $phpmailer->Username = 'alvareznella45@gmail.com'; 
        //$phpmailer->Password = 'joyr grgm ibhv ccgl'; //esta es la de pilates
        $phpmailer->Password = 'zfyy qtpg vaax rowa'; //contraseña de aplicacion en alvareznella45@gmail.com
        $phpmailer->setFrom('alvareznella45@gmail.com');/**Email por defecto, se debería utilizar el email correspondiente */
        $phpmailer->addAddress('pilatescentrosalud@gmail.com', 'Zésari');
        $phpmailer->Subject = 'Mensaje de cliente';
        $phpmailer->isHTML(true);
        $phpmailer->CharSet = 'UTF-8';

        $nombre = $datos['nombre'];
        $mensaje = $datos['mensaje'];

        $phpmailer->Body = '';

        $phpmailer->Body .= " 
        <div style='border-color: #84778C;'>
            <h1>Tienes un mensaje de $nombre </h1> 
            <p>$mensaje</p>
        <div>";
            
        $enviado = $phpmailer->send();

        if($enviado) {
            return true;
        }else {
            return false;
        }

    }
}