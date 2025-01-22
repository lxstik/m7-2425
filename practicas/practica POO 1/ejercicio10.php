<?php

// Definim la classe Animal
class Animal
{
    public string $nombre;
    public string $tipo;

    public function __construct($nombre, $tipo)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }

    public function describir()
    {
        return "L'animal és un " . $this->tipo . " anomenat " . $this->nombre . ".";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];

    $animal = new Animal($nombre, $tipo);
    $descripcio = $animal->describir();
}

?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripció d'Animal</title>
</head>

<body>

    <h1>Formulari per descriure un Animal</h1>

    <form method="post" action="">
        <label for="nombre">Nom de l'animal:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="tipo">Tipus d'animal:</label>
        <input type="text" id="tipo" name="tipo" required><br><br>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($descripcio)) {
        echo "<h2>Descripció:</h2>";
        echo "<p>" . $descripcio . "</p>";
    }
    ?>

</body>

</html>