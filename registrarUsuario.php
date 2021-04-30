<?php
      $serverName     = "localhost";
      $dataBase       = "shademydb";
      $userName       = "root";
      $password       = "m41sql";

      $connet = mysqli_connect($serverName, $userName, $password, $dataBase);
      if ($connet -> connect_errno) {
        echo "Failed to connect to MySQL: " . $connet -> connect_error;
        exit();
      }

      $Nombre = $_POST["nomReg"];
      $ApeP = $_POST["ApePReg"];
      $ApeM = $_POST["ApeMReg"];
      $Apod = $_POST["apoReg"];
      $Correo = $_POST["correoReg"];
      $Contra = $_POST["contraReg"];

      $sqlQuery = "call RegistrarUsuario('$Nombre','$ApeP','$ApeM','$Apod','$Correo','$Contra')";
      $result = mysqli_query($connet, $sqlQuery);
      if ($result) {
        echo("funcionó");
      }else{
        echo("valió queso");
      }
?>