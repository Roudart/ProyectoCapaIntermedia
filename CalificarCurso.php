<?php
include 'conexionPHP.php';
header("Content-Type: text/plain");
$Conexion = new Conexion();
$Usuario = $_POST["idUsuario"];
$Curso = $_POST["idCurso"];
$Calificacion = $_POST["Calificacion"];
if($Conexion->CalificarCurso($Curso, $Usuario, $Calificacion) ==0)
    echo "El usuario {$Usuario} califico el curso {$Curso} con {$Calificacion}";
?>