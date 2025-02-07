<?php

include("../componentes/header.php");
include("../componentes/nav.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones Estructurales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            color: #e74c3c;
        }
        .card {
            border: 2px solid #e74c3c;
            height: auto;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
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
            justify-content: center;
            align-items: center;
        }
        .lead {
            margin-top: 10px;
            font-size: 16px;
        }
        .description {
            display: none;
            margin-top: 20px;
        }

        .form-select {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        select:focus + .description {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container text-center mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Patrones Estructurales</h1>
                <p class="lead">Los patrones estructurales explican cómo ensamblar objetos y clases en estructuras más grandes, a la vez que se mantiene la flexibilidad y eficiencia de estas estructuras.</p>

                <select class="form-select" aria-label="Seleccione un patrón estructural" onchange="showDescription()">
                    <option selected disabled>Selecciona un patrón</option>
                    <option value="adapter">Adapter</option>
                    <option value="bridge">Bridge</option>
                    <option value="composite">Composite</option>
                    <option value="decorator">Decorator</option>
                    <option value="facade">Facade</option>
                    <option value="flyweight">Flyweight</option>
                    <option value="proxy">Proxy</option>
                </select>

                <div class="description" id="description-adapter">
                    <h5>Adapter</h5>
                    <p>Permite la colaboración entre objetos con interfaces incompatibles.</p>
                    <a href="./estructurales-Adapter.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-bridge">
                    <h5>Bridge</h5>
                    <p>Permite dividir una clase grande o un grupo de clases estrechamente relacionadas, en dos jerarquías separadas (abstracción e implementación) que pueden desarrollarse independientemente la una de la otra.</p>
                    <a href="./estructurales-Bridge.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-composite">
                    <h5>Composite</h5>
                    <p>Permite componer objetos en estructuras de árbol y trabajar con esas estructuras como si fueran objetos individuales.</p>
                    <a href="./estructurales-Composite.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-decorator">
                    <h5>Decorator</h5>
                    <p>Permite añadir funcionalidades a objetos colocando estos objetos dentro de objetos encapsuladores especiales que contienen estas funcionalidades.</p>
                    <a href="./estructurales-Decorator.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-facade">
                    <h5>Facade</h5>
                    <p>Proporciona una interfaz simplificada a una biblioteca, un framework o cualquier otro grupo complejo de clases.</p>
                    <a href="./estructurales-Facade.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-flyweight">
                    <h5>Flyweight</h5>
                    <p>Permite mantener más objetos dentro de la cantidad disponible de memoria RAM compartiendo las partes comunes del estado entre varios objetos en lugar de mantener toda la información en cada objeto.</p>
                    <a href="./estructurales-Flyweight.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-proxy">
                    <h5>Proxy</h5>
                    <p>Permite proporcionar un sustituto o marcador de posición para otro objeto. Un proxy controla el acceso al objeto original, permitiéndote hacer algo antes o después de que la solicitud llegue al objeto original.</p>
                    <a href="./estructurales-Proxy.php" class="btn btn-custom">Ver más</a>
                </div>

            </div>
        </div>
    </div>

    <script>
        function showDescription() {
            const descriptions = document.querySelectorAll('.description');
            descriptions.forEach(description => {
                description.style.display = 'none';
            });

            const seleccionadaOption = document.querySelector('select').value;
            const seleccionadaDescription = document.getElementById('description-' + seleccionadaOption);
            if (seleccionadaDescription) {
                seleccionadaDescription.style.display = 'block';
            }
        }
    </script>
</body>
</html>
