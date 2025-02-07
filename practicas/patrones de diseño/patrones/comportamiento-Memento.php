<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Memento</title>
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
        <h5 class="title-summary">Patrón Memento</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>Memento es un patrón de diseño de comportamiento que permite guardar y restaurar el estado de un objeto sin exponer su implementación interna. Este patrón es útil cuando se necesita la capacidad de deshacer acciones o restaurar el estado anterior de un objeto.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Cuando se tiene un objeto cuyo estado cambia a lo largo del tiempo, puede ser necesario restaurar el estado previo de ese objeto sin exponer su implementación interna. Sin embargo, el objeto no debe ser responsable de gestionar su propio estado guardado.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Memento propone utilizar tres componentes: el objeto originador, que mantiene el estado que puede cambiar; el memento, que guarda el estado del originador; y el cuidador de memento, que almacena los mementos y se encarga de restaurar el estado cuando sea necesario.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Es similar a un libro de notas en el que vas escribiendo. Si te equivocas, puedes hacer una copia de seguridad (memento) antes de escribir. Si algo va mal, puedes restaurar tu copia de seguridad y seguir desde allí sin perder todo tu progreso.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Originador:</strong> El objeto cuyo estado se guarda. Tiene un método para crear un memento con su estado actual.</li>
                <li><strong>Memento:</strong> Representa el estado del originador. Está diseñado para ser inmutable y no debe cambiar después de su creación.</li>
                <li><strong>Cuidador de Memento:</strong> Almacena los mementos y se encarga de restaurar el estado del originador cuando lo necesite.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// El Originador mantiene el estado actual y puede crear un memento.
class Originador {
    private state: string;

    // Establece el estado
    method setState(state: string) {
        this.state = state;
    }

    // Crea un memento que guarda el estado actual
    method createMemento(): Memento {
        return new Memento(this.state);
    }

    // Restaura el estado desde un memento
    method restoreMemento(memento: Memento) {
        this.state = memento.getState();
    }
}

// El Memento guarda el estado de un Originador
class Memento {
    private state: string;

    constructor(state: string) {
        this.state = state;
    }

    // Devuelve el estado guardado
    method getState(): string {
        return this.state;
    }
}

// El Cuidador de Memento guarda y recupera el estado del Originador
class Caretaker {
    private mementos: Array<Memento> = [];

    // Guarda un memento
    method saveMemento(memento: Memento) {
        this.mementos.push(memento);
    }

    // Recupera un memento
    method getMemento(index: number): Memento {
        return this.mementos[index];
    }
}
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando se necesita un mecanismo para deshacer cambios en un objeto sin exponer su implementación interna.</li>
                <li>Cuando se desea preservar el estado de un objeto de manera que se pueda restaurar más tarde.</li>
                <li>Cuando es necesario gestionar múltiples estados previos de un objeto sin que cada uno de esos estados dependa directamente del otro.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Crea un objeto originador que mantenga el estado que puede cambiar.</li>
                <li>Define un memento que almacene ese estado de forma inmutable.</li>
                <li>Implementa un cuidador de memento que almacene los mementos y pueda restaurar el estado anterior cuando sea necesario.</li>
                <li>Asegúrate de que el originador no exponga su estado, permitiendo su restauración únicamente a través del memento.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Facilita el deshacer acciones y mantener la integridad del estado de los objetos. Se puede acceder al estado anterior sin exponer la implementación interna.</li>
                <li><strong>Contras:</strong> Puede generar un gran número de objetos memento, lo que podría generar un uso elevado de memoria. Además, la gestión de mementos puede complicarse si no se organiza adecuadamente.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Command:</strong> Puede combinarse con el patrón Command para permitir deshacer o rehacer comandos ejecutados.</li>
                <li><strong>State:</strong> El patrón Memento puede ser útil cuando se desea guardar los diferentes estados en los que un objeto puede estar, mientras que el patrón State define cómo se comportan esos estados.</li>
                <li><strong>Observer:</strong> En ciertos casos, el patrón Memento puede usarse junto con Observer para notificar cambios en el estado de los objetos observados.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
