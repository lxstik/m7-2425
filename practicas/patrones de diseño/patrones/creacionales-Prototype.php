<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Prototype</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-summary {
            margin-top: 30px;
            font-family: Arial, sans-serif;
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
        <h1 class="title-summary">Patrón Prototype</h1>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón Prototype permite copiar objetos existentes sin depender de sus clases. Este patrón delega el proceso de clonación a los propios objetos, lo que facilita la creación de copias sin necesidad de conocer la clase concreta del objeto.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Cuando necesitas crear una copia exacta de un objeto, lo más común es crear un nuevo objeto de la misma clase. Sin embargo, este enfoque depende de las clases concretas y puede ser complicado cuando los campos del objeto son privados o cuando no conocemos la clase exacta, solo su interfaz.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Prototype resuelve este problema al delegar la clonación a los propios objetos, proporcionando una interfaz común para clonar objetos. Cada objeto define su propio método <strong>clonar()</strong>, lo que permite la creación de copias sin depender de su clase concreta.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Interfaz Prototype:</strong> Declara el método de clonación.</li>
                <li><strong>Prototipo Concreto:</strong> Implementa el método de clonación y realiza la copia de los campos del objeto original.</li>
                <li><strong>Cliente:</strong> Usa el prototipo para crear copias sin necesidad de conocer la clase concreta.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Ejemplo</h5>
            <div class="code-example">
                <pre>
// Prototipo base.
abstract class Shape {
    field X, Y, color;

    constructor Shape(source) {
        this.X = source.X;
        this.Y = source.Y;
        this.color = source.color;
    }

    abstract method clone(): Shape;
}

class Rectangle extends Shape {
    field width, height;

    constructor Rectangle(source) {
        super(source);
        this.width = source.width;
        this.height = source.height;
    }

    method clone() {
        return new Rectangle(this);
    }
}

class Circle extends Shape {
    field radius;

    constructor Circle(source) {
        super(source);
        this.radius = source.radius;
    }

    method clone() {
        return new Circle(this);
    }
}

// Cliente
class Application {
    field shapes;

    constructor Application() {
        Circle circle = new Circle();
        circle.X = 10;
        circle.Y = 10;
        circle.radius = 20;
        shapes.add(circle);

        Circle anotherCircle = circle.clone();
        shapes.add(anotherCircle);
    }

    method businessLogic() {
        Array shapesCopy = [];
        foreach (s in shapes) {
            shapesCopy.add(s.clone());
        }
    }
}
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando tu código necesita clonar objetos sin depender de sus clases concretas.</li>
                <li>Cuando quieres reducir la cantidad de subclases mediante el uso de prototipos configurados.</li>
                <li>Cuando trabajas con objetos pasados a través de interfaces y no conoces su tipo exacto.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Permite clonar objetos sin depender de su clase concreta, reduce la necesidad de subclases y facilita la creación de objetos complejos.</li>
                <li><strong>Contras:</strong> La clonación de objetos con referencias circulares puede ser complicada.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Factory Method:</strong> Prototype puede complementar Factory Method al permitir la clonación de objetos en lugar de crear nuevas instancias.</li>
                <li><strong>Abstract Factory:</strong> Ambos patrones crean objetos, pero Prototype se enfoca en copiar objetos ya existentes.</li>
                <li><strong>Composite y Decorator:</strong> Prototype puede ser útil al clonar estructuras complejas en lugar de reconstruirlas desde cero.</li>
                <li><strong>Builder:</strong> Prototype puede ser una alternativa más flexible al patrón Builder en algunos casos.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
