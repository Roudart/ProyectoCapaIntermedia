
<?php
    include 'conexionPHP.php';

    $connet = mysqli_connect($serverName, $userName, $password, $dataBase);
    if ($connet -> connect_errno) {
        echo "Failed to connect to MySQL: " . $connet -> connect_error;
        exit();
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

    <!--Incluimos la biblioteca de free Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--Incluimos el js necesario para el funcionamiento de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
    <!-- $$$$$$$$$ Barra de navegación $$$$$$$$$ -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-body rounded"> <!--Le da a la barra de navegacion el formato de expansión (por responsiva) el color, tema, y pone una sombra para diferenciarlo del fondo-->
        <div class="container-fluid"><!--Un contenedor que hace que el contenido ocupe toda la barra (fluido)-->
            <a class="navbar-brand" href="index.html">Shademy</a><!--El logotipo de la pagina-->
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
                            <img src="https://banner2.kisspng.com/20180615/rtc/kisspng-avatar-user-profile-male-logo-profile-icon-5b238cb002ed52.870627731529056432012.jpg" 
                            class="img rounded-circle img-fluid" alt=". . .">
                            <p class="text-center"><strong>Diego Omar Gallegos Maldonado</strong></p>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-5">
                        <div class="col mt-3">
                            <div class="list-group" id="list-tab" role="tablist"><!--Lista de botones-->
                                <a class="list-group-item list-group-item-action list-group-item-light active" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Perfil</a>
                                <a class="list-group-item list-group-item-action list-group-item-light" id="list-bootcamp-list" data-bs-toggle="list" href="#list-bootcamp" role="tab" aria-controls="bootcamp">Cursos</a>

                                <a class="list-group-item list-group-item-action list-group-item-light" id="list-manager-list" data-bs-toggle="list" href="#list-manager" role="tab" aria-controls="manager">Manejar Usuarios</a>

                                <a class="list-group-item list-group-item-action list-group-item-light" id="list-close-list" data-bs-toggle="list" href="#list-close" role="tab" aria-controls="closeuser">Cerrar cuenta</a>
                            </div>
                        </div>
                    </div>
            </div>


            <!--Columna de perfil Derecha-->
            <div class="col-10 border">
                <form action="">
                    <div class="tab-content" id="nav-tabContent"><!--Contenedor de los items de cada elemento de la lista de arriba-->
                        <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"><!--El item del boton de la lista -- PROFILE -->
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
                                            <input type="text" class="form-control" id="inputname" placeholder="Diego Omar">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="inputlastname" placeholder="Gallegos Maldonado">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="inputuser" placeholder="Roudart">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        <p>Correo electronico:</p>
                                        <div class="input-group mb-3">
                                            <input type="mail" class="form-control" placeholder="diego3_gallegos@hotmail.com" aria-describedby="basic-addon1">
                                            <span class="input-group-text" id="basic-addon1">
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
                                    $ArregloUsuarios = BuscarUsuariosManager();
                                    $NumUsuarios =sizeof($ArregloUsuarios);
                                    for($i = 0; $i < $NumUsuarios; $i++){
                                        //echo $ArregloUsuarios[0][$i]; ID
                                        //echo $ArregloUsuarios[1][$i]; TIPO DE USUARIO
                                        //echo $ArregloUsuarios[2][$i]; NOMBRE COMPLETO
                                    echo '<div class="row justify-content-center"><!--Tarjeta del usuario-->
                                        <div class="col-8 mb-3">
                                            <div class="card">
                                                <div class="card-header">'; echo $ArregloUsuarios[2][$i]; echo '</div>
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
                                                                    <input class="form-check-input" type="radio" name="RadioTipoUsuario'; echo $i; echo '" id="RadioEstudiante'; echo $ArregloUsuarios[0][$i]; echo '"';
                                                                    if($ArregloUsuarios[1][$i] == 'Estudiante') echo 'checked>'; else echo '>';
                                                                    echo '<label class="form-check-label" for="RadioEstudiante">Estudiante</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="RadioTipoUsuario'; echo $i; echo '" id="RadioMaestro'; echo $ArregloUsuarios[0][$i]; echo '"';
                                                                    if($ArregloUsuarios[1][$i] == 'Maestro') echo 'checked>'; else echo '>';
                                                                    echo '<label class="form-check-label" for="RadioMaestro">Maestro</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="RadioTipoUsuario'; echo $i; echo '" id="RadioAdmin'; echo $ArregloUsuarios[0][$i]; echo '"';
                                                                    if($ArregloUsuarios[1][$i] == 'Admin') echo 'checked>'; else echo '>';
                                                                    echo '<label class="form-check-label" for="RadioAdmin">Administrador</label>
                                                                </div>
                                                                <hr>
                                                                <button type="button" class="btn btn-danger btn-lg">Dar de baja</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                    }
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

                </form>
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

</body>
</html>