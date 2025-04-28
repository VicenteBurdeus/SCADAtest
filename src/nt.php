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

    <style>
        /* Estilos del menú */
        .menu-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-list li {
            position: relative;
            display: inline-block;
        }

        .menu-list a {
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            display: block;
        }

        /* Submenú desplegable */
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <!-- CABECERA -->
    <header class="header">
        <div class="menu-logo">
            <img src="Images/menu.png" class="menu-icono" alt="menu.png no cargado">
        </div>
        <div class="menu-list">
            <ul>
                <li><a href="#inicio">Inicio</a></li>
                <li class="dropdown">
                    <a href="#">Proyectos</a>
                    <ul class="dropdown-content">
                        <li><a href="nt.php">Nodo temperatura</a></li>
                        <li><a href="#proyecto2">Proyecto 2</a></li>
                        <li><a href="#proyecto3">Proyecto 3</a></li>
                    </ul>
                </li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="#sobre-nosotros">Sobre Nosotros</a></li>
            </ul>
        </div>
        <div class="login">
            <a href="login.php" class="btn">Iniciar sesión</a>
        </div>
    </header>

    <!-- GRÁFICO -->
    <main class="main-graph container">
        <canvas id="myChart"></canvas>

        <div class="filter-buttons">
            <button onclick="fetchData('1h')">Última hora</button>
            <button onclick="fetchData('24h')">Últimas 24h</button>
            <button onclick="fetchData('7d')">Última semana</button>
            <button onclick="fetchData('all')">Todo</button>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content container">
            <div class="footer-txt">
                <h2>SCADA</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.</p>
            </div>
            <div class="footer-img">
                <img src="Images/SCADA.png" alt="SCADA.png no cargado">
            </div>
        </div>
    </footer>

    <!-- SCRIPT PARA GRAFICO -->
    <script src="graph.js"></script>

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
