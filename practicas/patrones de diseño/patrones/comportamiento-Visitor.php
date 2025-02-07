<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Visitor</title>
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
        <h5 class="title-summary">Patrón Visitor</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón **Visitor** es un patrón de diseño de comportamiento que permite separar algoritmos de los objetos sobre los que operan, facilitando la adición de nuevas operaciones sin modificar las clases de los objetos.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Imagina un sistema con clases de nodos representados en un grafo (por ejemplo, ciudades, industrias, etc.). Si quieres agregar nuevas funcionalidades como la exportación a XML o el cálculo de impuestos, modificar las clases existentes puede ser riesgoso y difícil de mantener. Cada vez que agregas una nueva operación, corres el riesgo de romper algo en el sistema.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Visitor propone crear un objeto visitante que implemente las nuevas operaciones. Este visitante recorre las instancias de las clases y realiza la operación sobre ellas, sin necesidad de modificar las clases de los nodos. De esta forma, puedes añadir nuevas funcionalidades sin alterar el código existente.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Una analogía en el mundo real sería el proceso de inspección de vehículos. Un inspector puede aplicar diferentes pruebas (como la prueba de emisiones o la revisión de frenos) sin tener que cambiar la estructura de un coche. El coche (objeto) sigue siendo el mismo, pero se le aplican diferentes pruebas (operaciones) a través de un inspector (visitor).</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Elemento:</strong> El objeto que será visitado. Define un método `accept` que recibe un visitante.</li>
                <li><strong>Visitante:</strong> Define las operaciones que se realizarán sobre los elementos. Debe implementar un método para cada tipo de elemento concreto.</li>
                <li><strong>Elementos concretos:</strong> Implementan el método `accept`, que llama al método correspondiente del visitante.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// Visitante que realiza diferentes operaciones sobre los elementos
class Visitor {
    method visit(ElementA element) {
        // Realizar operación sobre ElementA
    }

    method visit(ElementB element) {
        // Realizar operación sobre ElementB
    }
}

// Elemento base que puede ser visitado por un visitante
class Element {
    method accept(visitor: Visitor) {
        visitor.visit(this)
    }
}

// Elementos concretos con tipos específicos
class ElementA extends Element {
    method accept(visitor: Visitor) {
        visitor.visit(this)
    }
}

class ElementB extends Element {
    method accept(visitor: Visitor) {
        visitor.visit(this)
    }
}

// Implementación del visitante
class ConcreteVisitor extends Visitor {
    method visit(ElementA element) {
        // Operación específica para ElementA
    }

    method visit(ElementB element) {
        // Operación específica para ElementB
    }
}
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando se necesita realizar operaciones sobre una estructura compleja de objetos y no deseas modificar las clases de esos objetos.</li>
                <li>Cuando se quiere mantener el código abierto para la extensión pero cerrado para la modificación (principio de abierto/cerrado).</li>
                <li>Cuando la estructura de clases de los objetos es estable, pero las operaciones que se realizan sobre ellas pueden cambiar o crecer con el tiempo.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Define una interfaz **Visitor** con un método `visit` para cada tipo de objeto que se va a visitar.</li>
                <li>Crea una clase base **Elemento** que tenga un método `accept` que reciba un visitante y le pase a la visita correspondiente.</li>
                <li>Los **Elementos concretos** deben implementar el método `accept` y llamar al método `visit` adecuado del visitante.</li>
                <li>Los **Visitantes** concretos implementan las operaciones sobre los elementos sin modificarlos directamente.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Permite añadir nuevas operaciones sin modificar las clases existentes. Mejora la flexibilidad y el mantenimiento del código.</li>
                <li><strong>Contras:</strong> Puede ser complejo de implementar si hay muchas clases de elementos y visitantes. Si se agregan o eliminan tipos de elementos, todos los visitantes deben ser actualizados.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Strategy:</strong> Ambos patrones permiten cambiar el comportamiento de un objeto sin modificar su clase. Sin embargo, **Visitor** se enfoca en añadir nuevas operaciones, mientras que **Strategy** se enfoca en cambiar comportamientos específicos.</li>
                <li><strong>Composite:</strong> **Composite** permite tratar objetos individuales y compuestos de la misma forma, mientras que **Visitor** se enfoca en realizar operaciones sobre la estructura de objetos.</li>
                <li><strong>Decorator:</strong> Mientras que **Decorator** añade funcionalidades adicionales a un objeto sin alterar su estructura, **Visitor** agrega operaciones sin modificar los objetos visitados.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>