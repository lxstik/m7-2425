<?php
session_start();

//creo la clase Tarea y variables nombre y completada. La variable completada por defecto es false
class Tarea
{
    public $nombre;
    public $completada;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->completada = false;
    }
}

//creo la clase GestorTareas y el array tareas
class GestorTareas
{   //creo el array tareas
    public $tareas = [];
    //creo la funcion agregarTarea que añade una tarea al array tareas
    public function agregarTarea($nombre)
    {
        $this->tareas[] = new Tarea($nombre);
    }
    //creo la funcion completarTarea que marca una tarea como completada
    public function completarTarea($index)
    {
        if (isset($this->tareas[$index])) {
            $this->tareas[$index]->completada = true;
        }
    }
    //creo la funcion obtenerTareas que devuelve el array tareas
    public function obtenerTareas()
    {
        return $this->tareas;
    }
}

// en el caso de que no exista la variable de sesion gestorTareas, la creo con un nuevo objeto de la clase GestorTareas
if (!isset($_SESSION['gestorTareas'])) {
    //utilizo serialize para almacenar el objeto en la variable de sesion
    $_SESSION['gestorTareas'] = serialize(new GestorTareas());
}

// deserializo la variable de sesion gestorTareas para almacenarla en la variable gestorTareas
$gestorTareas = unserialize($_SESSION['gestorTareas']);

// utilizo POST para enviar el formulario de agregar tarea
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombreTarea'])) {
    $gestorTareas->agregarTarea($_POST['nombreTarea']);
    $_SESSION['gestorTareas'] = serialize($gestorTareas);
}

// cuando se mande el nombre de la tarea a completar, llamo a la funcion completarTarea que marca la tarea como completada cambiando el valor de completada a true
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['completarTarea'])) {
    $gestorTareas->completarTarea($_POST['completarTarea']);
    $_SESSION['gestorTareas'] = serialize($gestorTareas);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
</head>

<body>
    <h1>Lista de Tareas</h1>
    <form method="post">
        <label for="nombreTarea">Nombre de la tarea:</label>
        <input type="text" id="nombreTarea" name="nombreTarea" required>
        <button type="submit">Agregar Tarea</button>
    </form>
    <ul>

        <?php
        //recorro el array de tareas para mosrtarlas en una lista
        foreach ($gestorTareas->obtenerTareas() as $index => $tarea) {
            echo '<li>';
            echo $tarea->nombre;
            //en el caso de que la tarea esté marcada como completada, muestro un mensaje de tarea completada. en otro caso se crea un formulario que permite la opcion de marcarla como completada
            if ($tarea->completada) {
                echo ' (Completada)';
            } else {
                echo '<form method="post" style="display:inline;">';
                echo '<input type="hidden" name="completarTarea" value="' . $index . '">';
                echo '<button type="submit">Completar</button>';
                echo '</form>';
            }
            echo '</li>';
        } ?>
    </ul>
</body>

</html>