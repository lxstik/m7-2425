<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Command</title>
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
        <h5 class="title-summary">Patrón Command</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón Command convierte una solicitud en un objeto autónomo, lo que permite parametrizar los objetos con solicitudes, retrasar la ejecución de una solicitud y manejar las solicitudes de forma más flexible.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Supón que tienes una interfaz de usuario con múltiples botones y cada botón realiza una acción diferente. En lugar de tener que escribir el código de cada acción en cada parte del sistema, quieres encapsularlas de manera que sea más fácil manejarlas y extenderlas.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Command te permite encapsular las solicitudes de los usuarios como objetos, permitiendo pasar estas solicitudes como parámetros, almacenarlas, deshacerlas o ejecutar múltiples acciones en secuencia de manera flexible.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Es como si tuvieras un asistente personal que, cuando le das una orden, esta se convierte en una tarea que él puede ejecutar más tarde, o incluso delegar a otra persona si es necesario.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Comando:</strong> Define una interfaz para ejecutar una operación.</li>
                <li><strong>Comando Concreto:</strong> Implementa la interfaz de comando y define la acción específica a ejecutar.</li>
                <li><strong>Invocador:</strong> Pide al comando ejecutar una solicitud.</li>
                <li><strong>Receptor:</strong> Realiza la acción asociada con el comando.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// Interfaz de comando
interface Command {
    method execute()
}

// Comando concreto que realiza una acción específica
class LightOnCommand implements Command {
    private field light: Light

    constructor LightOnCommand(light: Light) {
        this.light = light
    }

    method execute() {
        light.turnOn()
    }
}

class LightOffCommand implements Command {
    private field light: Light

    constructor LightOffCommand(light: Light) {
        this.light = light
    }

    method execute() {
        light.turnOff()
    }
}

// Receptor que conoce cómo ejecutar las acciones reales
class Light {
    method turnOn() {
        print("La luz está encendida.")
    }

    method turnOff() {
        print("La luz está apagada.")
    }
}

// Invocador que solicita al comando ejecutar la acción
class RemoteControl {
    private field command: Command

    method setCommand(command: Command) {
        this.command = command
    }

    method pressButton() {
        command.execute()
    }
}

// Cliente que configura los comandos
class Application {
    method init() {
        light = new Light()
        lightOn = new LightOnCommand(light)
        lightOff = new LightOffCommand(light)

        remote = new RemoteControl()
        remote.setCommand(lightOn)
        remote.pressButton()  // La luz está encendida.
        remote.setCommand(lightOff)
        remote.pressButton()  // La luz está apagada.
    }
}
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando necesitas invocar operaciones en diferentes objetos de manera desacoplada.</li>
                <li>Cuando deseas permitir la desactivación, ejecución o ejecución repetida de comandos.</li>
                <li>Cuando el sistema debe manejar un conjunto de operaciones pero no quieres que el invocador dependa de los detalles de ejecución de esas operaciones.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Crea una interfaz común para los comandos que defina el método `execute`.</li>
                <li>Crea los comandos concretos que implementan la interfaz y realizan las acciones específicas.</li>
                <li>Configura un invocador que reciba y ejecute los comandos, permitiendo cambiar dinámicamente las acciones a realizar.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Desacopla los invocadores de las acciones específicas, permite deshacer acciones, y es fácil agregar nuevas acciones sin modificar el invocador.</li>
                <li><strong>Contras:</strong> El sistema puede volverse complejo cuando hay muchos comandos, especialmente si no se organiza adecuadamente.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Chain of Responsibility:</strong> Ambos patrones permiten que una solicitud sea manejada por varios objetos, pero en Command, el objeto que recibe la solicitud es explícitamente invocado, mientras que en Chain of Responsibility se pasa a lo largo de una cadena de objetos.</li>
                <li><strong>Strategy:</strong> Ambos patrones permiten cambiar el comportamiento de un objeto en tiempo de ejecución. Sin embargo, Strategy enfoca en cambiar el algoritmo, mientras que Command se enfoca en encapsular la solicitud como objeto.</li>
                <li><strong>Observer:</strong> Ambos patrones pueden involucrar la ejecución de acciones en respuesta a eventos, pero Command encapsula una acción, mientras que Observer se enfoca en notificar a los observadores.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
