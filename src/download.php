<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar y sanitizar los datos del formulario
    /*$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);*/

    if (1) {
        // Ruta del archivo a descargar
        $file_path = '/var/www/html/index.php'; // Cambia esto a la ruta de tu archivo

        // Verificar si el archivo existe
        if (file_exists($file_path)) {
            // Configurar las cabeceras para la descarga
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));
            readfile($file_path);
            exit;
        } else {
            echo "El archivo no existe. en la ruta: $file_path";
        }
    } else {
        echo "Por favor, completa todos los campos correctamente.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>