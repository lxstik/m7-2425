<?php

echo '
    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div>
                    <h4 class="m-0">Hola, ' . $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] . '</h4>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <a href="inicio.php" class="me-3">Inicio</a>
                <a href="productos.php" class="me-3">Productos</a>
                <a href="contacto.php">Contacto</a>
            </div>
        </div>
    </header>
';
