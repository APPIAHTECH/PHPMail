<?php

require './PHPMailer/PHPMailerAutoload.php';
date_default_timezone_set('Etc/UTC');

$nombre = "";
$asunto = "";
$correo ="";
$telefono = "";
$menssage = "";
$mail = new PHPMailer();

if(isset($_POST['enviar'])){

$datos = [
  'nombre' => $_POST['nombre'],
  'asunto' => $_POST['asunto'],
  'correo' => $_POST['mail'],
  'telefono' => $_POST['telefono'],
  'menssage' => $_POST['menssage'],
  'administrador' => "eunisaesea@gmail.com" //CAMBIAR POR TU CORREO OR EL ADMIN !
];

  if(guardarPDF()) // la funcion guarda en la carptea archivos el archivo subido por el usuario
    enviarCorreo($mail , $datos);
}

function guardarPDF()
{
  $esValido = true;
  define ('RUTADIR', realpath(dirname(__FILE__))); //DEFINE LA ABSOLUTA DEL ARCHIVO
  if(isset($_FILES['archivo']['name']))
  {

    if($_FILES['archivo']['size'] > (1024000)) //EL ARCHIVO NO PUDE SER MAS GRADE QUE 1MB
    {
      $esValido = false;
      echo "La mida en MB del archivo es demasiado grande. maximo 1MB";
    }

    if($esValido)
    {
      $archivo_temporal = $_FILES["archivo"]["tmp_name"];
      $resultado = move_uploaded_file($archivo_temporal, RUTADIR.'/archivos/'.'cv.pdf'); //GUARDANDO EL ARCHIVO EN LA CARPETA archivos
    }

    return $resultado; //retorna true en caso de exito falo en caso contrario.
 }

}

//IMPORTANTE!
function configuraciones($mail){

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'eunisaesea@gmail.com';                 // SMTP CUENTA DEL SMTP (EX : eunisaesea@gmail.com)
  $mail->Password = 'POSAR AQUI PASSWORD';                           // SMTP CONTRASEÑA DE LA CUENTA
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to
  $mail->SMTPDebug = 0;

}
function enviarCorreo($mail , $datos = []){
    configuraciones($mail);
      //Set who the message is to be sent from
    $mail->setFrom($datos['administrador'], 'administrador');

    //Set who the message is to be sent to
    $mail->addAddress($datos['correo'], $datos['nombre']);
    //Set the subject line
    $mail->Subject = $datos['asunto'];
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML(file_get_contents('plantilla.html'), dirname(__FILE__));

    //Attach an image file
    $mail->addAttachment('archivos/cv.pdf');

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message enviado!";
    }

}

 ?>
