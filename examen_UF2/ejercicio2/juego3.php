<?php
session_start();

class CalculadoraJuego
{
    //creo las variables numero1, numero2, operacion y resultado
    public $numero1;
    public $numero2;
    public $operacion;
    public $resultado;

    //dentro del contructor defino numero1 y numero2 como los numeros aleatorios entre 1 y 10, operacion como el resultado de la funcion generarOperacion y resultado como el resultado de la funcion calcularResultado
    public function __construct()
    {
        $this->numero1 = rand(1, 10);
        $this->numero2 = rand(1, 10);
        $this->operacion = $this->generarOperacion();
        $this->resultado = $this->calcularResultado();
    }
    //genero la operacion aleatoria creando las operaciones de +, - y * y eligo una aleatoriamente con array_rand() y la devuelvo
    private function generarOperacion()
    {
        $operaciones = ['+', '-', '*'];
        return $operaciones[array_rand($operaciones)];
    }
    // creo una funcion que se ocupa de calcular el resultado de la operacion, dependiendo de cual sea la opcion random. devuelvo el resultado concreto con el switch
    private function calcularResultado()
    {
        switch ($this->operacion) {
            case '+':
                return $this->numero1 + $this->numero2;
            case '-':
                return $this->numero1 - $this->numero2;
            case '*':
                return $this->numero1 * $this->numero2;
        }
    }
    //creo una funcion que se ocupa de comprobar si la respuesta del usuario es correcta, comparando el resultado con el imput del usuario
    public function comprobarRespuesta($respuesta)
    {
        return $respuesta == $this->resultado;
    }
}

// inicializo la variable de sesion juego 
if (!isset($_SESSION['juego'])) {
    //uso serialize para almacenar el objeto en la variable dentro de la sesion
    $_SESSION['juego'] = serialize(new CalculadoraJuego());
    //por defecto las respuestas correctas son 0
    $_SESSION['correctas'] = 0;
}

// uso unserialize para deserializar la variable de sesion juego y almacenarla en la variable juego
if (isset($_SESSION['juego'])) {
    $juego = unserialize($_SESSION['juego']);
    //en otro caso creo un nuevo objeto de la clase CalculadoraJuego
} else {
    $juego = new CalculadoraJuego();
}

// si el evio es por POST y la respuesta existe, compruebo si la respuesta es correcta y muestro un mensaje, sumo correctas si la respuesta es correcta, si es incorrecta me enseña el resultado que tenía que estar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['respuesta'])) {
    if ($juego && $juego->comprobarRespuesta($_POST['respuesta'])) {
        $_SESSION['correctas']++;
        $mensaje = "¡Correcto!";
    } else {
        $mensaje = "Incorrecto. La respuesta correcta era " . ($juego ? $juego->resultado : 'N/A');
    }
    // otra vez uso serialize para almacenar el objeto en la variable de sesion juego
    $_SESSION['juego'] = serialize(new CalculadoraJuego());
    //deserializo la variable de sesion juego y la almaceno en la variable juego
    $juego = unserialize($_SESSION['juego']);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Juego de Calculadora</title>
</head>

<body>
    <h1>Juego de Calculadora</h1>
    <p>Responde a la siguiente operación:</p>
    <p><?php echo $juego->numero1 . " " . $juego->operacion . " " . $juego->numero2; ?></p>
    <form method="post">
        <label for="respuesta">Respuesta:</label>
        <input type="number" id="respuesta" name="respuesta" required>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if (isset($mensaje)) {
        echo '<p>' . $mensaje . '</p>';
    }
    ?>
    <p>Respuestas correctas: <?php echo $_SESSION['correctas']; ?></p>
</body>

</html>