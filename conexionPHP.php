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
      
      $sqlQuery = "call SaludoDB;";
      $result = mysqli_query($connet, $sqlQuery);
      if (!$result) {
        echo("Error description: " . $connet -> error);
      }else{
        while($newRow = mysqli_fetch_array($result))
        echo($newRow["Hola Mundo soy una base de datos de MYSQL"]);
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
                    $ArregloUsuarios[0][$i] = $newRow["IdUsuario"];
                    $ArregloUsuarios[1][$i] = $newRow["TipoUsuario"];
                    $ArregloUsuarios[2][$i] = $newRow["NombreCompleto"];
                    $i++;
                }
                return $ArregloUsuarios;
        }
      }

?>