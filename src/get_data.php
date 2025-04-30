<?php
// Configura aquí tu conexión a la base de datos
$host = 'postgres';
$port = '5432';
$dbname = 'Queso';
$user = 'admin';
$password = 'admin';

$periodo = $_GET['periodo'] ?? '24h';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);

    // Consulta base con filtro de id_nodo = 'NT_1'
    $query = "SELECT fecha, temperatura, humedad FROM ntdato WHERE id_nodo = 'NT_1'";

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
    $temperaturas = [];
    $humedades = [];

    foreach ($resultados as $row) {
        // Formateamos la fecha con precisión de segundos
        $fecha = new DateTime($row['fecha']);
        $labels[] = $fecha->format('Y-m-d H:i:s'); // Formato con año, mes, día, hora, minuto, segundo

        $temperaturas[] = $row['temperatura'];
        $humedades[] = $row['humedad'];
    }
    
    // Devolver datos de temperatura y humedad
    echo json_encode([
        'labels' => $labels,
        'temperaturas' => $temperaturas,
        'humedades' => $humedades
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
