<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center">
            <h1 class="mb-4">Hola, <?= $_SESSION['user']; ?></h1>
            <form action="logout.php" method="POST">
                <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</body>

</html>