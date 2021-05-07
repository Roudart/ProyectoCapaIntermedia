<?php
      include 'conexionPHP.php';
      header("Content-Type: text/plain");

      $connection = new Conexion();

      $Nombre = $_POST["nomReg"];
      $ApeP = $_POST["ApePReg"];
      $ApeM = $_POST["ApeMReg"];
      $Apod = $_POST["apoReg"];
      $Correo = $_POST["correoReg"];
      $Contra = $_POST["contraReg"];
      $ImageURL = $_POST["ImagePath"];

      $sqlQuery = "call RegistrarUsuario('$Nombre','$ApeP','$ApeM','$Apod','$Correo','$Contra','$ImageURL')";
      $result = mysqli_query($connection->connet, $sqlQuery);
      if ($result) {
        echo("funcionó");
        session_start();
        while($newRow = mysqli_fetch_array($result)){
          $_SESSION["IDUser"] = $newRow["IdUsuario"];}
        header("Location: index.php");
      }else{
        echo("valió queso");
      }
?>