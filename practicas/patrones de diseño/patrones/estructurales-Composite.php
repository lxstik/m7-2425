<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Composite</title>
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
        <h1 class="title-summary">Patrón Composite</h1>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón Composite es un patrón de diseño estructural que permite tratar de manera uniforme objetos individuales y composiciones de objetos. Se utiliza para representar jerarquías de objetos, como árboles, donde los objetos pueden ser hojas (objetos simples) o nodos (composiciones de objetos).</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Cuando necesitas representar jerarquías de objetos y deseas tratar los objetos individuales y las composiciones de la misma manera. Sin el patrón Composite, es difícil tratar a un objeto compuesto de la misma forma que un objeto simple, lo que lleva a un código repetitivo y difícil de mantener.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Composite resuelve este problema permitiendo que los objetos individuales y los compuestos de objetos implementen una interfaz común. De esta forma, tanto las hojas como los nodos pueden ser tratados de manera uniforme.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Imagina una organización jerárquica dentro de una empresa, donde tienes a los empleados (hojas) y los directores (nodos) que supervisan a varios empleados. Ambos, empleados y directores, pueden ser tratados como miembros de la organización, aunque uno sea una persona y el otro un grupo de personas.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Componente:</strong> Define la interfaz común para objetos individuales y compuestos. Los métodos pueden ser abstractos o definidos según lo que compartan los objetos.</li>
                <li><strong>Hoja:</strong> Representa los objetos simples que no tienen componentes hijos. Implementan la interfaz de Componente y definen la funcionalidad de las hojas.</li>
                <li><strong>Composición (Composite):</strong> Representa los objetos compuestos, que tienen hijos y delegan las operaciones a los mismos. Implementa la interfaz de Componente y contiene una colección de hijos.</li>
                <li><strong>Cliente:</strong> Interactúa con los objetos de forma uniforme, sin preocuparse de si el objeto es una hoja o una composición.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// Componente: Define la interfaz común para todas las clases
interface Componente {
    method operar(): void;
}

// Hoja: Representa objetos simples
class Hoja implements Componente {
    method operar() {
        print("Operación en hoja");
    }
}

// Composición: Representa objetos compuestos
class Composicion implements Componente {
    protected componentes: List<Componente> = []

    method agregar(component: Componente) {
        this.componentes.add(component);
    }

    method operar() {
        for each componente in componentes {
            componente.operar();
        }
    }
}

// Uso del Composite:
hoja1 = new Hoja()
hoja2 = new Hoja()
composicion = new Composicion()

composicion.agregar(hoja1)
composicion.agregar(hoja2)

composicion.operar() // Llama a la operación en ambas hojas
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando tienes objetos que forman una jerarquía y deseas tratarlos de manera uniforme.</li>
                <li>Cuando necesitas tratar a los objetos compuestos y a los objetos simples de la misma manera sin tener que diferenciarlos.</li>
                <li>Cuando un sistema necesita manejar jerarquías y la composición de objetos es algo fundamental.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Define una interfaz común para los objetos de la jerarquía (hojas y composiciones).</li>
                <li>Implementa las hojas como clases que contienen operaciones simples.</li>
                <li>Implementa las composiciones como clases que contienen una colección de componentes y delegan las operaciones a ellos.</li>
                <li>En el cliente, usa la interfaz común para interactuar con los objetos, sin preocuparte si son hojas o composiciones.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Simplifica el código cliente al tratar objetos simples y compuestos de la misma manera, facilita la adición de nuevos tipos de objetos sin modificar el cliente.</li>
                <li><strong>Contras:</strong> Puede hacer que el diseño sea más complejo, especialmente cuando la jerarquía se vuelve muy profunda o cuando es difícil identificar los componentes.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Decorator:</strong> Ambos patrones permiten agregar funcionalidad a un objeto, pero Composite se enfoca en la creación de jerarquías y relaciones entre objetos, mientras que Decorator se enfoca en la adición de funcionalidades a un solo objeto.</li>
                <li><strong>Flyweight:</strong> Flyweight se usa para compartir objetos en lugar de crear nuevos, mientras que Composite crea una estructura jerárquica, a menudo con objetos únicos que no se comparten.</li>
                <li><strong>Iterator:</strong> Composite puede utilizar un iterador para recorrer la jerarquía de objetos y aplicar operaciones a cada componente, mientras que Iterator es un patrón para acceder secuencialmente a los elementos de una colección.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
