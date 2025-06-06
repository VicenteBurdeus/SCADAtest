<?php

function get_topics() {

    $pdo = new PDO("pgsql:host=postgres;port=5432;dbname=Queso", "admin", "admin");
    
    $stmt = $pdo->prepare("SELECT DISTINCT topic FROM mqtt_topics order by topic ASC");
    $stmt->execute();
    $topics = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    // Devolver los topics como JSON
    echo json_encode($topics);
}

// Definir la función para obtener los mensajes de un topic
function get_msg($topic) {
    $pdo = new PDO("pgsql:host=postgres;port=5432;dbname=Queso", "admin", "admin");
    $queery = "SELECT * FROM (
                   SELECT * 
                   FROM mqtt_datos 
                   JOIN mqtt_topics ON mqtt_topics.id_topic = mqtt_datos.id_dato
                   WHERE mqtt_topics.topic = :topic 
                   ORDER BY mqtt_datos.fecha DESC 
                   LIMIT 50
               ) sub
               ORDER BY fecha ASC;";
    $stmt = $pdo->prepare($queery);
    $stmt->bindParam(':topic', $topic);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Devolver los mensajes como JSON
    echo json_encode($messages);
}


// Verifica qué acción se solicita a través de GET o POST
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'get_topics') {
            get_topics();
        } elseif ($_GET['action'] === 'get_msg' && isset($_GET['topic'])) {
            get_msg($_GET['topic']);
        } else {
            echo json_encode(["error" => "Acción no válida o faltan parámetros"]);
        }
    } else {
        echo json_encode(["error" => "No se especificó acción"]);
    }
}
?>
