<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Strategy</title>
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
        <h5 class="title-summary">Patrón Strategy</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón **Strategy** es un patrón de diseño de comportamiento que permite definir una familia de algoritmos, encapsularlos en clases separadas y hacer que sus objetos sean intercambiables dinámicamente.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Imagina que desarrollas una aplicación de navegación que ayuda a los usuarios a planificar rutas. Inicialmente, solo se generaban rutas en coche, pero más tarde se añadieron rutas a pie y en transporte público.</p>
            <p>El código de la aplicación creció de forma descontrolada, volviéndose difícil de mantener. Cada nuevo algoritmo aumentaba la complejidad y afectaba otras partes del código, dificultando el trabajo en equipo.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Strategy propone extraer los algoritmos de enrutamiento y colocarlos en clases separadas, llamadas estrategias. La clase principal de navegación (contexto) delega el cálculo de rutas a la estrategia seleccionada.</p>
            <p>Esto permite agregar nuevas estrategias sin modificar el código existente, mejorando la flexibilidad y mantenibilidad del sistema.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Si necesitas llegar al aeropuerto, puedes elegir entre distintas estrategias de transporte: taxi, autobús o bicicleta. Dependiendo de tus necesidades (tiempo, costo), seleccionas la mejor opción.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Contexto:</strong> Mantiene una referencia a una estrategia y la utiliza para realizar una tarea.</li>
                <li><strong>Interfaz de Estrategia:</strong> Declara un método común para todas las estrategias.</li>
                <li><strong>Estrategias Concretas:</strong> Implementan diferentes variantes del algoritmo.</li>
                <li><strong>Cliente:</strong> Configura el contexto con una estrategia específica.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// Interfaz común para todas las estrategias
interface Strategy is
    method execute(a, b)

// Estrategias concretas con diferentes implementaciones
class ConcreteStrategyAdd implements Strategy is
    method execute(a, b) is
        return a + b

class ConcreteStrategySubtract implements Strategy is
    method execute(a, b) is
        return a - b

class ConcreteStrategyMultiply implements Strategy is
    method execute(a, b) is
        return a * b

// Clase Contexto que usa una estrategia específica
class Context is
    private strategy: Strategy

    method setStrategy(Strategy strategy) is
        this.strategy = strategy

    method executeStrategy(int a, int b) is
        return strategy.execute(a, b)

// Código cliente que selecciona y usa una estrategia
class ExampleApplication is
    method main() is
        Create context object.

        Read first number.
        Read last number.
        Read the desired action from user input.

        if (action == addition) then
            context.setStrategy(new ConcreteStrategyAdd())

        if (action == subtraction) then
            context.setStrategy(new ConcreteStrategySubtract())

        if (action == multiplication) then
            context.setStrategy(new ConcreteStrategyMultiply())

        result = context.executeStrategy(First number, Second number)

        Print result.
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando necesitas cambiar dinámicamente el comportamiento de un objeto en tiempo de ejecución.</li>
                <li>Si tienes muchas clases similares que solo se diferencian en su comportamiento.</li>
                <li>Cuando quieres aislar la lógica de negocio de los detalles de implementación de los algoritmos.</li>
                <li>Cuando un gran condicional gestiona múltiples variantes de un algoritmo.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Identifica los algoritmos que pueden cambiar y extrae cada uno en su propia clase.</li>
                <li>Define una interfaz común para todas las estrategias.</li>
                <li>Crea una clase de contexto que use la estrategia seleccionada.</li>
                <li>Permite que los clientes configuren la estrategia del contexto dinámicamente.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Permite intercambiar algoritmos en tiempo de ejecución.</li>
                <li><strong>Pros:</strong> Aísla los detalles de implementación del código que los usa.</li>
                <li><strong>Pros:</strong> Reduce la duplicación de código al eliminar estructuras condicionales grandes.</li>
                <li><strong>Contras:</strong> Puede aumentar la complejidad si hay pocas estrategias y no cambian con frecuencia.</li>
                <li><strong>Contras:</strong> Los clientes deben conocer las diferencias entre estrategias para elegir la correcta.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>State:</strong> Similar a Strategy, pero las estrategias pueden cambiarse automáticamente según el estado del contexto.</li>
                <li><strong>Command:</strong> Permite parametrizar un objeto con una acción, pero tiene un propósito distinto al de Strategy.</li>
                <li><strong>Template Method:</strong> Usa herencia para definir partes de un algoritmo, mientras que Strategy usa composición.</li>
                <li><strong>Decorator:</strong> Cambia la "piel" de un objeto, mientras que Strategy cambia su "interior".</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>