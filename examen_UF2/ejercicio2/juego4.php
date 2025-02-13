<?php

//creo una clase Inversion con las variables cantidad e interes. la variable interes por defecto es 0.05%
class Inversion
{
    public $cantidad;
    public $interes;

    public function __construct($cantidad, $interes = 0.05)
    {
        $this->cantidad = $cantidad;
        $this->interes = $interes;
    }

    //creo una funcion calcularGanancias que se ocuparía de calcular las ganancias de la inversion multiplicando la cantidad por el interes elevado a la potencia de los años
    public function calcularGanancias($años)
    {
        return $this->cantidad * pow(1 + $this->interes, $años);
    }
}

//por defecto las ganancias son 0
$ganancias = 0;

//cuando envio el formulario por POST recojo la cantidad de los años y dinero invertido y llamo a la funcion calcularGanancias para ver las ganancias dentro del futuro
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cantidad']) && isset($_POST['años'])) {
    $cantidad = $_POST['cantidad'];
    $años = intval($_POST['años']);
    $inversion = new Inversion($cantidad);
    $ganancias = $inversion->calcularGanancias($años);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Simulación de Inversión</title>
</head>

<body>
    <h1>Simulación de Inversión</h1>
    <form method="post">
        <label for="cantidad">Cantidad a invertir:</label>
        <input type="number" id="cantidad" name="cantidad" step="0.01" required>
        <br>
        <label for="años">Años:</label>
        <input type="number" id="años" name="años" required>
        <br>
        <button type="submit">Calcular Ganancias</button>
    </form>
    <?php
    //utilizo number_format para redondeat el resultado a solo 2 decimales
    echo '<p>Ganancias finales después de ' . $_POST['años'] . ' años: ' . number_format($ganancias, 2) . ' €</p>';
    ?>
</body>

</html>