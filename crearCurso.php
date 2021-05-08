<?php
    include 'conexionPHP.php';
    header("Content-Type: text/plain");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        if(isset($_SESSION["IDUser"]))
            $idUsuario = $_SESSION["IDUser"];
     }

    $connection = new Conexion();

    echo $Titulo = $_POST["InputTitulo"];
    echo $Desc = $_POST["InputDescripcion"];
    echo $Precio = $_POST["PrecioInput"];

    $sqlQuery = "call CrearCurso($idUsuario,'$Titulo','$Desc', $Precio);";
    $result = mysqli_query($connection->connet, $sqlQuery);
    if ($result) {
        echo("Exito en crear Curso");
        while($newRow = mysqli_fetch_array($result)){
            $Curso = $newRow["IdCurso"];
        }
        $i=0;
        while( isset($_POST["InputNombreTema".$i]) ){
            echo 'Entramos a CrearTema';
            $connection2 = new Conexion();
            $NombreTema = $_POST["InputNombreTema".$i];
            $Desc = $_POST["TextAreaTema".$i];
            $Num = $i+1;
            $sqlQuery = "call CrearTema('$NombreTema','$Desc',$Num, $Curso);";
            $result = mysqli_query($connection2->connet, $sqlQuery);
            if($result){
                $i+=1;
                echo 'Exito en crear Tema';
                continue;
            }else{
                break;
            }
        }
        $i=0;
        while(isset($_POST["InputRequisito".$i])){
            echo 'Entramos a CrearRequisito';
            $connection3 = new Conexion();
            $NombreRequisito = $_POST["InputRequisito".$i];
            $sqlQuery = "call CrearRequisito($Curso,'$NombreRequisito');";
            $result = mysqli_query($connection3->connet, $sqlQuery);
            if($result){
                $i+=1;
                echo 'Exito en crear Requisito';
                continue;
            }else{
                break;
            }
            $i+=1;
        }
        $i=0;
        while(isset($_POST["Selected".$i])){
            echo 'Entramos a CrearCategoriaCurso';
            $connection4 = new Conexion();
            $NombreCategoria = $_POST["Selected".$i];
            $sqlQuery = "call AgregarCategoriaCurso($Curso,'$NombreCategoria');";
            $result = mysqli_query($connection4->connet, $sqlQuery);
            if($result){
                $i+=1;
                echo 'Exito en crear CategoriaCurso';
                continue;
            }else{
                break;
            }
            $i+=1;
        }
        echo 'exito';
    }

?>