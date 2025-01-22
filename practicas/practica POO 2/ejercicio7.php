<?php
class User
{
    public string $nombre;
    public int $edad;

    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function describir(): string
    {
        return "Hola, " . $this->nombre . ", tienes " . $this->edad . " años.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    $user = new User($nombre, $edad);
    $descripcio = $user->describir();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <h1>Formulario de Usuario</h1>

    <form method="post" action="">
        <label for="nombre">Nombre de usuario:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>

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