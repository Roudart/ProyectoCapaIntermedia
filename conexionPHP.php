<?php
class Conexion
{
  public $serverName;
  public $dataBase;
  public $userName;
  public $connet;

  function __construct()
  {
    $this->serverName     = "localhost";
    $this->dataBase       = "shademydb";
    $this->userName       = "root";
    $this->password       = "2dumb2live";
    $this->connet = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dataBase);
    if ($this->connet->connect_errno) {
      echo "Failed to connect to MySQL: " . $this->connet->connect_error;
      exit();
    }
  }

  function GreetingsDB()
  {
    $sqlQuery = "call SaludoDB;";
    $result = mysqli_query($this->connet, $sqlQuery);
    if (!$result) {
      echo ("Error description: " . $this->connet->error);
    } else {
      $i = 0;
      while ($newRow = mysqli_fetch_array($result)) {
        $ArregloUsuarios["Saludo"] = $newRow["Hola Mundo soy una base de datos de MYSQL"];
        $i++;
        echo $ArregloUsuarios["Saludo"];
      }
    }
  }

  function __destruct()
  {
    $this->connet->close();
  }

  function BuscarUsuariosManager()
  {
    $ArregloUsuarios = array();
    $sqlQuery = "call TraerUsuariosManager;";
    $result = mysqli_query($this->connet, $sqlQuery);
    if (!$result) {
      echo ("Error description: " . $this->connet->error);
    } else {
      $i = 0;
      while ($newRow = mysqli_fetch_array($result)) {
        $ArregloUsuarios[$i][0] = $newRow["IdUsuario"];
        $ArregloUsuarios[$i][1] = $newRow["TipoUsuario"];
        $ArregloUsuarios[$i][2] = $newRow["NombreCompleto"];
        $i++;
      }
      return $ArregloUsuarios;
    }
  }

  function BuscarUsuario($id)
  {
    $sql = "call BuscarUsuario($id);";
    $result = mysqli_query($this->connet, $sql);
    if (!$result) {
      echo ("Error description: " . $this->connet->error);
    } else {
      while ($newRow = mysqli_fetch_array($result)) {
        $Usuario["TipoUsuario"] =       $newRow["TipoUsuario"];
        $Usuario["Nombre"] =            $newRow["Nombre"];
        $Usuario["ApellidoPaterno"] =   $newRow["ApellidoPaterno"];
        $Usuario["ApellidoMaterno"] =   $newRow["ApellidoMaterno"];
        $Usuario["Apodo"] =             $newRow["Apodo"];
        $Usuario["CorreoElectronico"] = $newRow["CorreoElectronico"];
        $Usuario["Imagen"] =            $newRow["Imagen"];
      }
      return $Usuario;
    }
  }

  function BuscarFotoUsuario($id)
  {
    $sql = "call BuscarFotoUsuario($id);";
    $result = mysqli_query($this->connet, $sql);
    if (!$result) {
      echo ("Error description: " . $this->connet->error);
    } else {
      while ($newRow = mysqli_fetch_array($result)) {
        $ImageURL = $newRow["Imagen"];
      }
      if (!isset($ImageURL) || $ImageURL === null || $ImageURL ==='')
        return 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_411076.png&f=1&nofb=1';
      return $ImageURL;
    }
  }

  function CrearCategoria($NombreCategoria, $ColorCategoria)
  {
    $sql = "call CrearCategoria('$NombreCategoria', '$ColorCategoria');";
    $result = mysqli_query($this->connet, $sql);
    if (!$result) {
      echo ("Error description: " . $this->connet->error);
    } else {
      while ($newRow = mysqli_fetch_array($result)) {
        $IdCategoria = $newRow["IdCategoria"];
      }
      return '<p>' . $IdCategoria . '>';
    }
  }

  function TraerCategorias()
  {
    $sql = "SELECT IdCategoria, Nombre, Color FROM categoria ORDER BY IdCategoria ASC;";
    $result = mysqli_query($this->connet, $sql);
    if (!$result) {
      echo ("Error description: " . $this->connet->error);
    } else {
      $Categorias = array();
      $i = 0;
      while ($newRow = mysqli_fetch_array($result)) {
        $Categorias[$i]["IdCategoria"] = $newRow["IdCategoria"];
        $Categorias[$i]["Nombre"] = $newRow["Nombre"];
        $Categorias[$i]["Color"] = $newRow["Color"];
        $i++;
      }
      return $Categorias;
    }
  }

  function EliminarUsuario($idUser)
  {
    $sql = "Call DeleteUser('$idUser')";
    $result = mysqli_query($this->connet, $sql);
    if ($result) {
      echo "exito";
    } else {
      echo "Algo salió mal";
    }
  }

  function ActualizarTipoUsuario($idUser, $tipoUser)
  {
    $sql = "Call CambiarTipoUsuario('$idUser', '$tipoUser')";
    $result = mysqli_query($this->connet, $sql);
    if ($result) {
      echo "exito";
    } else {
      echo "Algo salió mal";
    }
  }


  function TraerCurso($id){
    $sql = 
    "SELECT C.IdCurso, C.IdMaestro, C.Nombre, C.Descripción, C.Precio, C.Aprobado, C.ImagenURL,
    CONCAT_WS(' ', U.Nombre, U.ApellidoPaterno, U.ApellidoMaterno) AS NombreMaestro, 
    U.CorreoElectronico, U.Imagen 
    FROM curso as C
    INNER JOIN usuario as U 
    ON C.IdMaestro = U.IdUsuario
    WHERE IdCurso = $id";
    $result = mysqli_query($this->connet, $sql);
    if(!$result){
      echo ("Error description: " . $this->connet->error);
    }else{
      while ($newRow = mysqli_fetch_array($result)){
        $Curso["IdCurso"] = $newRow["IdCurso"];
        $Curso["IdMaestro"] = $newRow["IdMaestro"];
        $Curso["Nombre"] = $newRow["Nombre"];
        $Curso["Descripción"] = $newRow["Descripción"];
        $Curso["Precio"] = $newRow["Precio"];
        $Curso["Aprobado"] = $newRow["Aprobado"];
        $Curso["NombreMaestro"] = $newRow["NombreMaestro"];
        $Curso["CorreoElectronico"] = $newRow["CorreoElectronico"];
        $Curso["Imagen"] = $newRow["Imagen"];
        $Curso["ImagenURL"] = $newRow["ImagenURL"];
      }
      return $Curso;
    }
  }

  function TrearTemas($id){
    $sql = "SELECT * FROM TEMA WHERE IdCurso = $id;";
    $result = mysqli_query($this->connet, $sql);
    if(!$result){
      echo("Error description: ". $this->connet->error);
    }else{
      $Temas = array();
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $Temas[$i]["IdTema"] = $newRow["IdTema"];
        $Temas[$i]["Nombre"] = $newRow["Nombre"];
        $Temas[$i]["Descripción"] = $newRow["Descripción"];
        $Temas[$i]["NumTema"] = $newRow["NumTema"];
        $Temas[$i]["IdCurso"] = $newRow["IdCurso"];
        $i++;
      }
      return $Temas;
    }
  }

  function TraerRequisitos($id){
    $sql = "SELECT * FROM requisito WHERE IdCurso = $id;";
    $result = mysqli_query($this->connet, $sql);
    if(!$result){
      echo("Error description: ". $this->connet->error);
    }else{
      $Requisitos = array();
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $Requisitos[$i]["IdRequisito"] = $newRow["IdRequisito"];
        $Requisitos[$i]["IdCurso"] = $newRow["IdCurso"];
        $Requisitos[$i]["Nombre"] = $newRow["Nombre"];
        $i++;
      }
      return $Requisitos;
    }
  }

  function TraerCategoriasCurso($id){
    $sql = 
    "SELECT CC.IdCurso, C.IdCategoria, C.Nombre, C.Color FROM categoria as C
    INNER JOIN cursocategoria as CC
    ON CC.IdCategoria = C.IdCategoria
    WHERE CC.IdCurso = $id;";
    $result = mysqli_query($this->connet, $sql);
    if(!$result){
      echo("Error description: ". $this->connet->error);
    }else{
      $Categoria = array();
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $Categoria[$i]["IdCurso"] = $newRow["IdCurso"];
        $Categoria[$i]["IdCategoria"] = $newRow["IdCategoria"];
        $Categoria[$i]["Nombre"] = $newRow["Nombre"];
        $Categoria[$i]["Color"] = $newRow["Color"];
        $i++;
      }
      return $Categoria;
    }
  }

  function TraerCursos(){
    $sql = "SELECT IdCurso, Nombre, Descripción, ImagenURL FROM curso;";
    $result = mysqli_query($this->connet, $sql);
    if(!$result){
      echo("Error description: ". $this->connet->error);
    }else{
      $Curso = array();
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $Curso[$i]["IdCurso"] = $newRow["IdCurso"];
        $Curso[$i]["Nombre"] = $newRow["Nombre"];
        $Curso[$i]["Descripción"] = $newRow["Descripción"];
        $Curso[$i]["ImagenURL"] = $newRow["ImagenURL"];
        $i++;
      }
      return $Curso;
    }
  }

  function TraerCursosCategoria($IdCategoria){
    $sql = "CALL TraerCursosCategoria($IdCategoria);";
    $result = mysqli_query($this->connet, $sql);
    if(!$result){
      echo("Error description: ". $this->connet->error);
    }else{
      $Curso = array();
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $Curso[$i]["IdCurso"] = $newRow["IdCurso"];
        $Curso[$i]["Nombre"] = $newRow["Nombre"];
        $Curso[$i]["Descripción"] = $newRow["Descripción"];
        $Curso[$i]["ImagenURL"] = $newRow["ImagenURL"];
        $i++;
      }
      return $Curso;
    }
  }

  function MasVendidos(){
    $sql = "CALL MasVendidos();";
    $result = mysqli_query($this->connet, $sql);
    if(!$result){
      echo("Error description: ". $this->connet->error);
    }else{
      $Curso = array();
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $Curso[$i]["Compras"] = $newRow["Compras"];
        $Curso[$i]["IdCurso"] = $newRow["IdCurso"];
        $Curso[$i]["Nombre"] = $newRow["Nombre"];
        $Curso[$i]["Descripción"] = $newRow["Descripción"];
        $Curso[$i]["Precio"] = $newRow["Precio"];
        $Curso[$i]["ImagenURL"] = $newRow["ImagenURL"];
        $Curso[$i]["Estado"] = $newRow["Estado"];
        $Curso[$i]["TotalVentas"] = $newRow["TotalVentas"];
        $i++;
      }
      return $Curso;
    }
  }
  
  function MasRecientes(){
    $sql = "CALL MasRecientes();";
    $result = mysqli_query($this->connet, $sql);
    if(!$result){
      echo("Error description: ". $this->connet->error);
    }else{
      $Curso = array();
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $Curso[$i]["IdCurso"] = $newRow["IdCurso"];
        $Curso[$i]["Nombre"] = $newRow["Nombre"];
        $Curso[$i]["Descripción"] = $newRow["Descripción"];
        $Curso[$i]["ImagenURL"] = $newRow["ImagenURL"];
        $Curso[$i]["Hace"] = $newRow["Hace"];
        $i++;
      }
      return $Curso;
    }
  }

  function MejorCalificados(){
    $sql = "CALL MejorCalificados();";
    $result = mysqli_query($this->connet, $sql);
    if(!$result){
      echo("Error description: ". $this->connet->error);
    }else{
      $Curso = array();
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $Curso[$i]["IdCurso"] = $newRow["IdCurso"];
        $Curso[$i]["Nombre"] = $newRow["Nombre"];
        $Curso[$i]["Descripción"] = $newRow["Descripción"];
        $Curso[$i]["ImagenURL"] = $newRow["ImagenURL"];
        $Curso[$i]["Promedio"] = $newRow["Promedio"];
        $i++;
      }
      return $Curso;
    }
  }

  function TraerCursosPendientes($IdUsuario){
    $sql = "CALL TraerCursosPendientes($IdUsuario);";
    $result = mysqli_query($this->connet, $sql);
    if($result){
      $CursoPendiente = array();
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $CursoPendiente[$i]["IdCurso"] = $newRow["IdCurso"];
        $CursoPendiente[$i]["Nombre"] = $newRow["Nombre"];
        $CursoPendiente[$i]["Estado"] = $newRow["Estado"];
        $CursoPendiente[$i]["Avance"] = $newRow["Avance"];
        $i++;
      }
      return $CursoPendiente;
    }else{
      echo "Error description: ". $this->connet->error;
    }
  }

  function AgregarCursoUsuario($IdCurso, $IdUsuario, $Estado){
    $sql = "call AgregarCursoUsuario($IdCurso,$IdUsuario,$Estado);";
    $result = mysqli_query($this->connet, $sql);
    if($result){
      $respuesta = mysqli_fetch_array($result);
      return $respuesta["Respuesta"];
    }else{
      return 'Falla!';
    }
  }

  function EstadoCursoUsuario($IdCurso, $IdUsuario){
    $sql = "SELECT Estado FROM usuariocurso WHERE IdCurso = $IdCurso AND IdUsuario = $IdUsuario;";
    $result = mysqli_query($this->connet, $sql);
    if($result){
      $respuesta = mysqli_fetch_array($result);
      if(isset($respuesta))
        return $respuesta["Estado"];
      return null;
    }else{
      return "Error description: ". $this->connet->error;
    }
  }

  function CalificarCurso($Curso, $Usuario, $Calificacion){
    $sql = "CALL CalificarCurso($Curso,$Usuario, $Calificacion);";
    $result = mysqli_query($this->connet, $sql);
    if($result){
      return 0;
    }else{
      return "Error description: ". $this->connet->error;
    }
  }

  function CalificacionUsuarioCurso($Curso,$Usuario){
    $sql = "CALL CalificacionUsuarioCurso($Curso, $Usuario);";
    $result = mysqli_query($this->connet, $sql);
    if($result){
      while($newRow = mysqli_fetch_array($result)){
        $Respuesta = $newRow;
      }
      if($Respuesta != null)
        return $Respuesta;
      return $Respuesta;
    }
    else {
      return "Error description: ". $this->connet->error;
    }
  }

}
