<?php
    include 'conexionPHP.php';
    header("Content-Type: text/plain");
    $connection = new Conexion();


    $Correo = $_POST["correoIni"];
    $Contra = $_POST["contraIni"];

    $sqlQuery = "call IniciarSesion('$Correo','$Contra')";
    $result = mysqli_query($connection->connet, $sqlQuery);
    if($result){
        session_start();
        while($newRow = mysqli_fetch_array($result)){
            $_SESSION["IDUser"] = $newRow["IdUsuario"];
        }
        header("Location: index.php");
    }
    else{
        echo $connexion->connet -> error;
    }
?>