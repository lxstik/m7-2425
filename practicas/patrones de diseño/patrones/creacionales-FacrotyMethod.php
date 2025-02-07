<?php
include("../componentes/header.php");
include("../componentes/nav.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Factory Method</title>
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
        <h1 class="title-summary">Patrón Factory Method</h1>

        <div class="section-summary">
            <h5>Propósito</h5>
            <p>El patrón Factory Method es un patrón de diseño creacional que proporciona una interfaz para crear objetos en una superclase, permitiendo a las subclases alterar el tipo de objetos que se crearán sin modificar el código cliente.</p>
        </div>

        <div class="section-summary">
            <h5>Problema</h5>
            <p>Si tienes un código muy acoplado a clases específicas, como en una aplicación de transporte que maneja camiones, agregar nuevas clases de transporte puede resultar en un código desordenado lleno de condicionales. Esto dificulta la extensibilidad y el mantenimiento del código.</p>
        </div>

        <div class="section-summary">
            <h5>Solución</h5>
            <p>La solución es usar el patrón Factory Method, que delega la creación de objetos a un método especializado. Este método puede ser sobrescrito en subclases para cambiar la clase de los productos creados, manteniendo el código flexible y escalable.</p>
        </div>

        <div class="section-summary">
            <h5>Estructura</h5>
            <ul>
                <li><strong>Producto:</strong> Declara una interfaz común para todos los productos que puede crear la clase creadora.</li>
                <li><strong>Producto Concreto:</strong> Implementaciones específicas de la interfaz de producto.</li>
                <li><strong>Creador:</strong> Declara el método de fábrica que devuelve objetos de tipo Producto.</li>
                <li><strong>Creador Concreto:</strong> Sobrescribe el método de fábrica para devolver un tipo específico de producto.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Ejemplo</h5>
            <div class="code-example">
                <pre>
class Dialog:
    def create_button(self):
        pass

class WindowsDialog(Dialog):
    def create_button(self):
        return WindowsButton()

class WebDialog(Dialog):
    def create_button(self):
        return HTMLButton()
                </pre>
            </div>
        </div>

        <div class="section-summary">
            <h5>Aplicabilidad</h5>
            <ul>
                <li>Cuando no conozcas las dependencias exactas y los tipos de objetos que tu código va a manejar.</li>
                <li>Para desacoplar el código de creación de objetos del código cliente.</li>
                <li>Cuando quieras que los usuarios puedan extender componentes sin modificar la lógica interna.</li>
            </ul>
        </div>

        <div class="section-summary">
            <h5>Pros y Contras</h5>
            <ul>
                <li><strong>Pros:</strong> Reduce el acoplamiento, mejora la extensibilidad y el mantenimiento del código.</li>
                <li><strong>Contras:</strong> Puede llevar a un aumento en la complejidad del código, ya que requiere la creación de muchas subclases.</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
