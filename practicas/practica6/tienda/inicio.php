<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Mercadona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        button {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="container text-center my-5">
            <h1>Bienvenido a Mercadona</h1>
            <p>Por favor, completa el siguiente formulario para continuar tu compra.</p>
        </div>

        <div class="container">
            <form action="index.php" method="POST">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control">

                <label for="telefono" class="form-label">Número de Teléfono</label>
                <input type="number" id="telefono" name="telefono" class="form-control">

                <label for="imagen" class="form-label">URL de foto</label>
                <input type="text" id="imagen" name="imagen" class="form-control">

                <a href="index.php"><button type="submit" class="btn btn-primary btn-lg">Enviar</button></a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>