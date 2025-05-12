<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizador MQTT</title>
    <link rel="icon" type="image/ico" href="Images/Icono.ico">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
    <script defer src="Scripts/MQTT.js"></script>
</head>

<body>
    <?php include "comons/Cabezera.php";?>
    <div id="app">
        <div class="sidebar">
            <h2>Topics</h2>
            <div id="topics"></div>
        </div>
        <div class="statusAndChat">
            <div class="status" id="status">Conectando al servidor...</div>
            <div class="chat">
                <div id="chat-header" class="chat-header">Selecciona un topic</div>
                <div id="messages" class="messages"></div>
                <div class="message-form">
                    <input type="text" id="messageInput" placeholder="Escribe un mensaje..." />
                    <button id="sendBtn">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <?php include "comons/Pie.php";?>
</body>
</html>
