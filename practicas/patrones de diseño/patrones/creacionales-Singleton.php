<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Singleton</title>
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
        <h1 class="title-summary">Patrón Singleton</h1>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>Singleton es un patrón de diseño creacional que nos permite asegurarnos de que una clase tenga una única instancia, a la vez que proporciona un punto de acceso global a dicha instancia.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>El patrón Singleton resuelve dos problemas al mismo tiempo, vulnerando el Principio de responsabilidad única:</p>
            <ul>
                <li><strong>Garantizar que una clase tenga una única instancia:</strong> Esto es útil para controlar el acceso a recursos compartidos, como bases de datos o archivos.</li>
                <li><strong>Acceso global a un objeto:</strong> Permite que los clientes trabajen con el mismo objeto sin darse cuenta, evitando sobrescritura accidental.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>El patrón Singleton implementa dos pasos clave:</p>
            <ul>
                <li>Hacer privado el constructor para evitar la creación de instancias fuera de la clase Singleton.</li>
                <li>Crear un método estático que devuelva la instancia única, almacenada en un campo estático para ser reutilizada.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>El gobierno es un ejemplo excelente de patrón Singleton. Un país sólo tiene un gobierno oficial, y la figura del gobierno es el punto de acceso global que identifica al grupo de personas a cargo.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Clase Singleton:</strong> Declara el método estático obtenerInstancia, que garantiza que sólo haya una instancia de la clase.</li>
                <li><strong>Constructor Privado:</strong> El constructor se oculta para evitar instanciación directa, permitiendo el acceso sólo a través del método estático.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// La clase Base de datos define el método `obtenerInstancia`
// que permite a los clientes acceder a la misma instancia de
// una conexión de la base de datos a través del programa.
class Database is
    // El campo para almacenar la instancia singleton debe
    // declararse estático.
    private static field instance: Database

    // El constructor del singleton siempre debe ser privado
    // para evitar llamadas de construcción directas con el
    // operador `new`.
    private constructor Database() is
        // Algún código de inicialización, como la propia
        // conexión al servidor de una base de datos.
        // ...

    // El método estático que controla el acceso a la instancia
    // singleton.
    public static method getInstance() is
        if (Database.instance == null) then
            acquireThreadLock() and then
                // Garantiza que la instancia aún no se ha
                // inicializado por otro hilo mientras ésta ha
                // estado esperando el desbloqueo.
                if (Database.instance == null) then
                    Database.instance = new Database()
        return Database.instance

    // Lógica de negocio
    public method query(sql) is
        // Ejemplo de consulta a la base de datos.
        // ...

class Application is
    method main() is
        Database foo = Database.getInstance()
        foo.query("SELECT ...")
        Database bar = Database.getInstance()
        bar.query("SELECT ...")
        // `bar` es la misma instancia que `foo`.
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando una clase debe tener solo una instancia accesible globalmente, como un objeto de base de datos.</li>
                <li>Cuando necesitas controlar el acceso a una variable global, garantizando una sola instancia.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Añadir un campo estático privado a la clase para almacenar la instancia Singleton.</li>
                <li>Declarar un método estático para obtener la instancia Singleton.</li>
                <li>Implementar una inicialización diferida dentro del método estático.</li>
                <li>Declarar el constructor como privado para prevenir la creación directa de instancias.</li>
                <li>Sustituir llamadas directas al constructor por el método estático.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Garantiza una única instancia, acceso global, y eficiencia con la inicialización diferida.</li>
                <li><strong>Contras:</strong> Puede violar el Principio de Responsabilidad Única, complicar pruebas unitarias, y causar problemas en entornos multihilo.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Fachada:</strong> Una fachada puede convertirse en un Singleton, ya que se necesita un solo objeto fachada en la mayoría de los casos.</li>
                <li><strong>Flyweight:</strong> Ambos patrones tienen una sola instancia compartida, pero Flyweight permite múltiples instancias con estados distintos.</li>
                <li><strong>Abstract Factory, Builder, Prototype:</strong> Pueden implementarse como Singletons si es necesario.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
