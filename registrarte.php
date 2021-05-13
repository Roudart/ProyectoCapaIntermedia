<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>


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
                <div class="col-6 mx-auto">
                    <h1>
                       Inscribete y obten 30% de descuento 
                    </h1>
                    <hr>

                    <form action = "registrarUsuario.php" method = "post" name="SignInForm">
                    
                        <div class="row mb-3">
                            <div class="col-6 mx-auto">
                                <label for="fileButton">
                                    <img id="blah" src="https://banner2.kisspng.com/20180615/rtc/kisspng-avatar-user-profile-male-logo-profile-icon-5b238cb002ed52.870627731529056432012.jpg"
                                    class="img rounded-circle img-fluid" alt=". . .">
                                </label>
                                <input type="file" value="upload" id="fileButton" onChange="PreviewImage();" accept="image/jpeg, image/png, image/gif" style="display: none;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">

                                <input type="text" class="form-control" placeholder="Nombre" id="nomReg" name="nomReg">


                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">

                                <input type="text" class="form-control" placeholder="Apellido paterno" id="ApePReg" name="ApePReg">

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">

                                <input type="text" class="form-control" placeholder="Apellido materno" id="ApeMReg" name="ApeMReg">

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">

                                <input type="text" class="form-control" placeholder="Apodo" id="apoReg" name="apoReg">

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">

                                <input type="email" class="form-control" placeholder="Correo Electronico" id="correoReg" name="correoReg">

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">

                                <input type="password" class="form-control" placeholder="Contraseña" id="contraReg" name="contraReg">

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6 mx-auto">
                                <div class="d-grid gap-2">

                                    <button onclick="validarRegistro()" type="button" class="btn btn-danger btn-lg">Regístrate</button>

                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <h6 class="mx-auto col-6">
                                    ¿Ya tienes cuenta? <a href="">Inicia sesión</a> 
                                </h6>
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
var fileButton = document.getElementById("fileButton");


function PreviewImage() {

    var ImagenesPermitidas = ["image/jpeg", "image/png", "image/gif"];

        if(ImagenesPermitidas.indexOf(document.getElementById("fileButton").files[0].type) == -1){
        alert("El archivo escogido no es permitido \nutilice archivos tipo .jpeg, .png o .gif")
        return false;
        }

        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("fileButton").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("blah").src = oFREvent.target.result;
        };
    };

function UploadImage(){
    //Get File
    var e = document.getElementById("fileButton");
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

// Listen for file selected
// fileButton.addEventListener('change', function(e){
//     //Get File
//     var file = e.target.files[0];

//     //Create storage ref
//     var storageRef = firebase.storage().ref('fotos/' + file.name);

//     // Upload file
//     var task = storageRef.put(file);

//     task.on('state_changed', 
    
//         function progress(snapshot){
//             var percentage = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
//             console.log(percentage);
//         },

//         function error(err){

//         },

//         function complete(){

//         }
//     );

// });
</script>
</body>
</html>