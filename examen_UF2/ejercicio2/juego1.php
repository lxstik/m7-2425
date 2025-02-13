<?php
session_start();

class ParaulaOculta
{
    public $palabra;
    public $letrasAcertadas = [];

    public function __construct($palabra)
    {
        $this->palabra = $palabra;
    }

    public function comprovarLletra($letra)
    {
        //comprueba si la letra esta dentro de la palabra oculta, en el caso de que esta dentro, añade esta misma letra en el array de las letras acertadas
        if (strpos($this->palabra, $letra) !== false && !in_array($letra, $this->letrasAcertadas)) {
            $this->letrasAcertadas[] = $letra;
        }
    }

    public function mostrarProgres()
    {
        //creamos un array donde se almacene el progreso de acertadas y las que faltan por acertar de la palabra oculta
        $progresoArray = [];
        //recorro la palabra oculta con bucle desde la posicion 0 hasta la longitud de la palabra
        for ($i = 0; $i < strlen($this->palabra); $i++) {
            //obtengo la letra de la posición i de la palabra oculta y la almaceno en la variable $letra
            $letra = $this->palabra[$i];
            //si la letra esta en el array de las letras acertadas, meto esta letra en el array de progreso
            if (in_array($letra, $this->letrasAcertadas)) {
                $progresoArray[] = $letra;
                //en otro caso meto la barra baja en el array progreso, que señala las letras que aun estan por acertar
            } else {
                $progresoArray[] = '_';
            }
        }
        //creo la variable progreso que me servira para mostrar el progreso de la palabra oculta
        $progreso = '';
        //recorro el array del progreso caracter por caracter
        foreach ($progresoArray as $caracter) {
            //meto el caracter en la variable progreso, concatenando
            $progreso = $progreso . $caracter;
        }
        //devuelvo el progreso de la palabra
        return $progreso;
    }
}

//si no existe la variable de sesion de juego, la creo con una palabra oculta, en mi caso he decidido poner la palabra "albertponmeundiez"
if (!isset($_SESSION['juego'])) {
    $_SESSION['juego'] = new ParaulaOculta('albertponmeundiez');
}
//almaceno la variable de sesion en la variable juego
$juego = $_SESSION['juego'];

//si el modo de envio es POST, recojo la letra introducida y compruebo si esta en la palabra oculta
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $letra = $_POST['lletra'];
    $juego->comprovarLletra($letra);
    $_SESSION['juego'] = $juego;
}
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Adivina la palabra</title>
</head>

<body>
    <h1>Adivina la palabra</h1>
    <p>Progreso: <?php echo $juego->mostrarProgres(); ?></p>
    <form method="post">
        <label for="lletra">Introduce una letra:</label>
        <input type="text" id="lletra" name="lletra" maxlength="1" required>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>