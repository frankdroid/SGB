<?php 
session_start();
include('classes/bd.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enviar Nueva Contraseña</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

</head>
<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">Introduzca su correo electrónico:</p>
<table align="center" >
  <tr>
    <td><form name="form1" method="post" action="">
        <table align="center" cellpadding="1">
          <tr>
            <td><input name="email" type="text" id="email" onChange="this.value = this.value.toUpperCase();" size="30"></td>
          </tr>
          <tr>
            <td align="center"><input name="enviar" type="submit" class="botones" id="enviar" value="Enviar Clave"></td>
          </tr>
        </table>
      </form>
      <p align="center" class="Estilo1"><a href="index.php">Ir a página de inicio de sesión</a> </p></td>
  </tr>
</table>
<p align="center">
<?php
	if ($_POST[enviar]) {
		$email=$_POST[email];
		$enlace = mysql_connect("localhost","root","3226"); mysql_select_db("SGB",$enlace);
		$resul = mysql_query("SELECT * FROM usuarios WHERE email = '$email'");		
		$reg = mysql_num_rows($resul);
		if ($reg>0) { // si el correo esta registrado
			$nueva_clave = rand(10000,99999);
			mysql_query("UPDATE usuarios SET clave = sha1($nueva_clave) WHERE email = '$email'");
			require_once("classes/class.phpmailer.php");
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Debugoutput = 'html';
			//Set the hostname of the mail server
			$mail->Host = "smtp.gmail.com";
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "ssl";
			$mail->Port = 465;
			//Username to use for SMTP authentication
			$mail->Username = "seccion723@gmail.com";
			//Password to use for SMTP authentication
			$mail->Password = "seccion7023";
			//Set who the message is to be sent from
			$mail->setFrom('molina.frank@gmail.com', 'First Last');
			//Set an alternative reply-to address
			$mail->addReplyTo('info@sgb.com', 'First Last');
			//Set who the message is to be sent to
			$mail->Subject = 'Prueba de correo SGB';
			//Read an HTML message body from an external file, convert referenced images to embedded,
			$mensaje = "Su nueva contraseña clave es: $nueva_clave \n
						Sistema de Gestión de Biblioteca";
			$mail->msgHTML($mensaje);
			$mail->addAddress($email, $nombre);
			if (!$mail->send()) {
				echo "<p align='center' style='color:#F00'>Mailer Error: " . $mail->ErrorInfo."</p>";
			} else {
				echo "<p align='center' style='color:#03C'>Su clave personal se ha enviado a su correo electrónico</p>";
			}
		} else { // si el correo no existe
			print "<p align='center' style='color:#F00'>Introduzca un correo electrónico válido. Usuario no registrado</p>";
		}
	}
			
 ?></p>
<p>&nbsp;</p>
</body>
</html>
