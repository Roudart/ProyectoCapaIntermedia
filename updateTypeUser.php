<?php
        include_once 'conexionPHP.php';
        $Conection = new Conexion();
        header("Content-Type: text/plain");
        $connet = mysqli_connect($serverName, $userName, $password, $dataBase);
        $idUser= $_POST['idUsuario'];
        $tipoUser= $_POST['tipoUsuario'];
        echo $Conection->ActualizarTipoUsuario($idUser, $tipoUser);
 ?>