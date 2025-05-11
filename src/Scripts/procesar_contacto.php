<?php
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
?>