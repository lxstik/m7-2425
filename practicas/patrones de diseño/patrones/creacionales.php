<?php

include("../componentes/header.php");
include("../componentes/nav.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones Creacionales</title>
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
    </style>
</head>
<body>
    <div class="container text-center mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Patrones Creacionales</h1>
                <p class="lead">Selecciona un patrón creacional para aprender más.</p>

                <select class="form-select" aria-label="Selecciona un patrón creacional" onchange="showDescription()">
                    <option selected disabled>Selecciona un patrón</option>
                    <option value="factory-method">Factory Method</option>
                    <option value="abstract-factory">Abstract Factory</option>
                    <option value="builder">Builder</option>
                    <option value="prototype">Prototype</option>
                    <option value="singleton">Singleton</option>
                </select>

                <div class="description" id="description-factory-method">
                    <h5>Factory Method</h5>
                    <p>Proporciona una interfaz para la creación de objetos en una superclase, mientras permite a las subclases alterar el tipo de objetos que se crearán.</p>
                    <a href="./creacionales-FacrotyMethod.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-abstract-factory">
                    <h5>Abstract Factory</h5>
                    <p>Permite producir familias de objetos relacionados sin especificar sus clases concretas.</p>
                    <a href="./creacionales-AbstractFalctory.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-builder">
                    <h5>Builder</h5>
                    <p>Permite construir objetos complejos paso a paso. Este patrón nos permite producir distintos tipos y representaciones de un objeto empleando el mismo código de construcción.</p>
                    <a href="./creacionales-Builder.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-prototype">
                    <h5>Prototype</h5>
                    <p>Permite copiar objetos existentes sin que el código dependa de sus clases.</p>
                    <a href="./creacionales-Prototype.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-singleton">
                    <h5>Singleton</h5>
                    <p>Permite asegurarnos de que una clase tenga una única instancia, a la vez que proporciona un punto de acceso global a dicha instancia.</p>
                    <a href="./creacionales-Singleton.php" class="btn btn-custom">Ver más</a>
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

            const selectedOption = document.querySelector('select').value;
            const selectedDescription = document.getElementById('description-' + selectedOption);
            if (selectedDescription) {
                selectedDescription.style.display = 'block';
            }
        }
    </script>
</body>
</html>
