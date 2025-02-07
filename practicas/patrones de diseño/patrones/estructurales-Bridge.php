<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Bridge</title>
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
        <h1 class="title-summary">Patrón Bridge (Puente)</h1>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón Bridge es un patrón de diseño estructural que permite dividir una clase grande, o un conjunto de clases relacionadas, en dos jerarquías separadas (abstracción e implementación) que pueden desarrollarse de manera independiente.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Si tienes una clase geométrica como "Forma" con subclases como "Círculo" y "Cuadrado", y luego quieres agregar un nuevo atributo como "Color", el número de combinaciones de clases crece exponencialmente. Por ejemplo, para agregar el color "Rojo" y "Azul", necesitarías crear combinaciones como "CírculoRojo" y "CuadradoAzul". Esto se vuelve problemático a medida que aumentan las combinaciones.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Bridge resuelve este problema separando las dimensiones del problema en dos jerarquías de clases: una para la forma y otra para el color. Así, la clase "Forma" tiene una referencia a un objeto de la jerarquía "Color" y delega el trabajo relacionado con el color. Esto elimina la explosión de clases combinadas y facilita la extensión de la jerarquía sin generar combinaciones innecesarias.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Imagina una aplicación de interfaz gráfica que debe funcionar en varios sistemas operativos, como Windows, Linux y macOS. El patrón Bridge permite que el código de la interfaz (abstracción) y el código del sistema operativo (implementación) estén separados. Así, puedes cambiar la interfaz gráfica o la implementación sin afectar la otra parte del sistema.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Abstracción:</strong> La capa de control de alto nivel que delega el trabajo a la implementación.</li>
                <li><strong>Implementación:</strong> Declara la interfaz común para todas las implementaciones concretas.</li>
                <li><strong>Implementaciones Concretas:</strong> Contienen código específico de la plataforma.</li>
                <li><strong>Abstracción Refinada:</strong> Variantes de lógica de control que trabajan con diferentes implementaciones.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// La "abstracción" define la interfaz para el control
// de las dos jerarquías de clase. Mantiene una referencia
// a un objeto de la jerarquía de "implementación" y delega
// el trabajo real a este objeto.
class RemoteControl is
    protected field device: Device
    constructor RemoteControl(device: Device) is
        this.device = device
    method togglePower() is
        if (device.isEnabled()) then
            device.disable()
        else
            device.enable()
    method volumeDown() is
        device.setVolume(device.getVolume() - 10)
    method volumeUp() is
        device.setVolume(device.getVolume() + 10)
    method channelDown() is
        device.setChannel(device.getChannel() - 1)
    method channelUp() is
        device.setChannel(device.getChannel() + 1)


// Se pueden extender clases de la jerarquía de abstracción
// independientemente de las clases de dispositivo.
class AdvancedRemoteControl extends RemoteControl is
    method mute() is
        device.setVolume(0)


// La interfaz de "implementación" declara métodos comunes a
// todas las clases concretas de implementación.
interface Device is
    method isEnabled()
    method enable()
    method disable()
    method getVolume()
    method setVolume(percent)
    method getChannel()
    method setChannel(channel)

// Los dispositivos siguen la misma interfaz.
class Tv implements Device is
    // ...

class Radio implements Device is
    // ...

// En el código cliente:
tv = new Tv()
remote = new RemoteControl(tv)
remote.togglePower()

radio = new Radio()
remote = new AdvancedRemoteControl(radio)
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando necesitas dividir y organizar una clase monolítica que tenga muchas variantes de una sola funcionalidad.</li>
                <li>Cuando una clase se vuelve difícil de manejar debido a la necesidad de añadir nuevas variantes o combinaciones de funcionalidades.</li>
                <li>Cuando deseas extender una clase en varias dimensiones ortogonales e independientes.</li>
                <li>Cuando necesitas cambiar implementaciones en tiempo de ejecución sin modificar la abstracción.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Identifica las dimensiones ortogonales de tus clases y extráelas en jerarquías separadas.</li>
                <li>Define las operaciones necesarias en la clase base de abstracción.</li>
                <li>Declara las operaciones comunes en la interfaz de implementación.</li>
                <li>Desarrolla las clases de implementación para cada plataforma o tipo de dispositivo, asegurándote de que todas sigan la misma interfaz.</li>
                <li>En la clase de abstracción, añade una referencia al objeto de implementación y delega la mayoría del trabajo al objeto de implementación.</li>
                <li>El código cliente vincula la abstracción con la implementación, y luego trabaja únicamente con la abstracción.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Facilita el cambio y extensión de clases sin afectar el código existente, permite el desarrollo independiente de diferentes jerarquías de clases, y soporta el principio de abierto/cerrado.</li>
                <li><strong>Contras:</strong> La complejidad puede aumentar si la clase original es muy cohesionada o si no se identifican bien las dimensiones ortogonales.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Adapter:</strong> Adapter conecta clases incompatibles, mientras que Bridge divide una clase monolítica en jerarquías separadas y relacionadas.</li>
                <li><strong>Strategy:</strong> Ambos patrones utilizan la composición y delegación, pero Bridge se utiliza cuando existen dimensiones ortogonales, mientras que Strategy define una única familia de algoritmos.</li>
                <li><strong>Abstract Factory:</strong> Abstract Factory puede complementar Bridge cuando se necesita encapsular la relación entre abstracción e implementación.</li>
                <li><strong>Builder:</strong> Bridge y Builder pueden combinarse cuando diferentes constructores crean distintas implementaciones para una abstracción.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
