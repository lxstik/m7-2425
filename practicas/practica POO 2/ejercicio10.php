<?php

// Crea una classe Producto amb atributs com nom i preu
class Producto
{
    public string $nombre;
    public float $precio;

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

$productos = [
    new Producto("Fresas", 5.99),
    new Producto("Móvil", 599.99),
    new Producto("Chanclas", 9.99),
    new Producto("Libreta", 3.50),
    new Producto("Ratón", 39.99)
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($productos as $producto) {
                echo "<tr>";
                echo "<td>" . $producto->getNombre() . "</td>";
                echo "<td>" . $producto->getPrecio() . " €</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>