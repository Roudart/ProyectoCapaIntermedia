<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>


    <link rel="icon" href="src/icon.jpg">


    <!--Incluimos la biblioteca de free Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--Incluimos el js necesario para el funcionamiento de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


    <script src="Js/valid.js"></script>


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

        <div class="container">
            <div class="row">
                <div class="col-4">

                </div>
                <div class="col-4 text-center">
                    <h3>
                       ¡Inicia sesion para obtener todos los beneficios!
                    </h3>
                    <hr>
                    <form action="iniciarUsuario.php" id="SignInForm" method="POST">
                        <div class="row mb-3">
                            <div class="col-sm-12">

                                <input type="email" class="form-control" placeholder="Correo Electronico" name="correoIni" id="correoIni">

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">

                                <input type="password" class="form-control" placeholder="Contraseña" name="contraIni" id="contraIni">

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="d-grid gap-2">

                                    <button onclick="validarInicio()" type="button" class="btn btn-danger btn-lg">Iniciar Sesión</button >

                                </div>
                            </div>
                        </div>
                    </form>
                    <h6>
                        ¿No tienes cuenta? <a href="">Registrate</a> 
                    </h6>
                </div>
                <div class="col-4">

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