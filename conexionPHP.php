<?php   
      $serverName     = "localhost";
      $dataBase       = "shademydb";
      $userName       = "root";
      $password       = "2dumb2live";

      $connet = mysqli_connect($serverName, $userName, $password, $dataBase);
      if ($connet -> connect_errno) {
        echo "Failed to connect to MySQL: " . $connet -> connect_error;
        exit();
      }
      
      $sqlQuery = "SELECT * FROM usuario;";
      $result = mysqli_query($connet, $sqlQuery);
      if (!$result) {
        echo("Error description: " . $connet -> error);
      }else{
        while($newRow = mysqli_fetch_array($result)){
          echo $newRow["Nombre"];
          echo $newRow["TipoUsuario"];
      }
    }
      

    $connet -> close();


      function BuscarUsuariosManager(){
        $serverName     = "localhost";
        $dataBase       = "shademydb";
        $userName       = "root";
        $password       = "2dumb2live";
      $connet = mysqli_connect($serverName, $userName, $password, $dataBase);
      if ($connet -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connet -> connect_error;
          exit();
      }
      $ArregloUsuarios = array();
      $sqlQuery = "call TraerUsuariosManager;";
      $result = mysqli_query($connet, $sqlQuery);
      if (!$result) {
          echo("Error description: " . $connet -> error);
      }else{
              mysqli_close($connet);
                $i = 0;
                while($newRow = mysqli_fetch_array($result)){
                    $ArregloUsuarios[$i][0] = $newRow["IdUsuario"];
                    $ArregloUsuarios[$i][1] = $newRow["TipoUsuario"];
                    $ArregloUsuarios[$i][2] = $newRow["NombreCompleto"];
                    $i++;
                }
                return $ArregloUsuarios;
        }
      }

?>