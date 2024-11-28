<?php
session_start();

$productos = [
    [
        "nombre" => "manzana",
        "precio" => "0.33€",
        "descripcion" => "es una manzana"
    ],
    [
        "nombre" => "leche",
        "precio" => "1.29€",
        "descripcion" => "un litro de leche"
    ],
    [
        "nombre" => "canelones",
        "precio" => "5.99€",
        "descripcion" => "pack de 6 canelones"
    ],
    [
        "nombre" => "zanahoria",
        "precio" => "0.20€",
        "descripcion" => "es naranja"
    ],
    [
        "nombre" => "mango",
        "precio" => "2.99€",
        "descripcion" => "bastante dulce"
    ]
];

if (!isset($_SESSION["productos"])) {
    $_SESSION["productos"] = $productos;
}

function agregar()
{
    foreach ($_SESSION['productos'] as $producto) {
        echo '
            <tr>
                <td>' . $producto['nombre'] . '</td>
                <td>' . $producto['precio'] . '</td>
                <td>' . $producto['descripcion']. '</td>
            </tr>
        ';
    }
}
