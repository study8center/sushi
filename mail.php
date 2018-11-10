<?php 

foreach($_POST as $k=>$v){ 
$$k=$v; 
} 

if (!ini_get('register_globals')) { 
   $superglobales = array($_SERVER, $_ENV, 
       $_FILES, $_COOKIE, $_POST, $_GET); 
   if (isset($_SESSION)) { 
       array_unshift($superglobales, $_SESSION); 
   } 
   foreach ($superglobales as $superglobal) { 
       extract($superglobal, EXTR_SKIP); 
   } 
} 

?>

<?
$mail="contacto@sushi.com";//mail a quien le va a llegar los correos
$origen="Sushi Roll";//Como quieres q diga en el nombre de quien envia el correo
$correo_from="dan@studio-8.co";//Este no se mueve hasta que lo subes a tu server porque debe ser un correo valido y dado de alta en el server q envia los datos para que no se vaya al spam o sea bloqueado por el servidor de correos.
$subject="Nuevo comentario Sushi'Roll";//Como quieres que diga en el titulo del mail
$myname="Contacto";

//aqui es donde puedo agregar mas variables...
$contenido="
Nombre: $nombre<br><br>
Email: $email<br><br>
Direccion: $direccion<br><br>
Teléfono: $telefono<br><br>
Comentarios: $comentarios

";

//aqui no toco nada...
$headers = "MIME-Version: 1.0 \n";
$headers.= "Content-type: text/html; charset=iso-8859-1\n";
$headers.= "From: \"".$origen."\" <$correo_from>\n";
//aqui es donde se envia todo...
mail($mail, "$subject", $contenido,$headers);

?>

<!-- Manda un alert de confirmacion despues de enviar el mail-->

<html>
<head>
<script type="text/javascript">

window.location = "index.html"
alert('Gracias hemos recibido sus comentarios!!');

</script>
</head>
<body></body>
</html>