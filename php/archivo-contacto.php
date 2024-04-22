<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Exception.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/PHPMailer.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/SMTP.php");

// Crear una instancia de PHPMailer con manejo de excepciones habilitado
$mail = new PHPMailer(true);

// Extraer variables del formulario (considera cambiar a un método más seguro)
extract($_REQUEST);

// Tipo de procesamiento (0 -> PHP, 1 -> AJAX)
$tipo_de_procesamiento = 0;

/* Códigos de error
0 -> Todo correcto
1 -> Un campo vacío
2 -> No se pudo enviar el mensaje, problema ajeno a validaciones
3 -> No se seleccionó Captcha
*/

try {
    // Configuración del servidor SMTP
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ivonne.mtz.manzo@gmail.com';
    $mail->Password   = 'pavrdzhnywcpnazm';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Configuración de remitente y destinatarios
    $mail->setFrom('ivonne.mtz.manzo@gmail.com', 'Formulario de reservaciones');
    $mail->addAddress('ivonne.mtz.manzo@gmail.com', 'Formulario de reservaciones');
    $mail->addBCC('ivonne.mtz.manzo@gmail.com');

    // Contenido del correo en formato HTML
    $mail->isHTML(true);
    $mail->Subject = $nombre . ' solicita una reservación';

    $mail->Body    = '<html xmlns="http://www.w3.org/1999/xhtml">

          <head>
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <meta content="width=mobile-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" name="viewport">
              <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
              <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
              <meta content="#EEEEEE" name="sr bgcolor">
              <title>Mision San José</title>
              <style type="text/css">
                  html,
                  body {
                      width: 100%;
                      margin: 0;
                  }
          
                  #divPadre {
                      text-align: center;
                      margin: 150px 20px;
                      padding: 0 20px;
                  }
          
                  #divHijo {
                      max-width: 750px;
                      padding: 10px;
                      margin: 150px auto;
                      background-color: rgb(255, 255, 255);
                      border-radius: 10px;
                      box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
                  }
          
                  b {
                      color: #696969;
                  }
          
                  p {
                      font-size: 14px;
                      margin-bottom: 5px;
                      margin-top: 0;
                  }
                  
                  p, h3 {
                      color: #848484;
                      text-align: left;
                  }
          
                  a {
                      text-decoration: none;
                      color: cornflowerblue;
                  }
          
                  .conteiner {
                      margin-top: 50px;
                      display: flex;
                      flex-direction: row;
                      flex-wrap: wrap;
                  }
              </style>
          
          
          
          </head>
          
          <body
              style="margin:0; padding:5px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; background-color: #f4f4f4;">
          
              <div id="divPadre">
          
                  <div id="divHijo">
          
          
                      <div style="margin: 20px 50px 50px 50px;">
                          <div>
                              <img style="max-width: 200px;" src="https://misiondsanjose.com/assets/images/logo/logo.png" alt="">
                          </div>
          
                          <div class="conteiner">                    
                              
                              <div style="width:100%; display: inline-block;">
          
                                  <div style="margin-bottom: 30px;">
                                    <h3><b>¡Tienes una nueva reservación!</h3>
                                    <h3>Estos son los datos que han proporcionado:</h3>
                                    <p style="margin-bottom: 15px;"><b>Nombre: </b>' . $nombre . '</p>
                                    <p style="margin-bottom: 15px;"><b>Correo: </b>' . $email . '</p>
                                    <p style="margin-bottom: 15px;"><b>Teléfono: </b>' . $tel . '</p>
                                    <p style="margin-bottom: 15px;"><b>Hora solicitada: </b>' . $hora . '</p>
                                    <p style="margin-bottom: 15px;"><b>Pax: </b>' . $pax . '</p>
                                    <p style="margin-bottom: 15px;"><b>Fecha: </b>' . $date . '</p> <br><br>
                                      <p style="margin-bottom: 15px; font-size: 12px;">Todos los derechos reservados Misión San José 2024</p>
                                  </div>
                              </div>
                              
                          </div>
          
          
                      </div>
          
          
                  </div>
          
          
          
              </div>
          
          
          
          </body>
          
          </html>
          
          ';


    $mail->CharSet = 'UTF-8';

    // Envío del correo
    $mail->send();

    mandarError("0");
} catch (Exception $e) {
   $captcha_es_valido = validarReCaptcha($_REQUEST['g-recaptcha-response']);
    if (!$captcha_es_valido) {mandarError("1");}
    else {mandarError("2");}

}

// Función para manejar errores y redireccionar o responder según el contexto
function mandarError($codigo_de_error) {
    global $tipo_de_procesamiento;

    if ($tipo_de_procesamiento == 0) {
        $mensaje_error = '';

        // Asignar mensajes de error según el código
        switch ($codigo_de_error) {
            case "0":
                $mensaje_error = "0";
                break;
            case "1":
                $mensaje_error = "1";
                break;
            case "2":
                $mensaje_error = "2";
                break;
        }

        // Redireccionar con mensaje de error
        header('location: /index.php?msj=' . $mensaje_error);
        exit;
    } else {
        // Responder con mensaje de error en formato JSON
        echo json_encode(array('error' => $codigo_de_error));
        exit;
    }
}

// Validar reCAPTCHA
function validarReCaptcha($g_recaptcha) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=6LdJbr8fAAAAAJoBdOMWfku3Bs6IS-f1vKGsGJYs&response=$g_recaptcha");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $json_response = json_decode($server_output);

    $success = $json_response->success;
    curl_close($ch);

    return $success;
}

?>
