<?php
session_start();
include 'functiones.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Productos</h2>

        <table class="table table-striped table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                agregar();
                ?>
            </tbody>
        </table>

        <div class="text-center mt-3">
            <a href="agregarProducto.php" class="btn btn-primary">Agregar nuevo</a>
        </div>
    </div>

</body>

</html>