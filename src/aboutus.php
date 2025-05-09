<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <link rel="icon" type="image/ico" href="Images/Icono.ico">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include "comons/Cabezera.php";?>

    <main class="aboutus">
        <section class="contenido-about">
            <div class="container">
                <h1>Sobre Nosotros</h1>
                <p>Somos un equipo técnico especializado en automatización, control y tecnologías industriales. Diseñamos soluciones personalizadas que reducen la mano de obra, mejoran la calidad de los productos y optimizan los procesos productivos mediante herramientas como sensores, controladores y software a medida.</p>
                <p>En esta demo presentamos un caso práctico de automatización del proceso de curado de quesos, desde la manipulación inicial hasta el almacenamiento automático, con trazabilidad total. Este ejemplo muestra cómo aplicamos nuestros conocimientos para ofrecer soluciones eficientes, escalables y adaptables a distintos sectores.</p>
                <p>Nuestro objetivo es ayudar a las empresas a avanzar hacia la industria 4.0 con sistemas fiables, fáciles de usar y preparados para evolucionar. Si tienes un proceso que mejorar o una idea que quieres hacer realidad, estamos aquí para hacerlo posible.</p>
            </div>

            <div class="imagen-circular">
                <img src="Images/aboutl40_C.png" alt="Foto del equipo">
            </div>
        </section>
        <br>
        <section class="contenido-equipo">
            <h2>Nuestro Equipo</h2>
            <br>
            <div class="equipo-cajas">
                <div class="caja-equipo">
                    <a href="https://www.linkedin.com/in/francisco-nortes-novikov-a24864234/" target="_blank">
                        <div class="caja-contenido">
                            <img src="Images/Francisco.png" alt="Francisco Nortes">
                            <h3>Francisco Nortes</h3>
                            <p>Programador de robots</p>
                        </div>
                    </a>
                </div>
                <div class="caja-equipo">
                    <a href="https://www.linkedin.com/in/mario-martinez-carneros-520280332/" target="_blank">
                        <div class="caja-contenido">
                            <img src="Images/Mario.png" alt="Mario Martínez">
                            <h3>Mario Martínez</h3>
                            <p>Técnico administrativo y programador</p>
                        </div>
                    </a>
                </div>
                <div class="caja-equipo">
                    <a href="https://explolaboinfantil.blogspot.com/p/en-taiwan.html" target="_blank">
                        <div class="caja-contenido">
                            <img src="Images/Kai.png" alt="Kai Aoiz">
                            <h3>Kai Aoiz</h3>
                            <p>Chino (falsificación)</p>
                        </div>
                    </a>
                </div>
                <div class="caja-equipo">
                    <a href="https://www.linkedin.com/in/vicente-burdeus-s%C3%A1nchez-3b0430140/" target="_blank">
                        <div class="caja-contenido">
                            <img src="Images/Vicente.png" alt="Vicente Burdeus">
                            <h3>Vicente Burdeus</h3>
                            <p>Desarrollador de backend</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php include "comons/Pie.php";?>
</body>
</html>
