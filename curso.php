<?php
include 'conexionPHP.php';
$Conexion = new Conexion();
$IdCurso = $_GET["CursoId"];
$Curso = $Conexion->TraerCurso($IdCurso);
$Calificacion = 0;
$Tema = $Conexion->TrearTemas($IdCurso);
$Requisito = $Conexion->TraerRequisitos($IdCurso);
$Categoria = $Conexion->TraerCategoriasCurso($IdCurso);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (isset($_SESSION["IDUser"])) {
        $FotoUsuario = $Conexion->BuscarFotoUsuario($_SESSION["IDUser"]);
        $ConexionEstado = new Conexion();
        $EstadoCursoUsuario = $ConexionEstado->EstadoCursoUsuario($IdCurso, $_SESSION["IDUser"]);
        $ConexionCalificacion = new Conexion();
        $Calificacion = $ConexionCalificacion->CalificacionUsuarioCurso($Curso["IdCurso"], $_SESSION["IDUser"]);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso</title>


    <link rel="icon" href="src/icon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Js/AgregarCurso.js"></script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v10.0" nonce="nwvdRSaN"></script>
    <style>
        .checked {
            color: orange;
        }
    </style>


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
                    <form class="navbar-form navbar-left w-auto" action="">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-default">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
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
    </nav>
    <!-- $$$$$$$$$ Barra de navegación $$$$$$$$$ -->

    <div class="container mt-3 px-3 py-3 mx-auto shadow-lg border border-secondary border-2 rounded">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="d-grid gap-3">
                            <div class="row-fluid">
                                <div class="col">
                                    <h1><?php if (isset($Curso)) echo $Curso["Nombre"];
                                        else echo 'Titulo de la noticia falta'; ?></h1>
                                    <p>17,256 reviews y 20000 estudiantes cursados</p>
                                    <p>Impartido por <a><?php if (isset($Curso)) echo $Curso["NombreMaestro"];
                                                        else echo 'Falta el nombre del maestro'; ?></a></p>
                                    <button class="btn btn<?php if (isset($EstadoCursoUsuario) && $EstadoCursoUsuario === 'Deseado') echo '-';
                                                            else echo '-outline-'; ?>danger btn-sm" <?php if (isset($EstadoCursoUsuario) && ($EstadoCursoUsuario === 'Cursando' || $EstadoCursoUsuario === 'Cursado')) echo 'hidden'; ?> onclick="AgregarCursoListaDeseados(<?php echo $IdCurso . ',';
                                                                                                                                                                                                                                                                            if (isset($_SESSION['IDUser'])) echo $_SESSION['IDUser'];
                                                                                                                                                                                                                                                                            else echo -1; ?>);" id="BtnListaDeseados"><?php if (isset($EstadoCursoUsuario) && $EstadoCursoUsuario === 'Deseado') echo 'Deseado';
                                                                                                                                                                                                                                                                                                                                                                                                        else echo 'Lista de desados'; ?></button>
                                    <div class="row mb-3 mt-3">
                                        <div class="fb-share-button" data-href="https://google.com.mx" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
                                    </div>
                                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="¡Checa este curso de Shademy!" data-show-count="false">Tweet</a>
                                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="col">
                                    <h1>Contenido del curso</h1>

                                    <!--OK. ESTO ES COMPLICADO, PERO SI LO SEPARAS POR GRUPOS, TODO BIEN-->
                                    <div class="accordion" id="accordionCurso">
                                        <!--Este es la agrupación general del acordion. El padre de todos-->

                                        <?php if (isset($Tema))
                                            $sizeTemas = sizeof($Tema);
                                        for ($i = 0; $i < $sizeTemas; $i++) {
                                            echo '
                                            <div class="accordion-item">
                                                <!--Una linea de acordion que se retrae y se expande-->
                                                <!--Copiar y pegar esto varias veces para varios-->
                                                <h2 class="accordion-header">
                                                    <!--Lo que vaa decir la linea contraida. El titulo-->
                                                    <!--Aria-expanded true es para tenerlo expandido. Modificar esto lo expande y contrae-->
                                                    <button class="accordion-button collapsed btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $Tema[$i]["NumTema"] . '" aria-expanded="false" aria-controls="collapse' . $Tema[$i]["NumTema"] . '">
                                                        <!--Cada linea tendrá los controladores nombrados, ej. "collapseOne"-->
                                                        <strong>' . $Tema[$i]["Nombre"] . '</strong>
                                                    </button>
                                                </h2>
                                                <div class="accordion-collapse collapse" id="collapse' . $Tema[$i]["NumTema"] . '" aria-labelledby="headingOne" data-bs-parent="accordionCurso">
                                                    <!--El contenido de la linea-->
                                                    <!--El controlador apunta al padre-->
                                                    <div class="accordion-body">
                                                    ' . $Tema[$i]["Descripción"] . '
                                                    </div>
                                                </div>
                                            </div>
                                        ';
                                        } ?>

                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="col">
                                    <h1>Requisitos</h1>
                                    <ul>
                                        <?php if (isset($Requisito))
                                            $sizeRequisito = sizeof($Requisito);
                                        for ($i = 0; $i < $sizeRequisito; $i++) {
                                            echo '<li>' . $Requisito[$i]["Nombre"] . '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="col">
                                    <h1>Descripción del curso</h1>
                                    <p><?php if (isset($Curso)) echo $Curso["Descripción"];
                                        else echo 'Descripción de la noticia falta'; ?></p>
                                </div>
                            </div>
                            
                            <div class="row mt-3 mb-3">
                            <h3>Califica este curso</h3>
                                <?php $SemiC = "'";?>
                                <span class="<?php if($Calificacion[0]<1) echo 'fa fa-star col-auto'; else echo 'fa fa-star col-auto checked';?>" id="Star1" name="Star1" onmouseleave="CleanStars();" onclick="Calificar(this, <?php if(isset($_SESSION['IDUser'])) echo $_SESSION['IDUser']; else echo -1;?>, <?php echo $Curso['IdCurso'];?> ,<?php if(isset($EstadoCursoUsuario)) echo $SemiC.$EstadoCursoUsuario.$SemiC; else echo $SemiC.'Ninguno'.$SemiC; ?>);"></span>
                                <span class="<?php if($Calificacion[0]<2) echo 'fa fa-star col-auto'; else echo 'fa fa-star col-auto checked';?>" id="Star2" name="Star2" onmouseleave="CleanStars();" onclick="Calificar(this, <?php if(isset($_SESSION['IDUser'])) echo $_SESSION['IDUser']; else echo -1;?>, <?php echo $Curso['IdCurso'];?> ,<?php if(isset($EstadoCursoUsuario)) echo $SemiC.$EstadoCursoUsuario.$SemiC; else echo $SemiC.'Ninguno'.$SemiC; ?>);"></span>
                                <span class="<?php if($Calificacion[0]<3) echo 'fa fa-star col-auto'; else echo 'fa fa-star col-auto checked';?>" id="Star3" name="Star3" onmouseleave="CleanStars();" onclick="Calificar(this, <?php if(isset($_SESSION['IDUser'])) echo $_SESSION['IDUser']; else echo -1;?>, <?php echo $Curso['IdCurso'];?> ,<?php if(isset($EstadoCursoUsuario)) echo $SemiC.$EstadoCursoUsuario.$SemiC; else echo $SemiC.'Ninguno'.$SemiC; ?>);"></span>
                                <span class="<?php if($Calificacion[0]<4) echo 'fa fa-star col-auto'; else echo 'fa fa-star col-auto checked';?>" id="Star4" name="Star4" onmouseleave="CleanStars();" onclick="Calificar(this, <?php if(isset($_SESSION['IDUser'])) echo $_SESSION['IDUser']; else echo -1;?>, <?php echo $Curso['IdCurso'];?> ,<?php if(isset($EstadoCursoUsuario)) echo $SemiC.$EstadoCursoUsuario.$SemiC; else echo $SemiC.'Ninguno'.$SemiC; ?>);"></span>
                                <span class="<?php if($Calificacion[0]<5) echo 'fa fa-star col-auto'; else echo 'fa fa-star col-auto checked';?>" id="Star5" name="Star5" onmouseleave="CleanStars();" onclick="Calificar(this, <?php if(isset($_SESSION['IDUser'])) echo $_SESSION['IDUser']; else echo -1;?>, <?php echo $Curso['IdCurso'];?> ,<?php if(isset($EstadoCursoUsuario)) echo $SemiC.$EstadoCursoUsuario.$SemiC; else echo $SemiC.'Ninguno'.$SemiC; ?>);"></span>
                            </div>
                            <script src="Js/StarSystem.js"></script>
                            <div class="row">
                                <div class="col mx-auto">
                                    <h1>Instructor</h1>
                                    <h5><a href="perfil.html" class="link-success text-decoration-none">
                                            <?php if (isset($Curso)) echo $Curso["NombreMaestro"];
                                            else echo 'Falta el nombre del maestro'; ?></a></h5>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="perfil.html">
                                                    <img src="<?php if (isset($Curso) && isset($Curso["Imagen"]) && $Curso["Imagen"] != null) echo $Curso["Imagen"];
                                                                else echo 'https://banner2.kisspng.com/20180615/rtc/kisspng-avatar-user-profile-male-logo-profile-icon-5b238cb002ed52.870627731529056432012.jpg'; ?>" class="img rounded-circle img-fluid" alt=". . ." style="max-width: 12vw; max-height: 12vw; min-width: 12vw; min-height:12vw;">
                                                </a>
                                            </div>
                                            <div class="col-8 lh-1">
                                                <div class="col mx-auto">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae commodo dui. Nunc commodo lacus venenatis libero finibus vestibulum. Curabitur ac aliquet nisl. Phasellus enim metus, ultrices non rutrum at, mollis in sapien. Morbi elementum aliquam hendrerit. In enim magna, rhoncus sodales efficitur ac, tempus quis metus. Cras fermentum malesuada ullamcorper.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 mt-3">
                                <div class="col mx-auto">
                                    <h1>
                                        Mismas categorias
                                    </h1>
                                    <div class="btn-group" role="group">
                                        <?php if (isset($Categoria)) {
                                            $sizeCategoria = sizeof($Categoria);
                                            for ($i = 0; $i < $sizeCategoria; $i++) {
                                                echo '<form action="busquedaCategorias.php" method="GET">
                                            <button type="submit" class="btn" id="Curso' . $Categoria[$i]["IdCategoria"] . '" name= "Curso' . $Categoria[$i]["IdCategoria"] . '"
                                            style="background: ' . $Categoria[$i]["Color"] . '; color: white;">' . $Categoria[$i]["Nombre"] . '</button>
                                            <input value="' . $Categoria[$i]["IdCategoria"] . '" id="Categoria" name="Categoria" hidden></form>';
                                            }
                                        } else {
                                            echo '<h4>D: Por alguna razón no tiene categorias<h4>';
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 mt-3">
                                <div class="col mx-auto">
                                    <h1>Reseñas</h1>
                                </div>
                            </div>
                        </div>


                        <!--Lista izquierda-->
                    </div>
                    <div class="col-sm-4">
                        <div class="card shadow-lg">
                            <img src="<?php if (isset($Curso) && isset($Curso["ImagenURL"]) && $Curso["ImagenURL"] !== null) echo $Curso["ImagenURL"];
                                        else echo 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmiro.medium.com%2Fmax%2F12032%2F0*Q8DDPKbl1Jek0i0a&f=1&nofb=1'; ?>" alt="imagen" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">$<?php if (isset($Curso)) echo $Curso["Precio"];
                                                        else echo '000.00'; ?></h4>
                                <?php if (isset($EstadoCursoUsuario) && ($EstadoCursoUsuario === 'Cursando' || $EstadoCursoUsuario === 'Cursado')) echo '<strong>Ya lo tienes</strong>';
                                else {
                                    echo '
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-danger" onclick="AgregarCursoCompra(' . $IdCurso . ',';
                                    if (isset($_SESSION['IDUser'])) echo $_SESSION['IDUser'];
                                    else echo -1;
                                    echo ');">Comprar ahora</button>
                                    <button class="btn btn-outline-secondary">Agregar al carrito</button>
                                </div>
                                <hr>';
                                } ?>
                                <p class="card-text">Este curso incluye: </p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">20 horas de video</li>
                                    <li class="list-group-item">15 articuloas</li>
                                    <li class="list-group-item">¡Incluye un libro!</li>
                                    <li class="list-group-item">Acceso de por vida</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid px-3">
                        <div class="row mb-5">
                            <div class="col-2">
                                <a href="perfil.php">
                                    <img src="<?php if (isset($FotoUsuario)) echo $FotoUsuario;
                                                else {
                                                    echo 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_411076.png&f=1&nofb=1';
                                                } ?>" class="img rounded-circle img-fluid border" alt=". . .">
                                </a>
                            </div>
                            <div class="col-10 lh-1 align-middle">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Dejanos un comentario" id="commentInput" style="height: 12rem"></textarea>
                                    <label for="commentInput">Comentario</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="container-fluid" id="BarraComentarios">
                            <div class="row mb-5 shadow-sm" id="ComentarioReseña">
                                <div class="col">
                                    <a href="perfil.html">
                                        <img src="https://banner2.kisspng.com/20180615/rtc/kisspng-avatar-user-profile-male-logo-profile-icon-5b238cb002ed52.870627731529056432012.jpg" class="img rounded-circle img-fluid" alt=". . .">
                                    </a>
                                </div>
                                <div class="col-11 lh-1">
                                    <div class="col mx-auto">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae commodo dui. Nunc commodo lacus venenatis libero finibus vestibulum. Curabitur ac aliquet nisl. Phasellus enim metus, ultrices non rutrum at, mollis in sapien. Morbi elementum aliquam hendrerit. In enim magna, rhoncus sodales efficitur ac, tempus quis metus. Cras fermentum malesuada ullamcorper.</p>
                                    </div>
                                </div>
                            </div>
                            <script>
                                for (var i = 0; i < 7; i++) {
                                    var carta = document.getElementById("ComentarioReseña");
                                    var cln = carta.cloneNode(true);
                                    document.getElementById("BarraComentarios").appendChild(cln);
                                }
                            </script>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$                         FOOTER                        #########################################-->
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