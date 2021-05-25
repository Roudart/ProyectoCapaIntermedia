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
    $this->password       = "m41sql";
    $this->connet = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dataBase);
    if ($this->connet->connect_errno) {
      echo "Failed to connect to MySQL: " . $this->connet->connect_error;
      exit();
    }
  }

  function GreetingsDB()
  {
    $sqlQuery = "CALL SaludoDB;";
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
    $sqlQuery = "CALL TraerUsuariosManager;";
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
    $sql = "CALL BuscarUsuario($id);";
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
    $sql = "CALL BuscarFotoUsuario($id);";
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
    $sql = "CALL CrearCategoria('$NombreCategoria', '$ColorCategoria');";
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
    $sql = "SELECT IdCategoria, Nombre, Color FROM Categoria ORDER BY IdCategoria ASC;";
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
    $sql = "CALL DeleteUser('$idUser')";
    $result = mysqli_query($this->connet, $sql);
    if ($result) {
      echo "exito";
    } else {
      echo "Algo salió mal";
    }
  }

  function ActualizarTipoUsuario($idUser, $tipoUser)
  {
    $sql = "CALL CambiarTipoUsuario('$idUser', '$tipoUser')";
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
    FROM Curso as C
    INNER JOIN Usuario as U 
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
    $sql = "SELECT * FROM Tema WHERE IdCurso = $id;";
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
    $sql = "SELECT * FROM Requisito WHERE IdCurso = $id;";
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
    "SELECT CC.IdCurso, C.IdCategoria, C.Nombre, C.Color FROM Categoria as C
    INNER JOIN CursoCategoria as CC
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
    $sql = "SELECT IdCurso, Nombre, Descripción, ImagenURL FROM Curso;";
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

  function TraerCursoNombre($Busqueda){
    $sql = "SELECT * FROM Curso AS C
    WHERE C.Nombre LIKE '%$Busqueda%'";
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
        $Curso[$i]["Precio"] = $newRow["Precio"];
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
    $sql = "CALL AgregarCursoUsuario($IdCurso,$IdUsuario,$Estado);";
    $result = mysqli_query($this->connet, $sql);
    if($result){
      $respuesta = mysqli_fetch_array($result);
      return $respuesta["Respuesta"];
    }else{
      return 'Falla!';
    }
  }

  function EstadoCursoUsuario($IdCurso, $IdUsuario){
    $sql = "SELECT Estado FROM UsuarioCurso WHERE IdCurso = $IdCurso AND IdUsuario = $IdUsuario;";
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
      if(isset($Respuesta)){
        if($Respuesta != null)
          return $Respuesta;
        return null;
      }
      return null;
    }
    else {
      return "Error description: ". $this->connet->error;
    }
  }

  function TotalDeTotales(){
    $sql = "CALL TotalDeTotales();";
    $result = mysqli_query($this->connet, $sql);
    if(!$result){
      echo("Error description bruh: ". $this->connet->error);
    }else{
      while($newRow = mysqli_fetch_array($result)){
        $Respuesta = $newRow;
      }
      if(isset($Respuesta)){
        if($Respuesta != null)
          return $Respuesta;
        return null;
      }
      return null;
    }
  }

  function MonitoreoVentas(){
    $sql = "CALL MonitoreoVentas();";
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
        $Curso[$i]["ImagenURL"] = $newRow["ImagenURL"];
        $Curso[$i]["Estado"] = $newRow["Estado"];
        $Curso[$i]["TotalVentas"] = $newRow["TotalVentas"];
        $i++;
      }
      return $Curso;
    }
  }

  function PromedioCompletado(){
    $sql = "CALL PromedioCompletado();";
    $result = mysqli_query($this->connet, $sql);
    if(!$result){
      echo("Error description: ". $this->connet->error);
    }else{
      $Curso = array();
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $Curso[$i]["IdCurso"] = $newRow["IdCurso"];
        $Curso[$i]["TemasCompletados"] = $newRow["TemasCompletados"];
        $i++;
      }
      return $Curso;
    }
  }
      
  function CrearComentario($Usuario, $Contenido, $Curso){
    $sql = "CALL CrearComentario($Usuario, '$Contenido', $Curso);";
    $result = mysqli_query($this->connet, $sql);
    if($result){
      while($newRow = mysqli_fetch_array($result)){
        $Respuesta = $newRow;
      }
      return $Respuesta;
    }
    else {
      return "Error description: ". $this->connet->error;
    }
  }

  function TraerComentarios($Curso){
    $sql = "CALL TraerComentarios($Curso);";
    $result = mysqli_query($this->connet, $sql);
    if($result){
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $Comentarios[$i]["Contenido"] = $newRow["Contenido"];
        $Comentarios[$i]["Fecha"] = $newRow["Fecha"];
        $Comentarios[$i]["IdUsuario"] = $newRow["IdUsuario"];
        $Comentarios[$i]["Nombre"] = $newRow["Nombre"];
        $Comentarios[$i]["Imagen"] = $newRow["Imagen"];
        $i++;
      }
      if(isset($Comentarios))
        return $Comentarios;
      return null;
    }
    else {
      return "Error description: ". $this->connet->error;

    }
  }

  function TraerCompañeros($IdUsuario){
    $sql = "CALL TraerCompañeros($IdUsuario);";
    $result = mysqli_query($this->connet, $sql);
    if($result){
      $i = 0;
      while($newRow = mysqli_fetch_array($result)){
        $Contactos[$i]["IdUsuario"] = $newRow["Idusuario"];
        $Contactos[$i]["Estado"] = $newRow["Estado"];
        $Contactos[$i]["NombreCompleto"] = $newRow["NombreCompleto"];
        $Contactos[$i]["CorreoElectronico"] = $newRow["CorreoElectronico"];
        $i++;
      }
      if(isset($Contactos))
        return $Contactos;
      return null;
    }
    else {
      return "Error description: ". $this->connet->error;
    }
  }

}
