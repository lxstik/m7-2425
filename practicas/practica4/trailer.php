<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tràiler de la pel·lícula</title>
    <!-- Enllaçar Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding-top: 50px;
        }
        h1 {
            margin-bottom: 30px;
        }
        iframe {
            width: 80%;
            height: 450px;
            margin-bottom: 30px;
        }
        .btn-custom {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
            if(isset($_GET['nombre']) && isset($_GET['trailer'])){
                $nombrePeli = $_GET['nombre'];
                $trailerPeli = $_GET['trailer'];

                echo'
                    <h1>Tràiler de '. $nombrePeli .'</h1>

                    <iframe width="560" height="315" src="'. $trailerPeli .'?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                    <div>
                        <a href="peliculas.php" class="btn btn-custom btn-lg">Volver</a>
                    </div>
                ';
            };
            
        ?>
    </div>

    <!-- JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</body>
</html>