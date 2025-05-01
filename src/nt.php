<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica SCADA</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script src="graph.js"></script>
</head>

<body>
    <?php include "Cabezera.php";?>

    <!-- GRÁFICO -->
    <main class="main-graph container">
        <h2>Monitor de Humedad y Temperatura</h2>

        <canvas id="myChart"></canvas>

        <div class="filter-buttons">
            <button onclick="fetchData('1h')">Última hora</button>
            <button onclick="fetchData('24h')">Últimas 24h</button>
            <button onclick="fetchData('7d')">Última semana</button>
            <button onclick="fetchData('all')">Todo</button>
        </div>
    </main>

    <!-- FOOTER -->
<?php include "Pie.php";?>

    <!-- SCRIPT PARA GRAFICO -->

    <script>
        // Puedes agregar interactividad adicional si lo deseas
        $(document).ready(function() {
            $(".dropdown").hover(function() {
                $(this).children(".dropdown-content").stop(true, true).slideDown(200); // Muestra el submenú
            }, function() {
                $(this).children(".dropdown-content").stop(true, true).slideUp(200); // Oculta el submenú
            });
        });
    </script>
</body>
</html>
