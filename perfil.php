

<?php
    include 'conexionPHP.php';

    $connection = new Conexion();
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        if(isset($_SESSION["IDUser"]))
            $Usuario = $connection->BuscarUsuario($_SESSION["IDUser"]);
     }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diego Omar Gallegos Maldonado</title>


    <link rel="icon" href="src/icon.jpg">
    <script src="Js/perfil.js"></script>
    <script src="Js/curso.js"></script>

     <script>function ActivarInputCorreo(){
         var InputCorreo = document.getElementById("InputCorreoPerfil");
         if(InputCorreo.disabled){
             InputCorreo.disabled = false;    
         }else{
             InputCorreo.disabled = true;
         }
     }</script>

    <!--Incluimos la biblioteca de free Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--Incluimos el js necesario para el funcionamiento de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
    <!-- $$$$$$$$$ Barra de navegación $$$$$$$$$ -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-body rounded"> <!--Le da a la barra de navegacion el formato de expansión (por responsiva) el color, tema, y pone una sombra para diferenciarlo del fondo-->
        <div class="container-fluid"><!--Un contenedor que hace que el contenido ocupe toda la barra (fluido)-->
            <a class="navbar-brand" href="index.php">Shademy</a><!--El logotipo de la pagina-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button><!--Este boton se activa cuando la pagina es muy pequeña (responsividad)-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent"><!--Todo este contenido cambiara al formato responsivo-->
                <div class="navbar-nav mb-2 me-auto mb-lg-0"><!--Le da formato de linea a lo que está dentro-->
                    <a class="nav-link" href="#">Categorias</a>
                    <form class="navbar-form navbar-left w-auto" action="">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-default">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                      </svg>
                                </button>
                            </div>
                            <input class="form-control rounded-pill" placeholder="¿Buscas algo?" type="text">
                        </div>
                    </form>
                </div>
                <div class="navbar-nav mb-2 mb-lg-0">
                    <a class="nav-link" href="#">Clases</a>
                    <a class="nav-link" href="#">Cursos</a>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="iniciarsesion.html"><button class="btn btn-outline-primary">Iniciar sesión</button></a>
                        <a href="registrarte.html"><button class="btn btn-primary">Registrate</button></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- $$$$$$$$$ Barra de navegación $$$$$$$$$ -->

    <div class="container p-3">
        <div class="row">
            <!--Columna de perfil Izquierda-->
            <div class="col-2 border">
                    <div class="row justify-content-center">
                        <div class="col mt-3">
                            <img src=<?php echo '"'. $Usuario["Imagen"] .'"';?> 
                            class="img rounded-circle img-fluid" alt=". . .">
                            <p class="text-center"><strong><?php echo $Usuario["Nombre"]. " " . $Usuario["ApellidoPaterno"] ." " . $Usuario["ApellidoMaterno"];?></strong></p>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-5">
                        <div class="col mt-3">
                            <div class="list-group" id="list-tab" role="tablist"><!--Lista de botones-->
                                <a class="list-group-item list-group-item-action list-group-item-light active" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Perfil</a>
                                <a class="list-group-item list-group-item-action list-group-item-light" id="list-bootcamp-list" data-bs-toggle="list" href="#list-bootcamp" role="tab" aria-controls="bootcamp">Cursos</a>

                                <?php if($Usuario["TipoUsuario"] == "Admin") echo '
                                <a class="list-group-item list-group-item-action list-group-item-light" id="list-manager-list" data-bs-toggle="list" href="#list-manager" role="tab" aria-controls="manager">Manejar Usuarios</a>';
                                ?>

                                <a class="list-group-item list-group-item-action list-group-item-light" id="list-close-list" data-bs-toggle="list" href="#list-close" role="tab" aria-controls="closeuser">Cerrar cuenta</a>
                            </div>
                        </div>
                    </div>
            </div>


            <!--Columna de perfil Derecha-->
            <div class="col-10 border">
                    <div class="tab-content" id="nav-tabContent"><!--Contenedor de los items de cada elemento de la lista de arriba-->
                        <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"><!--El item del boton de la lista -- PROFILE -->
                            <form action="">
                                <div class="row align-items-start">
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <h4 class="text-center">Perfil</h4>
                                            <p class="text-center">Información sobre ti</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-8">
                                            <p>Información básica:</p>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="inputname" placeholder=<?php echo '"'. $Usuario["Nombre"].'"';?>>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="inputlastname" placeholder=<?php echo '"'. $Usuario["ApellidoPaterno"].'"';?>>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="inputlastname2" placeholder=<?php echo '"'. $Usuario["ApellidoMaterno"].'"';?>>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="inputuser" placeholder=<?php echo '"'. $Usuario["Apodo"].'"';?>>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-8">
                                            <p>Correo electronico:</p>
                                            <div class="input-group mb-3">
                                                <input type="mail" id="InputCorreoPerfil" class="form-control" placeholder=<?php echo '"'. $Usuario["CorreoElectronico"].'"'; ?> aria-describedby="basic-addon1" disabled>
                                                <span class="input-group-text" id="basic-addon1" onClick="ActivarInputCorreo();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-8">
                                            <p>Contraseña:</p>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" placeholder="Contraseña actual">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" placeholder="Contraseña nueva">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" placeholder="Escribe otra vez la contraseña actual">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-4">
                                                <div class="row justify-content-center mb-3">
                                                    <button class="btn btn-outline-danger">Guardar cambios</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="list-bootcamp" role="tabpanel" aria-labelledby="list-bootcamp-list"><!--El item del boton de la lista -- BOOTCAMP -->
                            <div class="row align-items-start">
                                <div class="row justify-content-center">
                                    <div class="col-10">
                                        <h4 class="text-center">Cursos</h4>
                                        <p class="text-center">Cursos y progreso</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row justify-content-center"><!--Tarjeta del curso-->
                                    <div class="col-8 mb-3">
                                        <div class="card">
                                            <div class="card-header">Clase de Python</div>
                                            <div class="card-body">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                </div>
                                            </div>
                                            <a href="#" class="stretched-link"></a><!--Este link te lleva al curso-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center"><!--Tarjeta del curso-->
                                    <div class="col-8 mb-3">
                                        <div class="card">
                                            <div class="card-header">Clase de pallasos</div>
                                            <div class="card-body">
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                                </div>
                                            </div>
                                            <a href="#" class="stretched-link"></a><!--Este link te lleva al curso-->
                                        </div>
                                    </div>
                                </div>

                                <?php if($Usuario["TipoUsuario"] != "Estudiante") echo '

                                <hr>
                                <div class="row justify-content-center">
                                    <div class="col-10">
                                        <h4 class="text-center">Crear nuevo curso</h4>
                                    </div>
                                </div>
                                <hr>
                                <form action="crearCurso.php" id="FormCrearCurso" name="FormCrearCurso" method="POST">
                                    <div class="row justify-content-center mb-4">
                                        <div class="row mb-3">
                                            <div class="col-4 mx-auto">
                                                <label for="fileButton2">
                                                    <img id="blah" src="http://cdn.onlinewebfonts.com/svg/download_325422.png"
                                                    class="img rounded img-fluid" alt=". . .">
                                                </label>
                                                <input type="file" value="upload" id="fileButton2" onChange="PreviewImage();" accept="image/*" style="display: none;">
                                            </div>
                                        </div>

                                        <div class=" col-8 mb-3"> <!--$$$$$$$$$$  TITULO   $$$$$$$$$-->
                                            <label for="InputTitulo" class="form-label"><h4>Título</h4></label>
                                            <input type="text" class="form-control" placeholder="Nombre del curso" name="InputTitulo" id="InputTitulo">
                                        </div>

                                        <div class=" col-8 mb-3"> <!--$$$$$$$$$$  DESCRIPCION   $$$$$$$$$-->
                                            <label for="InputDescripcion" class="form-label"><h4>Descripción</h4></label>
                                            <textarea rows=3 class="form-control" placeholder="Descripción detallada sobre el curso..." name="InputDescripcion" id="InputDescripcion"></textarea>
                                        </div>

                                        <div class=" col-8 mb-3" id="TemasDiv"> <!--$$$$$$$$$$  CONTENIDO   $$$$$$$$$-->
                                            <label for="InputNombreTema" class="form-label"><h4>Contenido del curso</h4></label>
                                            <input type="text" name="InputNombreTema0" id="InputNombreTema0" class="form-control mb-3" placeholder="Nombre del tema" data-bs-toggle="collapse" href="#collapseTema0" role="button" aria-expanded="false" aria-controls="collapseTema0">
                                            <div class="collapse" id="collapseTema0">
                                                <textarea rows=3 class="form-control mb-3" id="TextAreaTema0" name="TextAreaTema0" placeholder="Descripción detallada sobre el tema..."></textarea>
                                            </div>
                                            <div class="col-4 mb-3" id="divButtonsTeams"><button class="btn btn-secondary" onClick="CrearTema();" type ="button">+</button><button class="btn btn-outline-secondary" onClick="EliminarTema();" type ="button"> - </button></div>
                                        </div>

                                        <div class=" col-8 mb-3"> <!--$$$$$$$$$$  REQUISITOS   $$$$$$$$$-->
                                            <label for="InputRequisito0" class="form-label"><h4>Requisitos</h4></label>
                                            <div class="col-4 mb-3" id="RequisitosDiv">
                                                <input name="InputRequisito0" id="InputRequisito0" type="text" class="form-control form-control-sm mb-3">
                                            </div>
                                            <div class="col-4 mb-3"><button class="btn btn-secondary" onClick="CrearRequisito();" type ="button">+</button><button class="btn btn-outline-secondary" onClick="EliminarRequisito();" type ="button"> - </button></div>
                                        </div>

                                        <div class="col-8 mb-3" id="CategoriasDiv"> <!--$$$$$$$$$$  CATEGORIAS   $$$$$$$$$-->
                                            <label class="form-label" for="SelectCategoria"><h4>Categoria</h4></label>
                                            <select class="form-select" id="SelectCategoria" onchange="AgregarSelected(this);">
                                                <option selected>Elige...</option>
                                                <option >Ciencia</option>
                                                <option >Web</option>
                                                <option >Programación</option>
                                            </select>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-4 mb-3">
                                            <label class="form-label" for="PrecioInput"><h4>Precio</h4></label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">$</span>
                                                    <input type="number" class="form-control" id="PrecioInput" value="0" name="PrecioInput" aria-label="Amount (to the nearest dollar)">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 col-6 mx-auto mb-3">
                                            <button type="submit" class="btn btn-danger btn-sm">Crear curso</button>
                                        </div>
                                    </div>
                                </form>
                                ';?>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="list-manager" role="tabpanel" aria-labelledby="list-manager-list"><!--El item del boton de la lista -- Manager -->
                            <div class="row align-items-start">
                                <div class="row justify-content-center">
                                    <div class="col-10">
                                        <h4 class="text-center">Administrador</h4>
                                        <p class="text-center">Manejo de usuarios</p>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                    $connection2 = new Conexion();
                                    $ArregloUsuarios = $connection2->BuscarUsuariosManager();
                                    $i=0;
                                    foreach($ArregloUsuarios as $User){
                                        //echo $ArregloUsuarios[0][$i]; ID
                                        //echo $ArregloUsuarios[1][$i]; TIPO DE USUARIO
                                        //echo $ArregloUsuarios[2][$i]; NOMBRE COMPLETO
                                    echo '<div class="row justify-content-center" id="TarjetaUsuario'; echo $User[0]; echo '"><!--Tarjeta del usuario-->
                                        <div class="col-8 mb-3">
                                            <div class="card">
                                                <div class="card-header">'; echo $User[2]; echo '</div>
                                                <div class="card-body">
                                                    <div class="row mb-5">
                                                        <div class="col-4 mt-3">
                                                            <a href="#" class="link" style="text-decoration: none;">
                                                            <img src="https://banner2.kisspng.com/20180615/rtc/kisspng-avatar-user-profile-male-logo-profile-icon-5b238cb002ed52.870627731529056432012.jpg" 
                                                                class="img rounded-circle img-thumbnail" alt=". . .">
                                                            </a>
                                                        </div>
                                                        <div class="col-8 justify-content-center">
                                                            <div class="d-grid gap-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" onClick="ActualizarUsuario(3,'; echo $User[0]; echo ')" type="radio" name="RadioTipoUsuario'; echo $i; echo '" id="RadioEstudiante'; echo $User[0]; echo '"';
                                                                    if($User[1] == 'Estudiante') echo 'checked>'; else echo '>';
                                                                    echo '<label class="form-check-label" for="RadioEstudiante">Estudiante</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" onClick="ActualizarUsuario(2,'; echo $User[0]; echo ')" type="radio" name="RadioTipoUsuario'; echo $i; echo '" id="RadioMaestro'; echo $User[0]; echo '"';
                                                                    if($User[1] == 'Maestro') echo 'checked>'; else echo '>';
                                                                    echo '<label class="form-check-label" for="RadioMaestro">Maestro</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" onClick="ActualizarUsuario(1,'; echo $User[0]; echo ')" type="radio" name="RadioTipoUsuario'; echo $i; echo '" id="RadioAdmin'; echo $User[0]; echo '"';
                                                                    if($User[1] == 'Admin') echo 'checked>'; else echo '>';
                                                                    echo '<label class="form-check-label" for="RadioAdmin">Administrador</label>
                                                                </div>
                                                                <hr>
                                                                <button type="button" onClick="EliminarUsuario(TarjetaUsuario'; echo $User[0]; echo ','; echo $User[0]; echo ')" class="btn btn-danger btn-lg">Dar de baja</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                    $i++;
                                    }
                                    unset($User);
                                ?>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="list-close" role="tabpanel" aria-labelledby="list-close-list"><!--El item del boton de la lista -- CLOSE -->
                            <div class="row align-items-start">
                                <div class="row justify-content-center">
                                    <div class="col-10">
                                        <h4 class="text-center">Cerrar cuenta</h4>
                                        <p class="text-center">Eliminar cuenta de forma permanente</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        <p>Cerrar tu cuenta</p>
                                        <p class="list-inline-item text-danger">Peligro: </p>
                                        <p class="list-inline-item">Si cierras tu cuenta, te desuscribiras de todos los cursos y perderas el progreso para siempre.</p>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCloseUser">Cerrar cuenta</button>
                                        <!--Ventan modal-->
                                        <div class="modal fade" id="modalCloseUser" data-bs-backdrop="static" tabindex="-1" aria-labelledby="closeUserModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="closeUserModalLabel">Modal title</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  Importante! Recuerde que perdera su cuenta, su progreso y sus cursos.
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                  <a href="index.html"><button type="button" class="btn btn-primary">Aceptar</button></a>
                                                </div>
                                              </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>


        </div>
    </div>

    <!--FOOTER-->
    <hr>
    <div class="text-center">
        <h4>Enseñamos lo que quieres aprender</h4>
    </div>
    <hr>
    <div class="container-fluid" style="padding-bottom: 10rem;">
        <div class="row">
            <div class="col-4">
                <p><a href="">Sobre nosotros</a></p>
                <p><a href="">FAQ</a></p>
                <p><a href="">Ponte en contacto con nososotros</a></p>
            </div>
            <div class="col-4">
                <p><a href="">Empleo</a></p>
                <p><a href="">Blog</a></p>
                <p><a href="">Ayuda</a></p>
            </div>
            <div class="col-4 justify-content-md-end">
                <div class="dropdown d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-outline-danger btn-lg dropdown-toggle" id="dropdownMenuButtonLanguage" data-bs-toggle="dropdown" aria-expanded="false">Español</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonLanguage">
                        <li><a href="" class="dropdown-item">Español</a></li>
                        <li><a href="" class="dropdown-item">Español</a></li>
                        <li><a href="" class="dropdown-item">Español</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="navbar-brand" style="color: black;" href="">Shademy</a>
            </div>
            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                <p>© 2021 Shademy, Inc.</p>
            </div>
        </div>
    </div>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->


