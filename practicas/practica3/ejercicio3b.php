<?php
$frutas = [
    ["nombre"=>"Maracuyá","imagen"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4F1A39Wrh_2hc_pwLVF9S7XCVWWujd5P9QQ&s"],
    ["nombre"=>"Lichi","imagen"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrfiHXO8oAP0Qz9froK6z6pDWWEHnWJZ2uCA&s"],
    ["nombre"=>"Carambola","imagen"=>"https://www.absolutdrinks.com/wp-content/uploads/ingredient_carambola_1x1_c33856d40a52b8d5367a5156d4eeb415.jpg"],
    ["nombre"=>"Mangostán","imagen"=>"https://www.elmundoforestal.com/wp-content/uploads/2020/09/mangostan.jpg"],
    ["nombre"=>"Kumquat","imagen"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS62ncxcX0_MQhUmcV5-qQ4VN9fX9_m2k-ZLQ&s"]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frutas favoritas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Selecciona tu fruta favorita</h1>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Fruta</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            
            <tbody>    
            <?php
                foreach($frutas as $fruta){
                    
                    
                        
                        if(isset($_GET['nom']) && $_GET['nom'] == $fruta['nombre']){
                            echo '
                            <tr class="table-success">
                                <td>'. $fruta['nombre'].'</td>
                                <td class="seleccion">✔️ seleccionada</td>
                                <td><a class="btn btn-primary" href="?nom='. $fruta['nombre'] .'&img='. $fruta['imagen'] .'">Seleccionar</a></td>
                            </tr>';
                        }else{
                            echo '
                            <tr class="table-danger">
                                <td>'. $fruta['nombre'].'</td>
                                <td class="seleccion">✖ No seleccionada</td>
                                <td><a class="btn btn-primary" href="?nom='. $fruta['nombre'] .'&img='. $fruta['imagen'] .'">Seleccionar</a></td>
                            </tr>';
                        }           
                }
            ?>
            </tbody>
        </table>

        <!-- Mostrar tarjeta de la fruta seleccionada -->
        <?php
            if(isset($_GET['nom']) && isset($_GET['img'])){
                $nomfruta = $_GET['nom'];
                $imgfruta = $_GET['img'];
                echo '
                    <div class="card mt-4 w-25 shadow-lg">
                        <img src="'. $imgfruta .'" class="card-img-top img-fluid" alt="'. $nomfruta .'">
                        <div class="card-body bg-warning">
                            <h5 class="card-title">'. $nomfruta .'</h5>
                            <p class="card-text">¡Esta es tu fruta favorita!</p>
                        </div>
                    </div>
                ';
            };
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>