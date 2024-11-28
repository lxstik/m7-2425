<?php
session_start();
include 'functiones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    array_push($_SESSION['productos'], [
        "nombre" => $_POST['nombre'],
        "precio" => $_POST['precio'],
        "descripcion" => $_POST['descripcion'],
    ]);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agregarProducto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-12 col-md-6 col-lg-4">
            <h2 class="text-center mb-4">Agregar Producto</h2>
            <form method="post" action="agregarProducto.php" class="bg-white p-4 rounded shadow-sm">

                <div class="mb-3">
                    <input class="form-control" placeholder="Nombre" type="text" name="nombre" id="nombre" required>
                </div>

                <div class="mb-3">
                    <input class="form-control" placeholder="Precio" type="text" name="precio" id="precio" required>
                </div>

                <div class="mb-3">
                    <input class="form-control" placeholder="Descripción" type="text" name="descripcion" id="descripcion" required>
                </div>

                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <div class="text-center">
                    <input class="btn btn-warning w-100 mt-3" type="submit" value="Agregar Producto">
                </div>
            </form>
        </div>
    </div>
</body>

</html>