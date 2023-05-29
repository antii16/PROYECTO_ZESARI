<?php

namespace Lib;
use PHPMailer\PHPMailer\PHPMailer;
use Utils\Utils;

class Email {

    public function enviarEmail($pedido) {

        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.gmail.com';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 587;
        $phpmailer->Username = 'pilatescentrosalud@gmail.com';
        $phpmailer->Password = 'pilatescentro123';

        $phpmailer->setFrom('pilatescentrosalud@gmail.comm');
        $phpmailer->addAddress('alvareznella45@gmail.com', 'YourFilm.com');
        $phpmailer->Subject = 'Tu pedido';
        $phpmailer->isHTML(true);


        $phpmailer->CharSet = 'UTF-8';

        //Cuerpo del correo
        $stats = Utils::statsCarrito();
        $id = $pedido->setPedidoId();
        $pedido_id = $id->id;
        $phpmailer->Body = '';

        $phpmailer->Body .= " <h1>Tu pedido de YourFilm </h1> 
            <ul>
                <li>Nombre del cliente: {$_SESSION['identity']->nombre} </li>
                <li>Número de pedido: $pedido_id</li>
                <li>Precio total: {$stats['total']}$</li>
            </ul>
            
            <table>
            <tr>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>";
            foreach($_SESSION['carrito'] as $indice => $elemento) {
                $pelicula = $elemento['peliculas'];

                $phpmailer->Body .="<tr>
                    <td>$pelicula->titulo</td>
                    <td>$pelicula->precio</td>
                    <td>{$elemento['unidades']}</td>
                </tr></table>";

            }

        $phpmailer->send();
    }

   
}