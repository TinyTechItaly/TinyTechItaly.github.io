<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';

//Load Composer's autoloader
require '../../vendor/autoload.php';

try {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();                                // Usa SMTP
    $mail->Host = 'mail.tinytech.it';               // Indirizzo del server SMTP
    $mail->SMTPAuth = true;                        	// Abilita l'autenticazione SMTP
    $mail->Username = 'info@tinytech.it'; 					// Nome utente SMTP
    $mail->Password = 'xxxxxxx';          			// Password SMTP
    $mail->SMTPSecure = 'tls';                      // Utilizza TLS (SSL è anche un'opzione)
    $mail->Port = 993;                             	// Porta SMTP


    // Recupera i dati dal modulo HTML
    $mittente = $_POST["name"];
    $email = $_POST["email"];
    $oggetto = $_POST["subject"];
    $messaggio = $_POST["message"];

    // Imposta il mittente e il destinatario
    $mail->setFrom($email, $mittente);
    $mail->addAddress('info@tinytech.it');

    // Imposta l'oggetto e il messaggio
    $mail->Subject = $oggetto;
    $mail->Body = $messaggio;

    // Invia l'email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
