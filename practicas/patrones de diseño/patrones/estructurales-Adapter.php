<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Adapter</title>
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
        <h1 class="title-summary">Patrón Adapter</h1>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>Adapter es un patrón de diseño estructural que permite la colaboración entre objetos con interfaces incompatibles.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Imagina que estás creando una aplicación de monitoreo del mercado de valores. La aplicación descarga la información de bolsa desde varias fuentes en formato XML para presentarla al usuario con bonitos gráficos y diagramas. Pero decides integrar una biblioteca de análisis que solo funciona con datos en formato JSON. Esto crea un conflicto de interfaces.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Adapter resuelve este dilema creando un adaptador que actúa como intermediario entre los objetos con interfaces incompatibles, permitiendo que el cliente use la nueva biblioteca sin necesidad de modificar el código cliente existente.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Imagina que viajas de Europa a Estados Unidos y tienes que usar un enchufe europeo en un país con enchufes americanos. El adaptador convierte el enchufe europeo en uno compatible con el estándar estadounidense.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Clase Cliente:</strong> Contiene la lógica de negocio y necesita usar la clase de servicio incompatible.</li>
                <li><strong>Interfaz con el Cliente:</strong> Define el protocolo de comunicación que los clientes usan para interactuar con las clases de servicio.</li>
                <li><strong>Clase de Servicio:</strong> La clase que tiene la funcionalidad que el cliente necesita, pero con una interfaz incompatible.</li>
                <li><strong>Clase Adaptadora:</strong> Envuelve la clase de servicio y convierte su interfaz a una que el cliente pueda utilizar.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// Definición de un agujero redondo.
class RoundHole is
    constructor RoundHole(radius) { ... }
    
    method getRadius() is
        return this.radius

    method fits(peg: RoundPeg) is
        return this.getRadius() >= peg.getRadius()

// Definición de una pieza redonda.
class RoundPeg is
    constructor RoundPeg(radius) { ... }

    method getRadius() is
        return this.radius

// Definición de una pieza cuadrada incompatible.
class SquarePeg is
    constructor SquarePeg(width) { ... }

    method getWidth() is
        return this.width

// El adaptador convierte una pieza cuadrada en una pieza redonda.
class SquarePegAdapter extends RoundPeg is
    private field peg: SquarePeg

    constructor SquarePegAdapter(peg: SquarePeg) is
        this.peg = peg

    method getRadius() is
        return peg.getWidth() * Math.sqrt(2) / 2

// Cliente que utiliza el adaptador para encajar piezas cuadradas en agujeros redondos.
hole = new RoundHole(5)
rpeg = new RoundPeg(5)
hole.fits(rpeg) // verdadero

small_sqpeg = new SquarePeg(5)
large_sqpeg = new SquarePeg(10)
small_sqpeg_adapter = new SquarePegAdapter(small_sqpeg)
large_sqpeg_adapter = new SquarePegAdapter(large_sqpeg)
hole.fits(small_sqpeg_adapter) // verdadero
hole.fits(large_sqpeg_adapter) // falso
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando se necesita usar una clase existente cuya interfaz no es compatible con el resto del sistema.</li>
                <li>Cuando se quiere reutilizar una clase de una biblioteca externa sin modificar su código.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Crear una interfaz común que defina los métodos que el cliente necesita usar.</li>
                <li>Implementar una clase adaptadora que envuelva la clase de servicio y convierta su interfaz a la interfaz común.</li>
                <li>Utilizar el adaptador en lugar de la clase de servicio en el código cliente.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Permite la reutilización de clases con interfaces incompatibles y mantiene el código cliente limpio.</li>
                <li><strong>Contras:</strong> La complejidad aumenta, ya que se debe crear una nueva clase adaptadora para cada tipo de objeto incompatible.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Facade:</strong> Facade simplifica el acceso a un subsistema complejo, mientras que Adapter adapta interfaces para permitir su uso.</li>
                <li><strong>Decorator:</strong> Ambos patrones agregan funcionalidad a los objetos, pero Adapter cambia la interfaz mientras que Decorator mantiene la misma.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
