<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón State</title>
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
        <h5 class="title-summary">Patrón State</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El **Patrón State** permite que un objeto cambie su comportamiento dependiendo de su estado interno, eliminando grandes estructuras condicionales (`if` o `switch`). Cada estado se encapsula en una clase separada, lo que hace que el código sea más flexible y fácil de mantener.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Cuando un objeto tiene múltiples estados y su comportamiento cambia según el estado actual, el uso de estructuras condicionales (`if` o `switch`) puede hacer que el código sea difícil de leer, mantener y escalar.
                Un ejemplo común es un **reproductor de música**, que puede estar en **modo pausado, reproduciendo o bloqueado**, y cada estado tiene reglas específicas sobre cómo responder a eventos.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón **State** sugiere encapsular cada estado en su propia clase y delegar el comportamiento al estado actual.
                El objeto principal (el **contexto**) mantiene una referencia al estado actual y delega el trabajo a esa instancia.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Contexto:</strong> Mantiene una referencia a un objeto de estado y delega en él su comportamiento.</li>
                <li><strong>Estado:</strong> Interfaz que define los métodos comunes a todos los estados.</li>
                <li><strong>Estados Concretos:</strong> Clases que implementan la interfaz de estado y definen el comportamiento específico.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Ejemplo en Código</h5>
            <div class="code-example">
                <pre>
// Interfaz común para los estados
interface Estado {
    void clickPlay();
    void clickLock();
    void clickNext();
    void clickPrevious();
}

// Estado: Bloqueado
class EstadoBloqueado implements Estado {
    private Reproductor reproductor;

    public EstadoBloqueado(Reproductor reproductor) {
        this.reproductor = reproductor;
    }

    @Override
    public void clickPlay() {
        // No hace nada
    }

    @Override
    public void clickLock() {
        reproductor.cambiarEstado(new EstadoListo(reproductor));
    }

    @Override
    public void clickNext() {}
    @Override
    public void clickPrevious() {}
}

// Estado: Listo para reproducir
class EstadoListo implements Estado {
    private Reproductor reproductor;

    public EstadoListo(Reproductor reproductor) {
        this.reproductor = reproductor;
    }

    @Override
    public void clickPlay() {
        reproductor.cambiarEstado(new EstadoReproduciendo(reproductor));
        System.out.println("Reproduciendo...");
    }

    @Override
    public void clickLock() {
        reproductor.cambiarEstado(new EstadoBloqueado(reproductor));
    }

    @Override
    public void clickNext() {
        System.out.println("Siguiente canción...");
    }

    @Override
    public void clickPrevious() {
        System.out.println("Canción anterior...");
    }
}

// Estado: Reproduciendo
class EstadoReproduciendo implements Estado {
    private Reproductor reproductor;

    public EstadoReproduciendo(Reproductor reproductor) {
        this.reproductor = reproductor;
    }

    @Override
    public void clickPlay() {
        reproductor.cambiarEstado(new EstadoListo(reproductor));
        System.out.println("Pausado...");
    }

    @Override
    public void clickLock() {
        reproductor.cambiarEstado(new EstadoBloqueado(reproductor));
    }

    @Override
    public void clickNext() {
        System.out.println("Avanzando...");
    }

    @Override
    public void clickPrevious() {
        System.out.println("Retrocediendo...");
    }
}

// Contexto: Reproductor de Música
class Reproductor {
    private Estado estadoActual;

    public Reproductor() {
        this.estadoActual = new EstadoListo(this);
    }

    public void cambiarEstado(Estado nuevoEstado) {
        this.estadoActual = nuevoEstado;
    }

    public void clickPlay() { estadoActual.clickPlay(); }
    public void clickLock() { estadoActual.clickLock(); }
    public void clickNext() { estadoActual.clickNext(); }
    public void clickPrevious() { estadoActual.clickPrevious(); }
}

// Uso del patrón
public class Main {
    public static void main(String[] args) {
        Reproductor reproductor = new Reproductor();

        reproductor.clickPlay();  // Reproduciendo...
        reproductor.clickNext();  // Siguiente canción...
        reproductor.clickLock();  // Bloqueado
        reproductor.clickPlay();  // No hace nada (bloqueado)
    }
}
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando un objeto tiene múltiples estados con diferentes comportamientos.</li>
                <li>Cuando se quiere eliminar los grandes bloques de `if` o `switch`.</li>
                <li>Cuando los estados pueden cambiar dinámicamente en tiempo de ejecución.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Separa la lógica de cada estado en clases individuales, mejorando la mantenibilidad.</li>
                <li><strong>Pros:</strong> Facilita la adición de nuevos estados sin modificar el código existente.</li>
                <li><strong>Contras:</strong> Puede aumentar la complejidad si hay pocos estados o cambios poco frecuentes.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Strategy:</strong> Ambos encapsulan comportamientos en clases separadas, pero **State** cambia dinámicamente entre ellos.</li>
                <li><strong>Flyweight:</strong> Puede usarse junto con **State** para compartir estados entre múltiples objetos.</li>
                <li><strong>Command:</strong> Mientras **Command** encapsula una acción como objeto, **State** encapsula un comportamiento.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>