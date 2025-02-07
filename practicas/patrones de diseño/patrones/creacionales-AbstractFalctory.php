<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Abstract Factory</title>
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
        <h1 class="title-summary">Patrón Abstract Factory</h1>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón Abstract Factory permite producir familias de objetos relacionados sin especificar sus clases concretas. Es útil cuando el sistema debe ser independiente de cómo se crean, componen y representan los objetos.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Si estás trabajando con una tienda de muebles y necesitas crear productos como <b>Sillas</b>, <b>Sofás</b> y <b>Mesillas</b>, y quieres que estos productos tengan distintas variantes (moderna, victoriana, etc.), puedes enfrentar dificultades para gestionar estas variantes si el código cliente depende de clases concretas.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>La solución es usar el patrón Abstract Factory, donde se definen interfaces para las familias de productos. Las fábricas concretas implementan estas interfaces y permiten que el código cliente trabaje con las fábricas sin preocuparse de los detalles de implementación.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Producto abstracto:</strong> Define una interfaz para los productos que se pueden crear.</li>
                <li><strong>Producto concreto:</strong> Implementa las interfaces de los productos definidos en la fábrica abstracta.</li>
                <li><strong>Fábrica abstracta:</strong> Declara los métodos de creación de productos abstractos.</li>
                <li><strong>Fábrica concreta:</strong> Implementa los métodos de creación de productos específicos, según la variante.</li>
                <li><strong>Cliente:</strong> Usa las fábricas abstractas para crear productos, sin depender de clases concretas.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Ejemplo</h5>
            <div class="code-example">
                <pre>
interface GUIFactory {
    function createButton();
    function createCheckbox();
}

class WinFactory implements GUIFactory {
    function createButton() { return new WinButton(); }
    function createCheckbox() { return new WinCheckbox(); }
}

interface Button {
    function paint();
}

class WinButton implements Button {
    function paint() { echo "Botón estilo Windows"; }
}

interface Checkbox {
    function paint();
}

class WinCheckbox implements Checkbox {
    function paint() { echo "Checkbox estilo Windows"; }
}

class Application {
    private $factory;
    
    function __construct(GUIFactory $factory) {
        $this->factory = $factory;
    }
    
    function createUI() {
        $button = $this->factory->createButton();
        $checkbox = $this->factory->createCheckbox();
        
        $button->paint();
        $checkbox->paint();
    }
}
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando tu código necesita trabajar con múltiples variantes de productos sin saber sus clases concretas.</li>
                <li>Cuando desees asegurar la compatibilidad entre productos creados por diferentes fábricas.</li>
                <li>Cuando quieras crear sistemas fáciles de extender con nuevos tipos de productos sin modificar el código cliente.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Desacopla la creación de productos, facilita la extensión de productos sin afectar el código cliente.</li>
                <li><strong>Contras:</strong> Aumenta la complejidad del sistema debido a la cantidad de interfaces y clases.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Factory Method:</strong> Ambos patrones encapsulan la creación de objetos, pero Abstract Factory se enfoca en familias de objetos.</li>
                <li><strong>Builder:</strong> Abstract Factory crea productos de una familia, mientras que Builder construye productos complejos paso a paso.</li>
                <li><strong>Prototype:</strong> Utiliza un prototipo de productos que puede ser modificado, mientras que Abstract Factory asegura la compatibilidad entre productos.</li>
                <li><strong>Facade:</strong> Abstract Factory puede ser usado en conjunto con Facade para ocultar la complejidad de la creación de productos del cliente.</li>
                <li><strong>Bridge:</strong> Ambos patrones ayudan a desacoplar abstracciones y implementaciones, pero en el caso de Abstract Factory, se enfoca en la creación de productos específicos.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