<!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/8.4.0/firebase-storage.js"></script>



<script>


// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyBVcqywOYtxfSReOqczaske3yqwaWAv1i8",
    authDomain: "shademy-f9afe.firebaseapp.com",
    projectId: "shademy-f9afe",
    storageBucket: "shademy-f9afe.appspot.com",
    messagingSenderId: "54990730142",
    appId: "1:54990730142:web:2d201893eb624e75d21c8f"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

//Get elements form dom
var fileButton = document.getElementById("fileButton2");


function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("fileButton2").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("blah").src = oFREvent.target.result;
        };
    };

function UploadImage(){
    //Get File
    var e = document.getElementById("fileButton2");
    var file = e.files[0];
    console.log(file.name);

    //Create storage ref
    var storageRef = firebase.storage().ref('fotos/' + file.name);

    // Upload file
    var task = storageRef.put(file);

    task.on('state_changed', 
    
        function progress(snapshot){
            var percentage = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            console.log(percentage);
        },

        function error(err){
            alert("ERROR! NO SE PUDO CARGAR IMAGEN");
        },

        function complete(){
            console.log("Imagen cargada!");
            task.snapshot.ref.getDownloadURL().then(function (URL){
                console.log(URL);
                submitUser(URL);
            });
        }
    );

}

function submitUser(URL){
    var formUser = document.forms["SignInForm"];
    var SN = document.createElement("input"); 
    SN.setAttribute("type", "text"); 
    SN.setAttribute("value", URL); 
    SN.setAttribute("name", "ImagePath");//La estructura tiene el nombre
    formUser.appendChild(SN);
    formUser.submit();
    alert("se ha registrado exitosamente");
    return true;
}
</script>
</body>
</html>