<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Flyweight</title>
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
        <h5 class="title-summary">Patrón Flyweight</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón Flyweight es un patrón estructural que permite reducir el uso de memoria al compartir la mayor cantidad de datos posible entre objetos similares. Es ideal cuando se necesita manejar grandes cantidades de objetos, pero algunos de estos comparten muchas características comunes.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>En aplicaciones con muchos objetos similares, como un juego con partículas (balas, misiles, explosiones), la cantidad de memoria utilizada puede ser excesiva, ya que cada objeto podría tener la misma información almacenada repetidamente.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>Flyweight ofrece la solución de separar el <strong>estado intrínseco</strong> (información común como color, textura, etc.) del <strong>estado extrínseco</strong> (información que cambia constantemente, como la posición o la velocidad). Los objetos compartidos se almacenan una sola vez, mientras que los datos que cambian se pasan como parámetros.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Imagina que estás jugando un juego de disparos en una computadora. En lugar de crear una nueva imagen para cada bala disparada, el sistema usa una sola instancia de un objeto de bala, y solo cambia su posición en la pantalla.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Flyweight:</strong> Es el objeto que contiene el estado intrínseco compartido entre muchas instancias de objetos similares.</li>
                <li><strong>Contexto:</strong> Contiene el estado extrínseco de los objetos, como la posición o la velocidad.</li>
                <li><strong>Fábrica de Flyweights:</strong> Gestiona y reutiliza los objetos Flyweight, asegurando que se comparta el estado intrínseco entre las instancias.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// Ejemplo de un patrón Flyweight para un juego de disparos
class BalaFlyweight {
    private String color;
    private String sprite; // Este es el estado intrínseco

    // Constructor de Flyweight
    public BalaFlyweight(String color, String sprite) {
        this.color = color;
        this.sprite = sprite;
    }

    public void mostrar(Contexto contexto) {
        // El estado extrínseco (posición, velocidad) se pasa aquí
        System.out.println("Bala de color " + color + " en " + contexto.getPosicion());
    }
}

// Clase Contexto
class Contexto {
    private String posicion;
    private String velocidad;

    public Contexto(String posicion, String velocidad) {
        this.posicion = posicion;
        this.velocidad = velocidad;
    }

    public String getPosicion() {
        return posicion;
    }

    public String getVelocidad() {
        return velocidad;
    }
}

// Fábrica de Flyweights
class FábricaDeBalas {
    private Map<String, BalaFlyweight> flyweights = new HashMap<>();

    public BalaFlyweight obtenerFlyweight(String color) {
        if (!flyweights.containsKey(color)) {
            flyweights.put(color, new BalaFlyweight(color, "default-sprite"));
        }
        return flyweights.get(color);
    }
}

// El cliente interactúa con el Flyweight
class Juego {
    public void jugar() {
        FábricaDeBalas fabrica = new FábricaDeBalas();
        Contexto contexto = new Contexto("Posición1", "Rápida");
        
        BalaFlyweight bala = fabrica.obtenerFlyweight("Rojo");
        bala.mostrar(contexto);
    }
}
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando se necesita crear muchos objetos similares con grandes cantidades de datos compartidos.</li>
                <li>Cuando se desea optimizar el uso de memoria, manteniendo solo una copia de los datos comunes.</li>
                <li>En sistemas donde el rendimiento es crítico y hay una alta frecuencia de creación de objetos pequeños.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Crea clases para los objetos Flyweight, separando el estado intrínseco (común) del estado extrínseco (cambiable).</li>
                <li>Usa una fábrica para manejar la creación y reutilización de Flyweights, asegurándote de que los objetos comunes se compartan.</li>
                <li>Al utilizar un Flyweight, pasa el estado extrínseco como parámetros de método, sin almacenar estos datos en el objeto Flyweight.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Reduce el uso de memoria, mejora el rendimiento, y evita la creación innecesaria de objetos duplicados.</li>
                <li><strong>Contras:</strong> Puede complicar el diseño, especialmente en sistemas donde los estados extrínsecos cambian frecuentemente.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Abstract Factory:</strong> Ambos patrones se utilizan para crear familias de objetos, pero Flyweight optimiza la memoria reutilizando instancias existentes.</li>
                <li><strong>Prototype:</strong> Mientras que Prototype crea una copia de un objeto, Flyweight crea un solo objeto compartido para ser reutilizado.</li>
                <li><strong>Decorator:</strong> Aunque Decorator se utiliza para añadir funcionalidad a los objetos, Flyweight se enfoca en compartir el estado común entre los objetos.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
