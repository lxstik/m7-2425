<!-- generarTabla($productos){
    table
    foreach as producto
    echo tr
    <>
        td
        $producto['nombre']

    

    </>
} -->

<?php

function generarTabla(&$productos)
{
    // agregar productos si se reciben datos con metodo post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productoNuevo = [
            "nombre" => $_POST['nombre'],
            "precio" => $_POST['precio'],
            "disponibilidad" => $_POST['disponibilidad'],
        ];
    }





    // mostrar la tabla
    echo "<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Disponibilidad</th>
                </tr>
            </thead>
            <tbody>";

    foreach ($productos as $producto) {
        echo "<tr>
                <td>" . $producto['nombre'] . "</td>
                <td>" . $producto['precio'] . "</td>";

        if ($producto['disponibilidad'] == true) {
            echo "
                        <td>Hay en stock</td>
                    ";
        } else {
            echo "
                        <td>No hay en stock</td>
                    ";
        }

        echo "</tr>";
    }

    echo "</tbody></table>";
}



function muestraInfoContacto($nombre, $telefono, $foto)
{
    // verificar si se mando furmulario con el boton
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $imagen = $_POST['imagen'];
    }

    // Mostrar la información
    echo "
        <h1>Hola, $nombre</h1>
        <p>Su número de teléfono es: $telefono</p>
        <img src='$imagen'>
    ";
}



?>