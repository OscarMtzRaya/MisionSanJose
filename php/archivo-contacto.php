<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Exception.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/PHPMailer.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/php/SMTP.php");

//Create an instance; passing `true` enables exceptions
extract($_REQUEST);
$codigo_de_error = "";

$mail = new PHPMailer(true);

/* Códigos de error
0 -> Todo correcto
1 -> Un campo vacío
2 -> No se pudo enviar el mensaje, problema ajeno a validaciones
3 -> No se seleccionó Captcha
*/


$captcha_es_valido = validarReCaptcha($_REQUEST['g-recaptcha-response']);
if (!$captcha_es_valido) {
    $codigo_de_error = "3";
    header('location: /index.php?msj='. $codigo_de_error);
    if (isset($_GET)) {
      include_once("php/msg.php");
    }
     exit;
} else {
try {
    //Server settings
    $mail->SMTPDebug = 2;                                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@grupoteso.com';    //SMTP username
    $mail->Password   = 'Grupoteso2024!';                        //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                                  //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //MANDAMOS EL NOMBRE EN UNA VARIABLE PARA PODER AGREGARLE LAA COMILLA SIMPLE
    $slh = "Mision San Jose";
    //Recipients
    $mail->setFrom('info@grupoteso.com', $slh); //QUIEN MANDA, CON EL NOMBRE
    $mail->addAddress('info@grupoteso.com', 'Formulario de reserva');

    //Content
    $mail->isHTML(true); //ACEPTAR HTML
    $mail->Subject = 'Nueva Reserva';

    $mail->Body    = '<html xmlns="http://www.w3.org/1999/xhtml">

          <head>
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <meta content="width=mobile-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" name="viewport">
              <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
              <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
              <meta content="#EEEEEE" name="sr bgcolor">
              <title>Mision San Jose</title>
              <style type="text/css">
              @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap");
                  html,
                  body {
                      width: 100%;
                      margin: 0;
                  }
          
                  #divPadre {
                    margin: 47px 13px;
                    padding: 0 20px;
                    font-family: "Montserrat", sans-serif;
                }
        
                #divHijo {
                    max-width: 100%;
                    padding: 10px;
                    margin: 40px auto;
                    background-color: rgb(255, 255, 255);
                    border-radius: 10px;
                    font-family: "Montserrat", sans-serif;
                    box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
                }
          
                  b {
                      color: #696969;
                  }
          
                  p {
                      margin-bottom: 5px;
                      margin-top: 0;
                  }
                  
                  p, h3 {
                      color: #848484;
                  }
          
                  a {
                      text-decoration: none;
                  }
          
                  .container {
                      margin-top: 50px;
                      display: flex;
                      flex-direction: row;
                      flex-wrap: wrap;
                  }
                  .pie-mensaje{

                    text-align:center;
                    font-family: "Montserrat", sans-serif;
                  }
                  .link-pdf{
                    margin-top:2rem;
                    margin-bottom:2rem;
                  }
                  .link-pdf a{
                    color:#fff !important;
                  }

                  .descargar-pdf{
                    border: #bbab9b 1px solid;
                    background:#bbab9b;
                    padding: 11px;
                    margin-top: 30px;
                    margin-bottom: 30px;
                    border-radius: 10px;
                  }
                  .footer{
                    margin-top:4rem;
                    text-align:center;
                    font-family: "Montserrat", sans-serif;
                  }
                  .cuerpo-mensaje{
                    text-align: justify;
                  }
              </style>
          </head>
          
          <body style="margin:0; padding:5px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; background-color: #f4f4f4;">
          
              <div id="divPadre">
          
                  <div id="divHijo">
                      <div style="padding:20px;">
                          <div class="container">                    
                              
                                <div style="width:100%; display: inline-block;">
                                    <div style="margin-bottom: 30px;">
                                    <div style="width:100%; display: inline-block;">
            
                                    <div class="cuerpo-mensaje" style="margin-bottom: 30px;">
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
                      </div>
                  </div>
              </div>
          </body>
          </html>
          ';
    $mail->CharSet = 'UTF-8';

    $mail->send();
    $codigo_de_error = "0";
    header('location: /index.php?msj='. $codigo_de_error);
    if (isset($_GET)) {
      include_once("php/msg.php");
    }
     exit;
} catch (Exception $e) {
    $codigo_de_error = "2";
    header('location: /index.php?msj='. $codigo_de_error.$e);
    if (isset($_GET)) {
      include_once("php/msg.php");
    }
     exit;
}
}

function validarReCaptcha($g_recaptcha)
    {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt(
        $ch,
        CURLOPT_POSTFIELDS,
        "secret=6LdJbr8fAAAAAJoBdOMWfku3Bs6IS-f1vKGsGJYs&response=$g_recaptcha"
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $json_response = json_decode($server_output);
    $success = $json_response->success;
    curl_close($ch);
    return $success;
    }
