<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoCheese</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/ico" href="Images/Icono.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="index">

    <?php include "comons/Cabezera.php";?>

    <section class="portada">
        <h1>Bienvenido a AutoCheese</h1>
        <p>AutoCheese es un proyecto que automatiza el manejo de quesos mediante robótica, sensores y comunicación IoT.</p>
    </section>

    <section class="video">
        <h2>Presentación en vídeo</h2>
        <video width="100%" controls>
            <source src="video/demo.mp4" type="video/mp4">
            Tu navegador no soporta videos HTML5.
        </video>
    </section>

    <section class="features-section">
        <h2>🔑 Características clave</h2>
        <div class="features-grid">
            <div class="feature-card">
                <h3>🦾 Simulación en RoboDK</h3>
                <p>El entorno de producción está modelado y simulado en tiempo real para validar movimientos y operaciones.</p>
            </div>
            <div class="feature-card">
                <h3>📡 Comunicación por MQTT</h3>
                <p>Todos los módulos intercambian información mediante el protocolo MQTT, garantizando rapidez y fiabilidad.</p>
            </div>
            <div class="feature-card">
                <h3>🌡️ Seguimiento ambiental</h3>
                <p>Visualiza la temperatura y humedad del entorno mediante sensores conectados y gráficas dinámicas.</p>
            </div>
            <div class="feature-card">
                <h3>🛡️ Controles de seguridad</h3>
                <p>Incluye detección de errores, límites de seguridad y protocolos de parada de emergencia.</p>
            </div>
        </div>
    </section>

    <section class="tech-section">
        <h2 class="tech-title">Tecnologías usadas</h2>
        <div class="tech-bubble-container">
            <div class="tech-bubble" style="top: 10%; left: 5%; width: 70px; background-color:rgb(171, 55, 55);" data-label="Python">
                <img src="Images/python.png" alt="Python" />
            </div>
            <div class="tech-bubble" style="top: 15%; left: 80%; width: 90px; background-color:rgb(230, 228, 227);" data-label="RoboDK">
                <img src="Images/RoboDK.png" alt="RoboDK" />
            </div>
            <div class="tech-bubble" style="top: 40%; left: 15%; width: 60px; background-color: #FF9900;" data-label="MQTT">
                <img src="Images/MQTT.png" alt="MQTT" />
            </div>
            <div class="tech-bubble" style="top: 25%; left: 60%; width: 80px; background-color: #00599C;" data-label="C++">
                <img src="Images/C++.png" alt="C++" />
            </div>
            <div class="tech-bubble" style="top: 55%; left: 35%; width: 65px; background-color: #F4A261;" data-label="Fusion 360">
                <img src="Images/Fusion-360.png" alt="Fusion360" />
            </div>
            <div class="tech-bubble" style="top: 65%; left: 90%; width: 55px; background-color: #3D3D3D;" data-label="Espressif">
                <img src="Images/Espressif.png" alt="Espressif" />
            </div>
            <div class="tech-bubble" style="top: 80%; left: 25%; width: 75px; background-color: #2496ED;" data-label="Docker">
                <img src="Images/Docker.png" alt="Docker" />
            </div>
            <div class="tech-bubble" style="top: 70%; left: 70%; width: 60px; background-color: #336791;" data-label="PostgreSQL">
                <img src="Images/PostgreSQL.png" alt="PostgreSQL" />
            </div>
        </div>
    </section>






    <?php include "comons/Pie.php";?>
</body>
</html>

<!--
    <?php include "download.php";?>
-->