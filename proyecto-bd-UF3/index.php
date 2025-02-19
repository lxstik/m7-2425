<?php
// Fetch all clients
$result = $mysqli->query("SELECT * FROM clientes ORDER BY id DESC");

print_r($result);


//docker linea 5: RUN docker-php-exit-install mysqli pdb_mysql
?>