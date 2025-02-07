<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Proxy</title>
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
        <h5 class="title-summary">Patrón Proxy</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>Proxy es un patrón de diseño estructural que te permite proporcionar un sustituto o marcador de posición para otro objeto. Un proxy controla el acceso al objeto original, permitiéndote hacer algo antes o después de que la solicitud llegue al objeto original.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>¿Por qué querrías controlar el acceso a un objeto? Imagina que tienes un objeto enorme que consume una gran cantidad de recursos del sistema. Lo necesitas de vez en cuando, pero no siempre.</p>
            <p>Las consultas a las bases de datos pueden ser muy lentas. Puedes llevar a cabo una implementación diferida, es decir, crear este objeto sólo cuando sea realmente necesario.</p>
            <p>En un mundo ideal, querríamos meter este código directamente dentro de la clase de nuestro objeto, pero eso no siempre es posible. Por ejemplo, la clase puede ser parte de una biblioteca cerrada de un tercero.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Proxy sugiere que crees una nueva clase proxy con la misma interfaz que un objeto de servicio original. Después actualizas tu aplicación para que pase el objeto proxy a todos los clientes del objeto original. Al recibir una solicitud de un cliente, el proxy crea un objeto de servicio real y le delega todo el trabajo.</p>
            <p>El proxy se camufla como objeto de la base de datos. Puede gestionar la inicialización diferida y el caché de resultados sin que el cliente o el objeto real de la base de datos lo sepan.</p>
            <p>Si necesitas ejecutar algo antes o después de la lógica primaria de la clase, el proxy te permite hacerlo sin cambiar esa clase. Ya que el proxy implementa la misma interfaz que la clase original, puede pasarse a cualquier cliente que espere un objeto de servicio real.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Una tarjeta de crédito es un proxy de un manojo de billetes. Las tarjetas de crédito pueden utilizarse para realizar pagos tanto como el efectivo.</p>
            <p>Una tarjeta de crédito es un proxy de una cuenta bancaria, que, a su vez, es un proxy de un manojo de billetes. Ambos implementan la misma interfaz, por lo que pueden utilizarse para realizar un pago.</p>
            <p>El consumidor se siente genial porque no necesita llevar un montón de efectivo encima. El dueño de la tienda también está contento porque los ingresos de la transacción se añaden electrónicamente a la cuenta bancaria de la tienda sin el riesgo de perder el depósito o sufrir un robo de camino al banco.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Interfaz de Servicio:</strong> Declara la interfaz del servicio que el proxy debe seguir.</li>
                <li><strong>Servicio:</strong> Es una clase que proporciona la lógica de negocio útil.</li>
                <li><strong>Proxy:</strong> Tiene un campo de referencia que apunta a un objeto de servicio y delega el trabajo cuando es necesario.</li>
                <li><strong>Cliente:</strong> Utiliza el servicio o el proxy a través de la misma interfaz, sin importar cuál se utilice.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// La interfaz de un servicio remoto
interface ThirdPartyYouTubeLib {
    method listVideos()
    method getVideoInfo(id)
    method downloadVideo(id)
}

// La implementación concreta de un conector de servicio.
class ThirdPartyYouTubeClass implements ThirdPartyYouTubeLib {
    method listVideos() {
        // Envía una solicitud API a YouTube
    }
    method getVideoInfo(id) {
        // Obtiene metadatos de algún video
    }
    method downloadVideo(id) {
        // Descarga un archivo de video de YouTube
    }
}

// El proxy para gestionar el almacenamiento en caché
class CachedYouTubeClass implements ThirdPartyYouTubeLib {
    private field service: ThirdPartyYouTubeLib
    private field listCache, videoCache
    private field needReset

    constructor CachedYouTubeClass(service: ThirdPartyYouTubeLib) {
        this.service = service
    }

    method listVideos() {
        if (listCache == null || needReset)
            listCache = service.listVideos()
        return listCache
    }

    method getVideoInfo(id) {
        if (videoCache == null || needReset)
            videoCache = service.getVideoInfo(id)
        return videoCache
    }

    method downloadVideo(id) {
        if (!downloadExists(id) || needReset)
            service.downloadVideo(id)
    }
}

// La clase GUI que usa el proxy
class YouTubeManager {
    protected field service: ThirdPartyYouTubeLib

    constructor YouTubeManager(service: ThirdPartyYouTubeLib) {
        this.service = service
    }

    method renderVideoPage(id) {
        info = service.getVideoInfo(id)
        // Representa la página del video.
    }

    method renderListPanel() {
        list = service.listVideos()
        // Representa la lista de miniaturas de los videos.
    }

    method reactOnUserInput() {
        renderVideoPage()
        renderListPanel()
    }
}

// La aplicación puede configurar proxies sobre la marcha
class Application {
    method init() {
        aYouTubeService = new ThirdPartyYouTubeClass()
        aYouTubeProxy = new CachedYouTubeClass(aYouTubeService)
        manager = new YouTubeManager(aYouTubeProxy)
        manager.reactOnUserInput()
    }
}
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Inicialización diferida (proxy virtual): Para objetos pesados que consumen muchos recursos solo cuando se necesitan.</li>
                <li>Control de acceso (proxy de protección): Limitar el acceso solo a ciertos clientes según las credenciales.</li>
                <li>Ejecución local de un servicio remoto (proxy remoto): Gestionar solicitudes a un servicio en un servidor remoto.</li>
                <li>Solicitudes de registro (proxy de registro): Registrar las solicitudes al objeto de servicio.</li>
                <li>Resultados de solicitudes en caché (proxy de caché): Gestionar el ciclo de vida del caché para evitar solicitudes repetitivas.</li>
                <li>Referencia inteligente: El proxy puede controlar la vida útil de un objeto pesado, liberando recursos cuando ya no se usa.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Crea una interfaz de servicio si no existe una para hacer intercambiables los objetos proxy y servicio.</li>
                <li>Crea la clase proxy que administre el ciclo de vida del objeto de servicio.</li>
                <li>Implementa los métodos del proxy según su propósito, delegando el trabajo cuando sea necesario.</li>
                <li>Considera usar la inicialización diferida para mejorar el rendimiento.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Permite controlar el acceso a un objeto sin que los clientes lo sepan, y gestiona su ciclo de vida sin intervención.</li>
                <li><strong>Contras:</strong> Puede complicar el código con muchas clases adicionales y retrasar la respuesta del servicio.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Adapter:</strong> Ambos patrones proporcionan acceso a objetos a través de una interfaz diferente, pero Proxy mantiene la misma interfaz del servicio.</li>
                <li><strong>Decorator:</strong> Ambos basados en la composición, pero Proxy gestiona el ciclo de vida de su servicio, mientras que Decorator lo hace el cliente.</li>
                <li><strong>Facade:</strong> Similar en que ambos pueden inicializar un objeto complejos, pero Proxy mantiene la misma interfaz del objeto de servicio.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
