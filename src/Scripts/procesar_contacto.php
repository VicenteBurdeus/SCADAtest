<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$host = 'postgres';
$port = '5432';
$dbname = 'Queso';
$user = 'admin';
$password = 'admin';

try {
    $dsn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'] ?? '';
        $email = $_POST['email'] ?? '';
        $mensaje = $_POST['mensaje'] ?? '';

        if (empty($nombre) || empty($email) || empty($mensaje)) {
            echo json_encode(['status' => 'error_campos']);
            exit;
        }

        // Enviar correo con PHPMailer
        /*$mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';        // Servidor SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'proyectofuturerobotics@gmail.com'; // Tu correo de Gmail
            $mail->Password = 'TU_CONTRASEÑA_DE_APLICACION'; // Contraseña de la aplicación de Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Seguridad TLS
            $mail->Port = 587; // Puerto SMTP para TLS

            // Remitente y destinatario
            $mail->setFrom($email, $nombre);  // El email que se pasa en el formulario
            $mail->addAddress('proyectofuturerobotics@gmail.com'); // Correo de destino

            // Contenido
            $mail->isHTML(false);
            $mail->Subject = 'Nuevo mensaje desde el formulario';
            $mail->Body = "Nombre: $nombre\nEmail: $email\nMensaje:\n$mensaje";

            $mail->send();
            error_log("Correo enviado correctamente");
        } catch (Exception $e) 
        {
            error_log("Error al enviar correo: " . $mail->ErrorInfo);
        }*/

        // Guardar en la base de datos
        $stmt = $dsn->prepare("INSERT INTO formularios (nombre, correo, mensaje) VALUES (:nombre, :email, :mensaje)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mensaje', $mensaje);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'ok']);
        } else {
            echo json_encode(['status' => 'error_db']);
        }
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error_conexion', 'error' => $e->getMessage()]);
}
exit;
