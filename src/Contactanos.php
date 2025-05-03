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

    <main class="aboutus contactanos">
        <h1>Contáctanos</h1>
        <p>Si tienes alguna pregunta o necesitas más información, no dudes en ponerte en contacto con nosotros. Estamos aquí para ayudarte.</p>
        <p>Envia un correo electrónico a <strong><a href="mailto:info@futurerobotics.es"></a></strong> o rellena el sigiente formulario:</p>
        
        <div class="form-wrapper">
            <form action="enviar_correo.php" method="POST" class="contact-form">
              
                <p><strong>Información:</strong></p>  
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej: Juan Pérez" required>

                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Ej: juan@example.com" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4" placeholder="Escribe tu mensaje aquí..." required></textarea>

                <button type="submit">Enviar</button>
                
            </form>
        </div>    
    </main>
    <?php include "comons/Pie.php";?>
</body>

