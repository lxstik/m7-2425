<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen del Patrón Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos para el resumen */
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
        <h1 class="title-summary">Builder</h1>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>Builder es un patrón de diseño creacional que nos permite construir objetos complejos paso a paso. El patrón nos permite producir distintos tipos y representaciones de un objeto empleando el mismo código de construcción.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Imagina un objeto complejo que requiere una inicialización laboriosa, paso a paso, de muchos campos y objetos anidados. Normalmente, este código de inicialización está sepultado dentro de un monstruoso constructor con una gran cantidad de parámetros. O, peor aún: disperso por todo el código cliente.</p>
            <p>Una gran cantidad de subclases genera otro problema. Crear una subclase por cada configuración posible de un objeto puede complicar demasiado el programa.</p>
            <p>Por ejemplo, pensemos en cómo crear un objeto Casa. Para construir una casa sencilla, debemos construir cuatro paredes y un piso, así como instalar una puerta, colocar un par de ventanas y ponerle un tejado. Pero ¿qué pasa si quieres una casa más grande y luminosa, con un jardín y otros extras (como sistema de calefacción, instalación de fontanería y cableado eléctrico)?</p>
            <p>La solución más sencilla es extender la clase base Casa y crear un grupo de subclases que cubran todas las combinaciones posibles de los parámetros. Pero, en cualquier caso, acabarás con una cantidad considerable de subclases. Cualquier parámetro nuevo, como el estilo del porche, exigirá que incrementes esta jerarquía aún más.</p>
            <p>Existen otras soluciones, como un constructor telescópico, pero este puede volverse muy complejo y difícil de gestionar.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Builder sugiere que saques el código de construcción del objeto de su propia clase y lo coloques dentro de objetos independientes llamados constructores.</p>
        </div>

        <div class="section-summary">
            <h5>Aplicación del patrón Builder</h5>
            <p>El patrón Builder te permite construir objetos complejos paso a paso, organizando la construcción en una serie de pasos (por ejemplo, construirParedes, construirPuerta, etc.). Estos pasos pueden invocarse según sea necesario, sin tener que invocar todos los pasos. Además, diferentes constructores pueden implementar los mismos pasos de forma diferente para crear distintas representaciones del producto.</p>
            <p>Un ejemplo sería la construcción de una casa que varíe en materiales: madera, piedra, oro, etc. Al invocar la misma serie de pasos, podemos obtener distintos tipos de casas sin modificar el código cliente.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Interfaz Constructora:</strong> Declara los métodos para los pasos de construcción comunes.</li>
                <li><strong>Constructores Concretos:</strong> Implementan la interfaz constructora y proporcionan las implementaciones específicas de los pasos.</li>
                <li><strong>Productos:</strong> Son los objetos que resultan de la construcción, que no necesariamente pertenecen a la misma jerarquía de clases.</li>
                <li><strong>Clase Directora:</strong> Define el orden en que se deben ejecutar los pasos de construcción, gestionando la creación de productos más complejos.</li>
                <li><strong>Cliente:</strong> Asocia un objeto constructor con la clase directora y comienza el proceso de construcción.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Ejemplo de Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// Ejemplo de clase automovil y manual
class Car {
    // Características del automóvil
}

class Manual {
    // Instrucciones del automóvil
}

interface Builder {
    method reset();
    method setSeats(...);
    method setEngine(...);
    method setTripComputer(...);
    method setGPS(...);
}

class CarBuilder implements Builder {
    private field car:Car;
    constructor CarBuilder() {
        this.reset();
    }
    method reset() {
        this.car = new Car();
    }
    method setSeats(...) { /* Establece los asientos */ }
    method setEngine(...) { /* Establece el motor */ }
    method setTripComputer(...) { /* Instala la computadora */ }
    method setGPS(...) { /* Instala GPS */ }
    method getProduct():Car {
        product = this.car;
        this.reset();
        return product;
    }
}

class CarManualBuilder implements Builder {
    private field manual:Manual;
    constructor CarManualBuilder() {
        this.reset();
    }
    method reset() {
        this.manual = new Manual();
    }
    method setSeats(...) { /* Documenta los asientos */ }
    method setEngine(...) { /* Instrucciones motor */ }
    method setTripComputer(...) { /* Instrucciones computadora */ }
    method setGPS(...) { /* Instrucciones GPS */ }
    method getProduct():Manual {
        return this.manual;
    }
}

class Director {
    method constructSportsCar(builder: Builder) {
        builder.reset();
        builder.setSeats(2);
        builder.setEngine(new SportEngine());
        builder.setTripComputer(true);
        builder.setGPS(true);
    }
}

class Application {
    method makeCar() {
        director = new Director();
        builder = new CarBuilder();
        director.constructSportsCar(builder);
        car = builder.getProduct();
        builder = new CarManualBuilder();
        director.constructSportsCar(builder);
        manual = builder.getProduct();
    }
}
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Utiliza el patrón Builder para evitar un “constructor telescópico”.</li>
                <li>Cuando necesites construir distintas representaciones de un producto (por ejemplo, casas de piedra y madera).</li>
                <li>Cuando la construcción de un producto requiera pasos similares pero con variaciones.</li>
                <li>Para construir objetos complejos o árboles con el patrón Composite.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Permite construir objetos paso a paso, aplazar pasos o ejecutarlos de forma recursiva. Reutiliza el mismo código de construcción para distintas representaciones de productos.</li>
                <li><strong>Contras:</strong> Aumenta la complejidad del código al requerir varias clases nuevas.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li>Builder se puede usar junto con Factory Method, Abstract Factory o Prototype para crear productos más complejos.</li>
                <li>Es útil en la creación de productos con estructuras recursivas, como árboles Composite.</li>
                <li>Se puede combinar con Bridge para separar la abstracción y la implementación del proceso de construcción.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>