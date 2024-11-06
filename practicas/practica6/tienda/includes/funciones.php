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
    // Si se recibe una solicitud POST, agregar un nuevo producto
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibir los datos del nuevo producto
        $productoNuevo = [
            "nombre" => $_POST['nombre'],
            "precio" => $_POST['precio'],
            "disponibilidad" => $_POST['disponibilidad']
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
                <td>" . htmlspecialchars($producto['nombre']) . "</td>
                <td>" . number_format($producto['precio'], 2) . "</td>
                <td>" . htmlspecialchars($producto['disponibilidad']) . "</td>
              </tr>";
    }

    echo "</tbody></table>";
}




function muestraInfoContacto($nombre, $telefono, $foto)
{
    // Verificar si el formulario se envió
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $imagen = $_POST['imagen'];
    }

    // Mostrar la información
    echo "
        <h1>Hola, $nombre</h1>
        <p>Su número de teléfono es: $telefono</p>
        <img src='$imagen' alt='Foto de $nombre'>
    ";
}
?>