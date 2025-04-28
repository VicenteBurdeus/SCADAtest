<?php
// Configura aquí tu conexión a la base de datos
$host = 'localhost';
$port = '5432';
$dbname = 'queso';
$user = 'admin';
$password = 'admin';

$periodo = $_GET['periodo'] ?? '24h';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);

    // Consulta base con filtro de id_nodo = 'NT_1'
    $query = "SELECT fecha, temperatura FROM ntdato WHERE id_nodo = 'NT_1'";

    // Filtros de tiempo
    if ($periodo == '1h') {
        $query .= " AND fecha >= NOW() - INTERVAL '1 hour'";
    } elseif ($periodo == '24h') {
        $query .= " AND fecha >= NOW() - INTERVAL '1 day'";
    } elseif ($periodo == '7d') {
        $query .= " AND fecha >= NOW() - INTERVAL '7 days'";
    }
    // No ponemos más filtros

    $query .= " ORDER BY fecha ASC";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $labels = [];
    $values = [];

    foreach ($resultados as $row) {
        $labels[] = $row['fecha'];
        $values[] = $row['temperatura'];
    }
    
    echo json_encode(['labels' => $labels, 'values' => $values]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
