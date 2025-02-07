<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Mediator</title>
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
        <h5 class="title-summary">Patrón Mediator</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>Mediator es un patrón de diseño de comportamiento que te permite reducir las dependencias caóticas entre objetos. El patrón restringe las comunicaciones directas entre los objetos, forzándolos a colaborar únicamente a través de un objeto mediador.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Las relaciones entre los elementos de la interfaz de usuario pueden volverse caóticas cuando la aplicación crece. Los elementos pueden tener muchas relaciones entre ellos, lo que hace que el código sea difícil de mantener y reutilizar.</p>
            <p>Por ejemplo, en un formulario, si varios campos dependen unos de otros (por ejemplo, un campo de texto que solo aparece si se marca una casilla), se generan dependencias mutuas que complican la reutilización de estos componentes.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Mediator sugiere que los componentes de una interfaz no se comuniquen directamente entre sí, sino que lo hagan a través de un objeto mediador. De este modo, los componentes dependen únicamente del mediador y no de los demás componentes, lo que facilita la reutilización y el mantenimiento del código.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Es como la torre de control del tráfico aéreo: los aviones no se comunican directamente entre sí, sino que lo hacen a través de la torre de control, que regula el tráfico y garantiza que los aviones aterrizan de manera ordenada y segura.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Interfaz Mediadora:</strong> Declara un método de notificación que los componentes pueden usar para enviar mensajes al mediador.</li>
                <li><strong>Mediadores Concretos:</strong> Implementan la lógica específica de los componentes que gestionan, redirigiendo las comunicaciones entre ellos.</li>
                <li><strong>Componentes:</strong> Los objetos que interactúan a través del mediador, enviando notificaciones sin conocerse entre sí.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// La interfaz mediadora declara un método utilizado por los
// componentes para notificar al mediador sobre varios eventos.
interface Mediator is
    method notify(sender: Component, event: string)

// La clase concreta mediadora. Gestiona las relaciones entre los componentes.
class AuthenticationDialog implements Mediator is
    private field loginButton, registrationButton: Button
    private field loginFields, registrationFields: Textbox

    method notify(sender, event) is
        if (sender == loginButton && event == "click")
            // Procesa la lógica de inicio de sesión
        if (sender == registrationButton && event == "click")
            // Procesa la lógica de registro

// Los componentes se comunican con el mediador sin conocer a otros componentes
class Button extends Component is
    method click() is
        dialog.notify(this, "click")

class Textbox extends Component is
    method keypress() is
        dialog.notify(this, "keypress")
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando las clases están fuertemente acopladas y necesitas hacerlas más independientes.</li>
                <li>Cuando las relaciones entre los componentes son demasiado complejas y necesitas gestionarlas de forma centralizada.</li>
                <li>Cuando desees reutilizar componentes sin que dependan de otros específicos.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Identifica las clases que se beneficiarían de ser menos dependientes entre sí.</li>
                <li>Declara la interfaz mediadora con un método para recibir notificaciones de los componentes.</li>
                <li>Implementa el mediador que gestione las interacciones entre los componentes.</li>
                <li>Modifica los componentes para que se comuniquen solo con el mediador y no entre ellos directamente.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Mejora la mantenibilidad y reutilización del código. Reduce el acoplamiento entre componentes.</li>
                <li><strong>Contras:</strong> Puede hacer que el mediador se convierta en un objeto todopoderoso, lo que puede ser difícil de mantener si no se gestiona adecuadamente.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Observer:</strong> Ambos patrones manejan la comunicación entre objetos, pero Mediator centraliza el flujo de mensajes, mientras que Observer lo distribuye.</li>
                <li><strong>Command:</strong> Puedes combinar Mediator con Command para delegar las acciones a objetos comando que se gestionan desde el mediador.</li>
                <li><strong>Strategy:</strong> El patrón Mediator puede coordinar las diferentes estrategias aplicadas por los componentes.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
