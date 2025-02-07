<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Template Method</title>
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
        <h5 class="title-summary">Patrón Template Method</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón **Template Method** es un patrón de diseño de comportamiento que define la estructura de un algoritmo en una clase base, permitiendo que las subclases sobrescriban ciertos pasos sin cambiar su estructura general.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Cuando varias clases comparten un algoritmo similar pero con ligeras diferencias, se genera duplicación de código. Template Method permite evitar esto al estructurar el algoritmo en pasos personalizables.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Template Method propone dividir un algoritmo en una serie de pasos dentro de un **método plantilla** en una clase base. Las subclases deben implementar los pasos abstractos y pueden sobrescribir los opcionales si es necesario.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Un ejemplo real es la construcción de viviendas en masa. Todas las casas siguen un mismo esquema base, pero los clientes pueden modificar ciertos aspectos como el color de las paredes o el tipo de ventanas.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Método plantilla:</strong> Define la estructura del algoritmo en la clase base.</li>
                <li><strong>Pasos abstractos:</strong> Deben ser implementados por las subclases.</li>
                <li><strong>Pasos opcionales:</strong> Tienen una implementación por defecto pero pueden ser sobrescritos.</li>
                <li><strong>Ganchos (Hooks):</strong> Métodos opcionales que permiten modificar el comportamiento sin alterar la estructura del algoritmo.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
class GameAI is
    method turn() is
        collectResources()
        buildStructures()
        buildUnits()
        attack()

    method collectResources() is
        foreach (s in this.builtStructures) do
            s.collect()

    abstract method buildStructures()
    abstract method buildUnits()
    
    method attack() is
        enemy = closestEnemy()
        if (enemy == null)
            sendScouts(map.center)
        else
            sendWarriors(enemy.position)

    abstract method sendScouts(position)
    abstract method sendWarriors(position)

class OrcsAI extends GameAI is
    method buildStructures() is
        // Construcción específica de los orcos

    method buildUnits() is
        // Creación de unidades específicas de los orcos

    method sendScouts(position) is
        // Exploradores orcos

    method sendWarriors(position) is
        // Guerreros orcos
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando tienes muchas clases con algoritmos casi idénticos, pero con algunas diferencias mínimas.</li>
                <li>Cuando quieres permitir a los clientes extender únicamente partes particulares de un algoritmo sin cambiar su estructura.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Identificar los pasos comunes en varias clases.</li>
                <li>Crear una clase base con un **método plantilla** que llame a los distintos pasos en orden.</li>
                <li>Declarar los pasos abstractos en la clase base y permitir que las subclases los implementen.</li>
                <li>Agregar ganchos (hooks) opcionales si es necesario.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Reduce la duplicación de código y facilita la extensión de algoritmos complejos.</li>
                <li><strong>Contras:</strong> Puede volverse difícil de mantener si tiene demasiados pasos y puede limitar la flexibilidad en comparación con otros patrones como Strategy.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Factory Method:</strong> Es una especialización de Template Method.</li>
                <li><strong>Strategy:</strong> Se basa en la composición y permite cambiar comportamientos en tiempo de ejecución, mientras que Template Method usa herencia y es estático.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>