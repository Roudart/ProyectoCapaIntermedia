<?php
        include_once 'conexionPHP.php';
        header("Content-Type: text/plain");
        $connet = mysqli_connect($serverName, $userName, $password, $dataBase);
        $idUser= $_POST['idUsuario'];
        $tipoUser= $_POST['tipoUsuario'];
        $sql = "Call CambiarTipoUsuario('$idUser', '$tipoUser')";
        $result = mysqli_query($connet, $sql);
        if($result){
            mysqli_close($connet);
            echo "exito";
        }
        else
        { 
            echo "Algo salió mal";
        }
 ?>