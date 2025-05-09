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
            <form action="procesar_contacto.php" method="post">
                <input type="text" name="nombre" placeholder="Tu nombre" required>
                <input type="email" name="email" placeholder="Tu correo electrónico" required>
                <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." rows="6" required></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
        <div class="mapa">
            <h2>Estamos aquí</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d242.487459659908!2d-0.3481028146757841!3d39.48290938400785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1746817774603!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <?php include "comons/Pie.php";?>
</body>

