<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Facade</title>
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
        <h5 class="title-summary">Patrón Facade</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón Facade es un patrón estructural que proporciona una interfaz simplificada a un subsistema complejo. Facilita la integración con bibliotecas o marcos sofisticados, proporcionando un acceso directo y reducido a las funcionalidades esenciales.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Trabajar directamente con un subsistema complejo puede hacer que el código se vuelva difícil de mantener y entender, ya que se debe gestionar la interacción entre muchos objetos y sus dependencias.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Facade oculta la complejidad del subsistema, proporcionando una interfaz sencilla que solo expone las funciones realmente necesarias para el cliente, sin necesidad de interactuar con la implementación interna.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Imagina hacer un pedido telefónico en una tienda. El operador es una fachada que facilita el acceso a varios departamentos sin que el cliente tenga que interactuar con cada uno de ellos.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Fachada:</strong> Proporciona una interfaz simplificada para interactuar con el subsistema.</li>
                <li><strong>Subsistema:</strong> Un conjunto de clases complejas que realizan tareas específicas, que quedan ocultas detrás de la fachada.</li>
                <li><strong>Cliente:</strong> Utiliza la fachada para interactuar con el subsistema, sin conocer su complejidad interna.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// Ejemplo de código de una fachada para un framework de conversión de vídeo
class VideoConverter {
    method convert(filename, format) {
        videoFile = new VideoFile(filename)
        codec = new CodecFactory().extract(videoFile)
        if (format == "mp4") 
            destinationCodec = new MPEG4Codec()
        else 
            destinationCodec = new OggCodec()
        buffer = BitrateReader.read(videoFile, codec)
        result = BitrateReader.convert(buffer, destinationCodec)
        finalResult = AudioMixer.fix(result)
        return new File(finalResult)
    }
}

// El cliente solo interactúa con la fachada, sin preocuparse de los detalles
class Application {
    method main() {
        converter = new VideoConverter()
        file = converter.convert("funny-cats-video.ogg", "mp4")
        file.save()
    }
}
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando necesitas una interfaz simplificada a un subsistema complejo.</li>
                <li>Para desacoplar el cliente de la complejidad del subsistema.</li>
                <li>Cuando se requieren múltiples fachadas para gestionar subsistemas complejos y facilitar la interacción entre capas del sistema.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Crea una clase fachada que proporcione una interfaz simple.</li>
                <li>Encapsula las complejidades del subsistema dentro de esta fachada.</li>
                <li>Haz que todo el código cliente interactúe solo con la fachada, ocultando la lógica interna del subsistema.</li>
                <li>Si la fachada se vuelve muy compleja, considera dividirla en fachadas adicionales especializadas.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Facilita el acceso a subsistemas complejos, mejora la mantenibilidad y desacopla al cliente de la lógica interna del subsistema.</li>
                <li><strong>Contras:</strong> La fachada puede convertirse en un objeto todopoderoso que gestione demasiadas responsabilidades, lo que podría complicar su mantenimiento.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Adapter:</strong> Ambos patrones proporcionan una interfaz diferente, pero Facade simplifica el acceso a un subsistema completo, mientras que Adapter adapta la interfaz de un solo objeto.</li>
                <li><strong>Proxy:</strong> Ambos patrones pueden actuar como intermediarios, pero Proxy tiene la misma interfaz que el objeto que envuelve, mientras que Facade tiene una interfaz simplificada para un subsistema completo.</li>
                <li><strong>Mediator:</strong> Aunque ambos patrones coordinan la interacción entre clases, Mediator centraliza la comunicación, mientras que Facade simplifica el acceso a un subsistema sin cambiar la interacción interna.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
