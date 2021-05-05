<?php 
class Conexion{
      public $serverName;
      public $dataBase;
      public $userName;
      public $connet;

      function __construct(){
        $this->serverName     = "localhost";
        $this->dataBase       = "shademydb";
        $this->userName       = "root";
        $this->password       = "2dumb2live";
        $this->connet = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dataBase);
        if ($this->connet -> connect_errno) {
          echo "Failed to connect to MySQL: " . $connet -> connect_error;
          exit();
        }
      }

      function GreetingsDB(){
        $sqlQuery = "call SaludoDB;";
        $result = mysqli_query($this->connet, $sqlQuery);
        if (!$result) {
          echo("Error description: " . $this->connet -> error);
        }else{
            $i = 0;
            while($newRow = mysqli_fetch_array($result)){
              $ArregloUsuarios["Saludo"] = $newRow["Hola Mundo soy una base de datos de MYSQL"];
              $i++;
              echo $ArregloUsuarios["Saludo"];
        }
        }
      }

      function __destruct(){
        $this->connet -> close();
      }

      function BuscarUsuariosManager(){
      $ArregloUsuarios = array();
      $sqlQuery = "call TraerUsuariosManager;";
      $result = mysqli_query($this->connet, $sqlQuery);
      if (!$result) {
          echo("Error description: " . $this->connet -> error);
      }else{
              mysqli_close($this->connet);
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
} 
?>