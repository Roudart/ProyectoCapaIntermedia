<?php
include 'conexionPHP.php';
header("Content-Type: text/plain");
$Conexion = new Conexion();
$Usuario = $_POST["Usuario"];
$Curso = $_POST["Curso"];
$Resena = $_POST["Reseña"];
$Respuesta = $Conexion->CrearComentario($Usuario, $Resena, $Curso);
if($Respuesta != null)
    return $Respuesta;
echo null;
?>