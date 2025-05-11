<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos</title>
    <link rel="icon" type="image/ico" href="Images/Icono.ico">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include "comons/Cabezera.php";?>

    <div class="seccion-contacto">
        <div class="formulario">
            <h2>Contáctanos</h2>
            <form id="contactForm" method="post">
                <input type="text" name="nombre" id="nombre" placeholder="Tu nombre" required>
                <input type="email" name="email" id="email" placeholder="Tu correo electrónico" required>
                <textarea name="mensaje" id="mensaje" placeholder="Escribe tu mensaje aquí..." rows="6" required></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
        <div class="mapa">
            <h2>Estamos aquí</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d242.487459659908!2d-0.3481028146757841!3d39.48290938400785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1746817774603!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

            <!-- Popup -->
    <div id="popup" class="popup">
        <p id="popupMessage"></p>
    </div>
    
    <?php include "comons/Pie.php";?>
    


    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir que el formulario se envíe de manera tradicional

            const formData = new FormData(this);

            fetch('/Scripts/procesar_contacto.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'ok') {
                    showPopup("Mensaje enviado correctamente.");
                    document.getElementById('contactForm').reset(); // Limpiar el formulario
                } else if (data.status === 'error_campos') {
                    showPopup("Por favor, completa todos los campos.");
                } else if (data.status === 'error_db') {
                    showPopup("Error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.");
                } else if (data.status === 'error_conexion') {
                    showPopup("Error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.");
                }
            })
        });
    </script>
    <script src="Scripts/popupabout.js"></script>
</body>
</html>
