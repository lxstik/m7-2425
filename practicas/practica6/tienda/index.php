<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadona productos</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
        }

        footer {
            background-color: #343a40;
            color: #6c757d;
            padding: 20px 0;
            margin-top: auto;
        }
    </style>
</head>

<body>

    <?php
    // Incluimos los componentes
    include "includes/header.php";
    include "includes/footer.php";
    include "data/productos.php";
    include "includes/funciones.php";
    ?>

    <!-- header -->
    <?php
    echo "$header"
    ?>
    <div class="container">
        <div>
            <h2>Productos disponibles</h2>
            <!-- Aquí va la tabla de productos -->
            <?php
            generarTabla($productos)
            ?>



        </div>
        <!-- Incluye los datos de contacto del cliente con un toast live -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Mi perfil 🖐
        </button>

        <!-- Modal que al clicar aparece info de contacto -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Información de contacto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Aquí va la información de contacto -->
                        <?php
                        muestraInfoContacto($nombre, $telefono, $foto);
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal con la lista de productos que están disponibles -->
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <!-- Aquí la lista de productos -->
        </div>


    </div>
    <?php
    echo "$footer"
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>