    <!-- CABECERA -->
    <header class="header">
        <div class="menu-logo">
            <a href="index.php">
            <img src="Images/Icono.png" alt="no se ha cargado la imagen de la cabecera">
            <span class="menu-title">AutoCheese</span>
            </a>
            <div class="hamburger" id="hamburger">
                ☰
            </div>
        </div>
        <div class="menu-list">
            <ul>
                <li><a href="index.php"> Inicio </a></li>
                <li class="dropdown">
                    <a href="#">Proyectos</a>
                    <ul class="dropdown-content">
                        <li><a href="nt.php">Nodo temperatura</a></li>
                        <li><a href="#proyecto2">Proyecto 2</a></li>
                        <li><a href="#proyecto3">Proyecto 4</a></li>
                    </ul>
                </li>
                <li><a href="Contactanos.php">Contacto</a></li>
                <li><a href="aboutus.php">Sobre Nosotros</a></li>
            </ul>
        </div>
    </header>

<script>
    const hamburger = document.getElementById('hamburger');
    const menuList = document.querySelector('.menu-list');

    hamburger.addEventListener('click', () => {
        menuList.classList.toggle('show');
    });
</script>