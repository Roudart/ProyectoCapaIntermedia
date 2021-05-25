<?php
include 'conexionPHP.php';
$Conexion = new Conexion();
$connection = new Conexion();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (isset($_SESSION["IDUser"])) {
        $FotoUsuario = $Conexion->BuscarFotoUsuario($_SESSION["IDUser"]);
    }
}
$ConexionCursos = new Conexion();
if (isset($_GET["Categoria"])) {
    $CursoCategoria = $ConexionCursos->TraerCursosCategoria($_GET["Categoria"]);
} else
    echo "Nada!";

$Curso = $connection->TraerCursos();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>


    <link rel="icon" href="src/icon.jpg">


    <!--Incluimos la biblioteca de free Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--Incluimos el js necesario para el funcionamiento de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>

<body>
    <!-- $$$$$$$$$ Barra de navegación $$$$$$$$$ -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-body rounded">
        <!--Le da a la barra de navegacion el formato de expansión (por responsiva) el color, tema, y pone una sombra para diferenciarlo del fondo-->
        <div class="container-fluid">
            <!--Un contenedor que hace que el contenido ocupe toda la barra (fluido)-->
            <a class="navbar-brand" href="index.php">Shademy</a>
            <!--El logotipo de la pagina-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Este boton se activa cuando la pagina es muy pequeña (responsividad)-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--Todo este contenido cambiara al formato responsivo-->
                <div class="navbar-nav mb-2 me-auto mb-lg-0">
                    <!--Le da formato de linea a lo que está dentro-->
                    <a class="nav-link" href="#">Categorias</a>
                    <form class="navbar-form navbar-left" autocomplete="off" action="busquedaCurso.php" method="get">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-default">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="autocomplete" style="width:300px;">
                                <input id="InputBusquedaCurso" type="text" name="InputBusquedaCurso" class="form-control rounded-pill" placeholder="¿Buscas algo?" list="Cursos">
                                <datalist id="Cursos">
                                    <?php if (isset($Curso)) {
                                        $sizeCursos = sizeof($Curso);
                                        for ($i = 0; $i < $sizeCursos; $i++) {
                                            echo '<script></script>';
                                            $ShowCurso = $Curso[$i]["Nombre"];
                                            echo '<option value="' . $ShowCurso . '"';
                                        }
                                    } ?>
                                </datalist>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="navbar-nav mb-2 mb-lg-0">
                    <a class="nav-link" href="#">Clases</a>
                    <a class="nav-link" href="#">Cursos</a>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <?php if (!isset($_SESSION["IDUser"])) {
                            echo
                            '<div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="iniciarsesion.php"><button class="btn btn-outline-danger">Iniciar sesión</button></a>
                        <a href="registrarte.php"><button class="btn btn-danger">Registrate</button></a>
                    </div>';
                        } else {
                            echo
                            '<div class="dropdown">
                        <a class="navbar-brand" data-bs-toggle="dropdown" role="button" id="dropDownSesion" href="#" onclick=""  width="32px" height="45px" style="margin-left: 7px; margin-right: 0px" >  
                            <img src="' . $FotoUsuario . '" alt ="profilepic" class="perfile" style= "width:40px; height:40px; border-radius:40px; border:1px solid #666;">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropDownSesion">
                            <a class="dropdown-item" href="perfil.php">Perfil</a>
                            <a class="dropdown-item" href="cerrarSesion.php" id="cerrarsesion">Cerrar Sesión</a>
                        </div>
                    </div>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- $$$$$$$$$ Barra de navegación $$$$$$$$$ -->

    <h1 class="text-center">Resultados para <?php $echo?>...</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-list">
                        <?php if (isset($CursoCategoria)) {
                            $sizeCursos = sizeof($CursoCategoria);
                            for ($i = 0; $i < $sizeCursos; $i++) {
                                echo
                                '<form action="curso.php" method="get">
                                <div class="row shadow-sm rounded mb-5" id="TarjetaCurso">
                                <div class="col-2">
                                    <img src="';
                                if ($CursoCategoria[$i]["ImagenURL"] !== null) {
                                    echo $CursoCategoria[$i]["ImagenURL"];
                                } else {
                                    echo "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.nsha.org%2Fwp-content%2Fuploads%2F2017%2F06%2Fcomputer-coding-600x600.jpg&f=1&nofb=1";
                                }
                                echo '" 
                                    class="img rounded-circle img-fluid" alt="..." style="max-width: 10vw; max-height: 10vw; min-width: 10vw; min-height: 10vw">
                                </div>
                                <div class="col-10">
                                    <h1>' . $CursoCategoria[$i]["Nombre"] . '</h1>
                                    <p>' . $CursoCategoria[$i]["Descripción"] . '</p>
                                    <input type="text" id="CursoId" name="CursoId" value="' . $CursoCategoria[$i]["IdCurso"] . '"  hidden>
                                    <button type="submit" id ="LinkCurso' . $CursoCategoria[$i]["IdCurso"] . '" class="btn btn-secondary">Ver mas...</button>
                                </div>
                            </div>
                            </form>
                            ';
                            }
                        } else {
                            echo '<div class="col text-center mb-4"><h5>Al parecer no existen cursos</h5></div>';
                        } ?>
                    </div>
                    <div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-list">
                        <script>
                            for (var i = 0; i < 7; i++) {
                                var carta = document.getElementById("TarjetaCurso");
                                var cln = carta.cloneNode(true);
                                document.getElementById("list-2").appendChild(cln);
                            }
                        </script>
                    </div>
                    <div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-list">
                        <script>
                            for (var i = 0; i < 7; i++) {
                                var carta = document.getElementById("TarjetaCurso");
                                var cln = carta.cloneNode(true);
                                document.getElementById("list-3").appendChild(cln);
                            }
                        </script>
                    </div>
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center list-group list-group-horizontal" id="list-tab" role="tablist">
                        <li class="page-item disabled"><a class="page-link list-group-item list-group-item-action" href="" tabindex="-1" aria-disabled="true">Anterior</a></li>
                        <li class="page-item"><a class="page-link list-group-item list-group-item-action" id="list-1-list" data-bs-toggle="list" href="#list-1" role="tab" aria-controls="1" href="">1</a></li>
                        <li class="page-item"><a class="page-link list-group-item list-group-item-action" id="list-2-list" data-bs-toggle="list" href="#list-2" role="tab" aria-controls="2" href="">2</a></li>
                        <li class="page-item"><a class="page-link list-group-item list-group-item-action" id="list-3-list" data-bs-toggle="list" href="#list-3" role="tab" aria-controls="3" href="">3</a></li>
                        <li class="page-item">
                            <a class="page-link list-group-item list-group-item-action" href="#">Siguiente</a>
                        </li>
                    </ul>
                </nav>

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