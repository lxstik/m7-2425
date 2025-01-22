<?php

class Producto
{
    public string $nombre;
    public int $precio;

    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
}

// Crear algunos productos
$productos = [
    new Producto("Camiseta", 15.99),
    new Producto("Portátil", 899.99),
    new Producto("Zapatos", 49.99),
    new Producto("Libro", 12.50),
    new Producto("Auriculares", 89.99)
];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Productos</title>
</head>

<body>

    <h1>Lista de Productos</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($productos as $producto) {
                echo "<tr>";
                echo "<td>" . $producto->getNombre() . "</td>";
                echo "<td>" . $producto->getPrecio() . " 2€</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>