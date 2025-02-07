<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Iterator</title>
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
        <h5 class="title-summary">Patrón Iterator</h5>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>Iterator es un patrón de diseño de comportamiento que te permite recorrer elementos de una colección sin exponer su representación subyacente (lista, pila, árbol, etc.).</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Las colecciones son de los tipos de datos más utilizados en programación. Sin embargo, una colección tan solo es un contenedor para un grupo de objetos.</p>
            <p>Varios tipos de colecciones almacenan sus elementos de maneras distintas (listas, pilas, árboles, grafos, etc.). Necesitas una forma de recorrer cada elemento de la colección sin tener que acceder directamente a ellos de manera repetitiva. Diferentes estructuras pueden requerir diferentes algoritmos de recorrido, lo que complica el código cliente.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>La idea central del patrón Iterator es extraer el comportamiento de recorrido de una colección y colocarlo en un objeto independiente llamado iterador. Los iteradores implementan varios algoritmos de recorrido, y múltiples iteradores pueden recorrer la misma colección de forma independiente.</p>
            <p>Este patrón asegura que el cliente no dependa de la estructura interna de la colección y pueda usar un algoritmo de recorrido sin preocuparse por su implementación.</p>
        </div>

        <div class="section-summary">
            <h5>Analogía en el mundo real</h5>
            <p>Es como cuando visitas Roma: puedes hacerlo siguiendo un mapa, utilizando una aplicación móvil o contratando a un guía turístico. Cada una de estas opciones actúa como un iterador sobre las distintas atracciones de la ciudad.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Interfaz Iteradora:</strong> Declara las operaciones necesarias para recorrer una colección, como obtener el siguiente elemento o verificar si hay más elementos.</li>
                <li><strong>Iteradores Concretos:</strong> Implementan algoritmos específicos para recorrer la colección.</li>
                <li><strong>Interfaz Colección:</strong> Declara un método para obtener iteradores compatibles con la colección.</li>
                <li><strong>Colecciones Concretas:</strong> Implementan la interfaz Colección y retornan instancias de iteradores concretos.</li>
                <li><strong>Cliente:</strong> Trabaja con colecciones e iteradores a través de sus interfaces, sin acoplarse a clases específicas.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pseudocódigo</h5>
            <div class="code-example">
                <pre>
// La interfaz de colección debe declarar un método fábrica para
// producir iteradores.
interface SocialNetwork is
    method createFriendsIterator(profileId): ProfileIterator
    method createCoworkersIterator(profileId): ProfileIterator

// Facebook implementa la interfaz SocialNetwork
class Facebook implements SocialNetwork is
    method createFriendsIterator(profileId) is
        return new FacebookIterator(this, profileId, "friends")
    method createCoworkersIterator(profileId) is
        return new FacebookIterator(this, profileId, "coworkers")

// La interfaz común a todos los iteradores.
interface ProfileIterator is
    method getNext(): Profile
    method hasMore(): bool

// Clase iteradora concreta
class FacebookIterator implements ProfileIterator is
    private field facebook: Facebook
    private field profileId, type: string
    private field currentPosition
    private field cache: array of Profile

    constructor FacebookIterator(facebook, profileId, type) is
        this.facebook = facebook
        this.profileId = profileId
        this.type = type

    private method lazyInit() is
        if (cache == null)
            cache = facebook.socialGraphRequest(profileId, type)

    method getNext() is
        if (hasMore())
            result = cache[currentPosition]
            currentPosition++
            return result

    method hasMore() is
        lazyInit()
        return currentPosition < cache.length

// Clase cliente que utiliza el iterador
class SocialSpammer is
    method send(iterator: ProfileIterator, message: string) is
        while (iterator.hasMore())
            profile = iterator.getNext()
            System.sendEmail(profile.getEmail(), message)
                
// Configuración de la aplicación
class Application is
    field network: SocialNetwork
    field spammer: SocialSpammer

    method config() is
        if working with Facebook
            this.network = new Facebook()
        if working with LinkedIn
            this.network = new LinkedIn()
        this.spammer = new SocialSpammer()

    method sendSpamToFriends(profile) is
        iterator = network.createFriendsIterator(profile.getId())
        spammer.send(iterator, "Very important message")

    method sendSpamToCoworkers(profile) is
        iterator = network.createCoworkersIterator(profile.getId())
        spammer.send(iterator, "Very important message")
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando tu colección tiene una estructura de datos compleja, pero quieres ocultar esa complejidad a los clientes.</li>
                <li>Para evitar que el código cliente dependa de detalles específicos de la implementación de la colección.</li>
                <li>Para reducir la duplicación del código de recorrido en tu aplicación.</li>
                <li>Cuando necesitas recorrer diferentes tipos de colecciones o cuando no conoces las estructuras de datos de antemano.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Cómo implementarlo</h5>
            <ul>
                <li>Declara la interfaz iteradora, que debe incluir al menos un método para obtener el siguiente elemento.</li>
                <li>Declara la interfaz de colección con métodos para obtener iteradores.</li>
                <li>Implementa iteradores concretos para las colecciones que quieras recorrer.</li>
                <li>Implementa la interfaz de colección en las clases de colección y vincula la colección con los iteradores.</li>
                <li>Utiliza los iteradores en lugar de recorrer directamente la colección en el código cliente.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Ayuda a mantener el principio de responsabilidad única y el principio de abierto/cerrado. Permite recorrer la misma colección en paralelo y retrazar la iteración si es necesario.</li>
                <li><strong>Contras:</strong> Puede resultar excesivo si se trabaja solo con colecciones simples. En algunas colecciones especializadas, el uso de un iterador puede ser menos eficiente que recorrer los elementos directamente.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Relaciones con otros patrones</h5>
            <ul>
                <li><strong>Composite:</strong> Puedes utilizar Iteradores para recorrer árboles Composite.</li>
                <li><strong>Factory Method:</strong> Puedes usar el patrón Factory Method junto con Iterator para permitir que las subclases de la colección devuelvan distintos tipos de iteradores.</li>
                <li><strong>Memento:</strong> Puedes usar Memento junto con Iterator para capturar el estado de la iteración y reanudarla si fuera necesario.</li>
                <li><strong>Visitor:</strong> Puedes utilizar Visitor junto con Iterator para recorrer estructuras de datos complejas y ejecutar operaciones sobre sus elementos.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
