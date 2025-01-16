<?php
session_start();

class Persona
{
    public string $nombre;
    public int $edad;

    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    $persona = new Persona($nombre, $edad);

    echo "<h2>Detalles de la persona:</h2>";
    echo "Nombre: " . $persona->nombre . "<br>";
    echo "Edad: " . $persona->edad . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>
</head>

<body>
    <h1>Formulario de Persona</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" placeholder="Edad" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>