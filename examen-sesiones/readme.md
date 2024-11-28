#PREGUNTAS Y RESPUESTAS

1. Include y require son completamente iguales, pero require detiene la ejecución del script si hay un error. (V/F)

Respuesta: verdadero




2. La función isset($_POST['campo']) se utiliza para verificar si un campo del formulario fue enviado en una solicitud POST. (V/F)

Respuesta: verdadero




3. La función unset se utiliza para eliminar variables o elementos de un array en PHP. (V/F)

Respuesta: verdadero




4. Un CRUD básico sigue siempre el orden: Create, Delete, Read, Update. (V/F)

Respuesta: falso




5. Las sesiones permiten almacenar información temporal del usuario en el servidor y pueden destruirse manualmente con session_destroy(). (V/F)

Respuesta: verdadero




6. La función header('Location: ...') redirige al usuario a otra página y detiene la ejecución del script automáticamente. (V/F)

Respuesta: verdadero




7. Los operadores ternarios en PHP permiten simplificar condicionales en una única línea de código. (V/F)

Respuesta: verdadero




8. Separar la lógica PHP del HTML facilita el mantenimiento y la escalabilidad del código. (V/F)

Respuesta: verdadero




9. Si se omite el atributo action en un formulario, los datos se envían a la misma página donde está el formulario. (V/F)

Respuesta: verdadero




10. El método HTTP POST es más adecuado para formularios grandes o datos sensibles porque no expone la información en la URL. (V/F)

Respuesta: verdadero




11. El siguiente formulario enviará un nombre por post a bienvenido.php. (V/F)
<form action=”bienvenido.php” method="POST">
    <input type="text" placeholder="Nombre">
    <button type="submit">Enviar</button>
</form>

Respuesta: falso




12. El siguiente código guardará el nombre en una sesión. (V/F)
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $_SESSION['nombre'] = $_GET['nombre'];
}
<form action=”bienvenido.php” method="POST">
    <input type="text" name=”nombre” placeholder="Nombre">
    <button type="submit">Enviar</button>
</form>


Respuesta: falso




13. El siguiente código tiene un error. (V/F)
session_start();
$_SESSION[‘email’] = $_POST[“email”]
if ($_POST['email']) {
    echo ‘<h2> Bienvenido ‘ . $_POST['email'] . ‘ !!! </h2>’ ;
}

Respuesta: falso




14. Este código PHP tiene 3 errores. (V/F)
$username = “Rodrigo”;
<header>Bienvenido <? username ?> 

Respuesta: verdadero




15. El siguiente formulario HTML tiene un error y no enviará datos. (V/F)
<form method="POST" action="procesar.php">
    <input type="text" name="usuario" placeholder="Usuario">
    <button type="submit">Enviar</button>
</form>

Respuesta: falso