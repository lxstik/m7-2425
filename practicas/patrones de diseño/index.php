<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones de Diseño</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            color: #e74c3c;
        }
        .card {
            border: 2px solid #e74c3c;
            height: 100%;
        }
        .card-title {
            color: #e74c3c;
        }
        .btn-custom {
            background-color: #e74c3c;
            color: white;
        }
        .btn-custom:hover {
            background-color: #c0392b;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="mb-4">Patrones de Diseño</h1>
        <p class="lead">Los patrones de diseño (design patterns) son soluciones habituales a problemas comunes en el diseño de software. 
            Cada patrón es como un plano que se puede personalizar para resolver un problema de diseño particular de tu código.</p>
        
        <div class="row mt-4">
            <div class="col-md-4 d-flex">
                <div class="card p-3 w-100">
                    <div class="card-body">
                        <h5 class="card-title">Patrones Creacionales</h5>
                        <p class="card-text">Estos patrones proporcionan mecanismos para la creación de objetos que aumentan la flexibilidad y reutilización del código.</p>
                        <a href="./patrones/creacionales.php" class="btn btn-custom mt-auto">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card p-3 w-100">
                    <div class="card-body">
                        <h5 class="card-title">Patrones Estructurales</h5>
                        <p class="card-text">Se enfocan en la composición de clases y objetos para formar estructuras más grandes y eficientes.</p>
                        <a href="./patrones/estructurales.php" class="btn btn-custom mt-auto">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card p-3 w-100">
                    <div class="card-body">
                        <h5 class="card-title">Patrones de Comportamiento</h5>
                        <p class="card-text">Se centran en la comunicación entre objetos y la asignación de responsabilidades.</p>
                        <a href="./patrones/comportamiento.php" class="btn btn-custom mt-auto">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
