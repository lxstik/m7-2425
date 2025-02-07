<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Observer</title>
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
        <h5 class="title-summary">Patrón Observer</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón **Observer** es un patrón de diseño de comportamiento que te permite definir un mecanismo de suscripción para notificar a varios objetos sobre cualquier evento que le suceda al objeto que están observando, sin necesidad de que esos objetos estén directamente acoplados entre sí.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Imagina que tienes dos tipos de objetos: un objeto **Cliente** y un objeto **Tienda**. El cliente está interesado en una marca particular de producto (por ejemplo, un nuevo modelo de iPhone). En lugar de ir a la tienda a diario para ver si el producto está disponible, el cliente prefiere recibir notificaciones sobre su disponibilidad. La tienda, por su parte, podría enviar correos a todos los clientes, pero esto sería ineficiente si muchos clientes no están interesados en ese producto en particular.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Observer sugiere crear un mecanismo de suscripción en el objeto **notificador** (en este caso, la tienda), permitiendo que los objetos suscriptores (clientes) se registren para recibir notificaciones cuando haya actualizaciones o eventos que les interesen. Así, la tienda solo notificará a los clientes interesados sin enviar correos masivos.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Un ejemplo sencillo de la vida real es el sistema de suscripción a revistas o periódicos. Si te suscribes, ya no tienes que ir a la tienda a buscar el último número, sino que el notificador (revista o periódico) te envía los nuevos números directamente a tu buzón. Los suscriptores se pueden dar de baja o cambiar de revista en cualquier momento.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Notificador (Publisher):</strong> El objeto que genera eventos y mantiene una lista de suscriptores a los que notificará sobre estos eventos.</li>
                <li><strong>Suscriptor (Subscriber):</strong> El objeto que se suscribe al notificador para recibir notificaciones sobre ciertos eventos.</li>
                <li><strong>Interfaz de Suscripción:</strong> El notificador y suscriptores se comunican a través de una interfaz común que permite la actualización de los suscriptores cuando ocurre un evento.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// Clase base de EventManager para manejar suscripciones y notificaciones
class EventManager is
    private field listeners: hash map of event types and listeners

    method subscribe(eventType, listener) is
        listeners.add(eventType, listener)

    method unsubscribe(eventType, listener) is
        listeners.remove(eventType, listener)

    method notify(eventType, data) is
        foreach (listener in listeners.of(eventType)) do
            listener.update(data)

// Notificador concreto que notifica a los suscriptores sobre eventos
class Editor is
    public field events: EventManager
    private field file: File

    constructor Editor() is
        events = new EventManager()

    method openFile(path) is
        this.file = new File(path)
        events.notify("open", file.name)

    method saveFile() is
        file.write()
        events.notify("save", file.name)

// Interfaz para los suscriptores
interface EventListener is
    method update(filename)

// Suscriptores concretos que responden a las actualizaciones
class LoggingListener implements EventListener is
    private field log: File
    private field message: string

    constructor LoggingListener(log_filename, message) is
        this.log = new File(log_filename)
        this.message = message

    method update(filename) is
        log.write(replace('%s',filename,message))

class EmailAlertsListener implements EventListener is
    private field email: string
    private field message: string

    constructor EmailAlertsListener(email, message) is
        this.email = email
        this.message = message

    method update(filename) is
        system.email(email, replace('%s',filename,message))
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando un objeto (el notificador) cambia su estado y se requiere que varios otros objetos (suscriptores) se actualicen, pero no se conoce de antemano cuántos suscriptores habrá.</li>
                <li>Cuando los suscriptores deben poder registrarse o cancelarse dinámicamente durante el tiempo de ejecución.</li>
                <li>Cuando se desea evitar el acoplamiento directo entre los objetos que interactúan, permitiendo que se comuniquen a través de eventos.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Crea una interfaz **EventListener** que declare el método `update()` que todos los suscriptores deben implementar.</li>
                <li>Define un **EventManager** que maneje las suscripciones, desuscripciones y notificaciones de eventos.</li>
                <li>Implementa un **notificador** que mantenga la lista de suscriptores y notifique a todos cuando ocurra un evento relevante.</li>
                <li>Los **suscriptores** deben implementar la interfaz **EventListener** y reaccionar a las actualizaciones que les envíe el notificador.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Alta flexibilidad y bajo acoplamiento entre los objetos. Nuevos suscriptores pueden añadirse sin modificar la clase del notificador.</li>
                <li><strong>Contras:</strong> Los suscriptores pueden ser notificados en un orden no determinado. Puede haber una sobrecarga si el número de suscriptores es muy grande.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Chain of Responsibility:</strong> Ambos patrones permiten la comunicación entre objetos, pero **Chain of Responsibility** pasa una solicitud a través de una cadena de objetos, mientras que **Observer** mantiene una lista de suscriptores que reciben notificaciones de eventos.</li>
                <li><strong>Command:</strong> En **Command**, el emisor de una solicitud está acoplado a su receptor, mientras que en **Observer**, los suscriptores pueden registrarse dinámicamente para recibir notificaciones sin acoplarse al notificador.</li>
                <li><strong>Mediator:</strong> **Mediator** centraliza la comunicación entre objetos, mientras que en **Observer** los objetos se comunican directamente con los suscriptores.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
