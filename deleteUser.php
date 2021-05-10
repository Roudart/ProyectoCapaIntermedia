<?php
        include_once 'conexionPHP.php';
        $Conection = new Conexion();
        header("Content-Type: text/plain");
        $idUser= $_POST['idUsuario'];
        echo $Conection->EliminarUsuario($idUser);
 ?>