<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Chain of Responsibility</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-summary {
            margin-top: 30px;
        }

        .title-summary {
            font-size: 1.5rem;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .section-summary {
            margin-bottom: 20px;
        }

        .section-summary h5 {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }

        .section-summary p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
        }

        .section-summary ul {
            font-size: 1rem;
            color: #555;
        }

        .section-summary ul li {
            margin-bottom: 10px;
        }

        .code-example {
            background-color: #f4f4f4;
            border-radius: 5px;
            padding: 10px;
            font-family: 'Courier New', Courier, monospace;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container-summary container">
        <h5 class="title-summary">Patrón Chain of Responsibility</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón Chain of Responsibility permite pasar una solicitud a lo largo de una cadena de manejadores. Cada manejador decide si procesa la solicitud o la pasa al siguiente de la cadena.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Supongamos que tienes un sistema de pedidos en línea y necesitas verificar varias cosas, como la autenticación del usuario y la validación de datos, pero no quieres que todo el código se vuelva complejo y difícil de gestionar.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>Con Chain of Responsibility, puedes organizar las verificaciones en diferentes manejadores, y cada uno decide si puede manejar la solicitud o si la pasa al siguiente manejador en la cadena.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Es como cuando llamas al soporte técnico. Primero hablas con un contestador automático, luego con un operador y, finalmente, con un ingeniero. Cada uno maneja la solicitud y si no puede, la pasa al siguiente nivel.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Interfaz Manejadora:</strong> Define un método para procesar solicitudes.</li>
                <li><strong>Manejadores Concretos:</strong> Implementan la lógica para procesar una solicitud específica.</li>
                <li><strong>Cliente:</strong> Puede componer la cadena de manejadores según sea necesario.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// Interfaz de manejo
interface Handler {
    method handleRequest(request)
}

// Manejador concreto que verifica la autenticación
class AuthenticationHandler implements Handler {
    method handleRequest(request) {
        if (request.isAuthenticated()) {
            nextHandler.handleRequest(request)
        } else {
            reject(request)
        }
    }
}

// Manejador concreto que valida los datos
class ValidationHandler implements Handler {
    method handleRequest(request) {
        if (request.isValid()) {
            nextHandler.handleRequest(request)
        } else {
            reject(request)
        }
    }
}

// Cliente que configura la cadena de manejadores
class RequestProcessor {
    private field handlerChain: Handler

    constructor RequestProcessor(handlerChain: Handler) {
        this.handlerChain = handlerChain
    }

    method process(request) {
        handlerChain.handleRequest(request)
    }
}

// La aplicación utiliza la cadena de responsabilidad
class Application {
    method init() {
        authHandler = new AuthenticationHandler()
        validationHandler = new ValidationHandler()
        authHandler.setNext(validationHandler)
        processor = new RequestProcessor(authHandler)
        processor.process(request)
    }
}
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando tienes una serie de verificaciones que se deben realizar de manera secuencial, pero no sabes de antemano el orden o las verificaciones que se van a hacer.</li>
                <li>Cuando quieres separar responsabilidades en diferentes clases y hacer que sean fáciles de extender.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Crea una interfaz manejadora que defina el método común para manejar solicitudes.</li>
                <li>Crea los manejadores concretos con la lógica específica para manejar las solicitudes.</li>
                <li>Configura la cadena de manejadores según sea necesario, pasando las solicitudes a través de ellos.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Hace el código más flexible y modular, permite agregar nuevos manejadores sin romper el código cliente.</li>
                <li><strong>Contras:</strong> Algunas solicitudes pueden no ser procesadas si no hay manejadores adecuados.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Command:</strong> Ambos patrones permiten mover solicitudes entre objetos, pero Chain of Responsibility pasa la solicitud a través de una cadena de manejadores.</li>
                <li><strong>Mediator:</strong> Mientras que el patrón Mediator centraliza la comunicación, Chain of Responsibility permite que los manejadores trabajen de manera independiente.</li>
                <li><strong>Observer:</strong> Ambos patrones permiten que objetos reaccionen a eventos, pero Chain of Responsibility pasa las solicitudes en lugar de reaccionar a cambios de estado.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
