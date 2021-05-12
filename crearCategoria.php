<?php
    include 'conexionPHP.php';
    header("Content-Type: text/plain");
    $connet = new Conexion();

    $NombreCategoria= $_POST['InputCategoria'];
    $ColorCategoria= $_POST['ColorInputCategoria'];
    return $connet->CrearCategoria($NombreCategoria, $ColorCategoria);

?>