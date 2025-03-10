<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso</title>


    <link rel="icon" href="src/icon.jpg">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v10.0" nonce="nwvdRSaN"></script>


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
    
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-6">
                            <div class="d-grid gap-3">
                                <div class="row-fluid">
                                    <div class="col">
                                        <h1>Curso de Python: Aprende desde casa sin libros</h1>
                                        <h5>Aprende a programar usando Progamación Orientada a Objetos y usando visual studio code</h5>
                                        <p>17,256 reviews y 20000 estudiantes cursados</p>
                                        <p>Impartido por <a href="">Alejandro Martinez Iñarritu</a></p>
                                        <button class="btn btn-outline-danger btn-sm">Lista de deseados</button>
                                        <div class="row">
                                            <div class="fb-share-button" data-href="https://google.com.mx" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
                                        </div>
                                            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="¡Checa este curso de Shademy!" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                    </div>                                
                                </div>
                                <div class="row-fluid">
                                    <div class="col">
                                        <h1>Contenido del curso</h1>
    
                                        <!--OK. ESTO ES COMPLICADO, PERO SI LO SEPARAS POR GRUPOS, TODO BIEN-->
                                        <div class="accordion" id="accordionCurso"><!--Este es la agrupación general del acordion. El padre de todos-->
                                            <div class="accordion-item"><!--Una linea de acordion que se retrae y se expande--><!--Copiar y pegar esto varias veces para varios-->
                                                <h2 class="accordion-header"><!--Lo que vaa decir la linea contraida. El titulo--><!--Aria-expanded true es para tenerlo expandido. Modificar esto lo expande y contrae-->
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><!--Cada linea tendrá los controladores nombrados, ej. "collapseOne"-->
                                                    Introducción
                                                    </button>
                                                </h2>
                                                <div class="accordion-collapse collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="accordionCurso"><!--El contenido de la linea--><!--El controlador apunta al padre-->
                                                    <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                        Vestibulum in dui eget tortor egestas tristique. Aliquam ut justo pellentesque, tristique lectus non, malesuada nisi. In lobortis nunc ac eleifend dictum. 
                                                        Mauris sed ligula leo. Donec in tortor quam. Suspendisse et massa dapibus, egestas odio non, luctus nulla. Sed molestie augue at fringilla molestie.
                                                    </div>
                                                </div>
                                            </div>
                                            <!--
    
                                            -->
                                            <div class="accordion-item"><!--Una linea de acordion que se retrae y se expande--><!--Copiar y pegar esto varias veces para varios-->
                                                <h2 class="accordion-header"><!--Lo que vaa decir la linea contraida. El titulo--><!--Aria-expanded true es para tenerlo expandido. Modificar esto lo expande y contrae-->
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><!--Cada linea tendrá los controladores nombrados, ej. "collapseOne"-->
                                                    El entorno de aprendizaje
                                                    </button>
                                                </h2>
                                                <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="accordionCurso"><!--El contenido de la linea--><!--El controlador apunta al padre-->
                                                    <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                        Vestibulum in dui eget tortor egestas tristique. Aliquam ut justo pellentesque, tristique lectus non, malesuada nisi. In lobortis nunc ac eleifend dictum. 
                                                        Mauris sed ligula leo. Donec in tortor quam. Suspendisse et massa dapibus, egestas odio non, luctus nulla. Sed molestie augue at fringilla molestie.
                                                    </div>
                                                </div>
                                            </div>
                                            <!--

                                            -->
                                            <div class="accordion-item"><!--Una linea de acordion que se retrae y se expande--><!--Copiar y pegar esto varias veces para varios-->
                                                <h2 class="accordion-header"><!--Lo que vaa decir la linea contraida. El titulo--><!--Aria-expanded true es para tenerlo expandido. Modificar esto lo expande y contrae-->
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><!--Cada linea tendrá los controladores nombrados, ej. "collapseOne"-->
                                                    Programación Orientada a Objetos
                                                    </button>
                                                </h2>
                                                <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="accordionCurso"><!--El contenido de la linea--><!--El controlador apunta al padre-->
                                                    <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                        Vestibulum in dui eget tortor egestas tristique. Aliquam ut justo pellentesque, tristique lectus non, malesuada nisi. In lobortis nunc ac eleifend dictum. 
                                                        Mauris sed ligula leo. Donec in tortor quam. Suspendisse et massa dapibus, egestas odio non, luctus nulla. Sed molestie augue at fringilla molestie.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>

                                <div class="row-fluid">
                                    <div class="col">
                                        <h1>Requisitos</h1>
                                        <ul>
                                            <li>Acceso a una PC</li>
                                            <li>Windows vista o superior</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="col">
                                        <h1>Descripción del curso</h1>
                                        <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong> Aliquam faucibus, purus in tincidunt auctor, dui lacus ultrices ante, ac gravida diam metus eu ligula. Praesent eu enim orci. Curabitur id justo dolor. Integer vestibulum arcu arcu, in venenatis odio aliquet vitae. Vestibulum aliquet quam egestas sagittis mattis. Curabitur eleifend hendrerit dui, sit amet blandit velit tempus sit amet. Aliquam erat volutpat. Maecenas consectetur vitae nulla id euismod.
    
                                            Cras eleifend turpis in sem fringilla fringilla. Vestibulum sodales velit a ex suscipit convallis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis at elit sagittis, scelerisque lectus eu, convallis ligula. Aenean consectetur lacus magna, quis congue libero laoreet eu. In a ex vitae quam porttitor luctus. Curabitur nec ex quam. Cras sit amet efficitur magna. Quisque id malesuada urna. Maecenas molestie, ante ut pretium laoreet, lectus sem vehicula mi, vestibulum rhoncus purus lacus at arcu. Donec lobortis eros sapien, et hendrerit lorem bibendum sit amet. Nunc eu gravida tellus, vel egestas elit. In euismod placerat urna nec faucibus. Duis nisi nunc, tempor et venenatis id, gravida et quam.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mx-auto">
                                        <h1>Instructor</h1>
                                        <h5><a href="perfil.html" class="link-success text-decoration-none" >Alejandro Martinez Iñarritu</a></h5>
                                        <p class="text-secondary">Instructor de Python</p>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-2">
                                                    <a href="perfil.html">
                                                        <img src="https://banner2.kisspng.com/20180615/rtc/kisspng-avatar-user-profile-male-logo-profile-icon-5b238cb002ed52.870627731529056432012.jpg" 
                                                        class="img rounded-circle img-fluid" alt=". . .">
                                                    </a>
                                                </div>
                                                <div class="col-8 lh-1">
                                                    <p>Reseñas</p>
                                                    <p>Cursos</p>
                                                    <p>Estudiantes</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mx-auto">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae commodo dui. Nunc commodo lacus venenatis libero finibus vestibulum. Curabitur ac aliquet nisl. Phasellus enim metus, ultrices non rutrum at, mollis in sapien. Morbi elementum aliquam hendrerit. In enim magna, rhoncus sodales efficitur ac, tempus quis metus. Cras fermentum malesuada ullamcorper.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col mx-auto">
                                        <h1>Reseñas</h1>

                                    </div>
                                </div>
                            </div>


                            <!--Lista izquierda-->
                        </div>
                        <div class="col-4">
                            <div class="card shadow-lg">
                                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmiro.medium.com%2Fmax%2F12032%2F0*Q8DDPKbl1Jek0i0a&f=1&nofb=1" 
                                alt="imagen" class="card-img-top">
                                <div class="card-body">
                                    <h4 class="card-title">$499.99</h4>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-outline-danger">Comprar ahora</button>
                                        <button class="btn btn-outline-secondary">Agregar al carrito</button>
                                    </div>
                                    <hr>
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

                        <div class="container-fluid">
                            <div class="row mb-5">
                                <div class="col-2">
                                    <a href="perfil.html">
                                        <img src="https://banner2.kisspng.com/20180615/rtc/kisspng-avatar-user-profile-male-logo-profile-icon-5b238cb002ed52.870627731529056432012.jpg" 
                                        class="img rounded-circle img-fluid" alt=". . .">
                                    </a>
                                </div>
                                <div class="col-8 lh-1 align-middle">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Dejanos un comentario" id="commentInput" style="height: 100px"></textarea>
                                        <label for="commentInput">Comentario</label>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" id="BarraComentarios">
                                <div class="row mb-5 shadow-sm" id="ComentarioReseña">
                                    <div class="col">
                                        <a href="perfil.html">
                                            <img src="https://banner2.kisspng.com/20180615/rtc/kisspng-avatar-user-profile-male-logo-profile-icon-5b238cb002ed52.870627731529056432012.jpg" 
                                            class="img rounded-circle img-fluid" alt=". . .">
                                        </a>
                                    </div>
                                    <div class="col-11 lh-1">
                                        <div class="col mx-auto">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae commodo dui. Nunc commodo lacus venenatis libero finibus vestibulum. Curabitur ac aliquet nisl. Phasellus enim metus, ultrices non rutrum at, mollis in sapien. Morbi elementum aliquam hendrerit. In enim magna, rhoncus sodales efficitur ac, tempus quis metus. Cras fermentum malesuada ullamcorper.</p>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    for(var i=0; i<7; i++){
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