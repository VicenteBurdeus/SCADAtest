#file: index.php
#Pagina principal
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCADA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/ico" href="Images/Icono.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php include "download.php";?>
</head>
<body>

    <?php include "comons/Cabezera.php";?>


    <section>
        <div class="header-content container">
            <div class="header-txt">
                <h1>SCADA</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum doloribus ex cumque.</p>
            </div>
            <div class="header-img">
                <img src="Images/SCADA.png" alt="SCADA.png not loaded">
            </div>
        </div>
    </section>

    <main class="scada container">
        <h2>Monitor de Humedad y Temperatura</h2>
        <canvas id="myChart" width="400" height="200"></canvas>

        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00'],
                    datasets: [
                        {
                            label: 'Temperatura (°C)',
                            data: [22, 21, 20, 19, 21, 22],
                            borderColor: 'rgb(255, 99, 132)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            fill: false,
                            tension: 0.1
                        },
                        {
                            label: 'Humedad (%)',
                            data: [60, 62, 64, 63, 61, 60],
                            borderColor: 'rgb(54, 162, 235)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            fill: false,
                            tension: 0.1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </main>

    <section class="Descargar-proyecto container">
        <form method="post" action="download.php" autocomplete="off">
            <h2>Descargar proyecto</h2>
            <div class="form-group">
                <div class="input-container">
                    <label for="nombre">Nombre y apellido</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre y apellido" required>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-container">
                    <label for="Tel">Teléfono</label>
                    <input type="text" name="Telefono" id="Tel" placeholder="Teléfono" required>
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="Correo">
                    <label for="Email">Email</label>
                    <input type="text" name="Email" id="Email" placeholder="Email" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn">Descargar</button>
            </div>
        </form>
    </section>
    <?php include "comons/Pie.php";?>
</body>
</html>

