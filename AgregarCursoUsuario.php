<?php
    include 'conexionPHP.php';
    header("Content-Type: text/plain");
    $Conection = new Conexion();
    $IdCurso =$_POST["idCurso"];
    $IdUsuario =$_POST["idUsuario"];
    $Estado = $_POST["Estado"];
     if($Conection->AgregarCursoUsuario($IdCurso, $IdUsuario, $Estado) === "Insertado")
        echo 'exito';
     else
         echo 'Ya no se desea';
?>