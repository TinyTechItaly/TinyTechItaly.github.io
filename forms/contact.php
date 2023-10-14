<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// Configura le impostazioni SMTP
$mail = new PHPMailer;

$mail->isSMTP();                                // Usa SMTP
$mail->Host = 'smtp.tinytech.it';               // Indirizzo del server SMTP
$mail->SMTPAuth = true;                        	// Abilita l'autenticazione SMTP
$mail->Username = 'info@tinytech.it'; 					// Nome utente SMTP
$mail->Password = 'wYFGESCI{y%E';          			// Password SMTP
$mail->SMTPSecure = 'tls';                      // Utilizza TLS (SSL è anche un'opzione)
$mail->Port = 587;                             	// Porta SMTP

// Controlla se la richiesta è stata inviata
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal modulo HTML
    $mittente = $_POST["nome"];
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
    if ($mail->send()) {
        echo 'Email inviata con successo';
    } else {
        echo 'Si è verificato un errore nell\'invio dell\'email: ' . $mail->ErrorInfo;
    }
}
?>
