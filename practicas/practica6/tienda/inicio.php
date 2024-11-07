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
            <!-- Formulario para agregar productos -->
            <form method="POST" action="index.php">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" required step="0.01">
                </div>
                <div class="mb-3">
                    <label for="disponibilidad" class="form-label">Disponibilidad</label>
                    <select class="form-select" id="disponibilidad" name="disponibilidad">
                        <option value="true">En stock</option>
                        <option value="false">No hay en stock</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Producto</button>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>