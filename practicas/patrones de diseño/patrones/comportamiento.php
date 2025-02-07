<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones de Comportamiento</title>
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


        select:focus+.description {
            display: block;
        }
    </style>
</head>

<body>
    <div class="container text-center mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Patrones de Comportamiento</h1>
                <p class="lead">Selecciona un patrón de comportamiento para aprender más.</p>

                <select class="form-select" aria-label="Seleccione un patrón" onchange="showDescription()">
                    <option selected disabled>Selecciona un patrón</option>
                    <option value="chain">Chain of Responsibility</option>
                    <option value="command">Command</option>
                    <option value="iterator">Iterator</option>
                    <option value="mediator">Mediator</option>
                    <option value="memento">Memento</option>
                    <option value="observer">Observer</option>
                    <option value="state">State</option>
                    <option value="strategy">Strategy</option>
                    <option value="template">Template Method</option>
                    <option value="visitor">Visitor</option>
                </select>

                <div class="description" id="description-chain">
                    <h5>Chain of Responsibility</h5>
                    <p>Permite pasar solicitudes a lo largo de una cadena de manejadores. Cada manejador decide si la procesa o pasa al siguiente manejador.</p>
                    <a href="./comportamiento-Chain.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-command">
                    <h5>Command</h5>
                    <p>Convierte una solicitud en un objeto independiente que contiene toda la información sobre la solicitud.</p>
                    <a href="./comportamiento-Command.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-iterator">
                    <h5>Iterator</h5>
                    <p>Permite recorrer elementos de una colección sin exponer su representación subyacente.</p>
                    <a href="./comportamiento-Iterator.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-mediator">
                    <h5>Mediator</h5>
                    <p>Permite reducir las dependencias caóticas entre objetos, forzando la colaboración solo a través de un objeto mediador.</p>
                    <a href="./comportamiento-Mediator.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-memento">
                    <h5>Memento</h5>
                    <p>Permite guardar y restaurar el estado previo de un objeto sin revelar los detalles de su implementación.</p>
                    <a href="./comportamiento-Memento.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-observer">
                    <h5>Observer</h5>
                    <p>Permite definir un mecanismo de suscripción para notificar a varios objetos sobre cualquier evento.</p>
                    <a href="./comportamiento-Observer.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-state">
                    <h5>State</h5>
                    <p>Permite a un objeto alterar su comportamiento cuando su estado interno cambia.</p>
                    <a href="./comportamiento-State.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-strategy">
                    <h5>Strategy</h5>
                    <p>Permite definir una familia de algoritmos, colocarlos en clases separadas y hacerlos intercambiables.</p>
                    <a href="./comportamiento-Strategy.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-template">
                    <h5>Template Method</h5>
                    <p>Define el esqueleto de un algoritmo en la superclase pero permite que las subclases sobrescriban pasos del algoritmo.</p>
                    <a href="./comportamiento-TemplateMethod.php" class="btn btn-custom">Ver más</a>
                </div>

                <div class="description" id="description-visitor">
                    <h5>Visitor</h5>
                    <p>Permite separar algoritmos de los objetos sobre los que operan.</p>
                    <a href="./comportamiento-Visitor.php" class="btn btn-custom">Ver más</a>
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