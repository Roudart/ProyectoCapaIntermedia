<?php
include 'conexionPHP.php';
$ConexionAlumno = new Conexion();
$ConexionMaestro = new Conexion();
$Alumno = $_GET["Alumno"];
$Maestro = $_GET["Maestro"];
if ($Alumno < $Maestro)
    $UID = $_GET["Alumno"] . $_GET["Maestro"];
else
    $UID = $_GET["Maestro"] . $_GET["Alumno"];

$DatosAlumno = $ConexionAlumno->BuscarUsuario($Alumno);
$DatosMaestro = $ConexionMaestro->BuscarUsuario($Maestro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="css/chat.css">
</head>

<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Shademy</a>
        <a href="MasRecientes.php">Cursos</a>
        <a href="perfil.php">Perfil</a>
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()">&#9776;</button>




        <div class="navbar">
            <input class="active" placeholder="Escribe un mensaje aquí" id="InputEnviar" name="InputEnviar"></input>
            <button type="button" id="BtnEnviar" name="BtnEnviar">Enviar</button>
        </div>
    </div>

</body>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->
<!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/8.4.0/firebase-storage.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-database.js"></script>



<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyBVcqywOYtxfSReOqczaske3yqwaWAv1i8",
        authDomain: "shademy-f9afe.firebaseapp.com",
        databaseURL: "https://shademy-f9afe-default-rtdb.firebaseio.com",
        projectId: "shademy-f9afe",
        storageBucket: "shademy-f9afe.appspot.com",
        messagingSenderId: "54990730142",
        appId: "1:54990730142:web:2d201893eb624e75d21c8f"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    var postListRef = firebase.database();

    function EnviarMensaje(e) {

        let current = new Date();
        let cDate = current.getFullYear() + '-' + (current.getMonth() + 1) + '-' + current.getDate();
        let cTime = current.getHours() + ":" + current.getMinutes() + ":" + current.getSeconds();
        let dateTime = cDate + ' ' + cTime;

        var newPostRef = postListRef.ref('mensajes/<?php echo $UID; ?>').push();
        newPostRef.set({
            De: <?php echo $Alumno; ?>,
            Para: <?php echo $Maestro; ?>,
            mensaje: e,
            hora: dateTime,
            NombreDe: "<?php echo $DatosAlumno["Apodo"]; ?>",
            NombrePara: "<?php echo $DatosMaestro["Apodo"]; ?>",
            ImagenDe: "<?php echo $DatosAlumno["Imagen"]; ?>",
            ImagenPara: "<?php echo $DatosMaestro["Imagen"]; ?>"
        });
    }

    function CrearMensajePara(imgURL, time, message, name) {
        var chat = document.getElementById("main");
        var mensaje = document.createElement("div");
        mensaje.className = "container";
        chat.appendChild(mensaje);

        var imagen = document.createElement("img");
        imagen.setAttribute("src", imgURL);
        imagen.setAttribute("alt", "Avatar");
        var contenido = document.createElement("p");
        contenido.innerHTML = message;
        var nombre = document.createElement("p");
        var NombreStr = document.createElement("strong");
        NombreStr.innerHTML = name;
        nombre.appendChild(NombreStr);
        var hora = document.createElement("span");
        hora.className = "time-right";
        hora.innerHTML = time;

        mensaje.appendChild(imagen);
        mensaje.appendChild(nombre);
        mensaje.appendChild(contenido);
        mensaje.appendChild(hora);
        mensaje.scrollIntoView();
    }

    function CrearMensajeDe(imgURL, time, message) {
        var chat = document.getElementById("main");
        var mensaje = document.createElement("div");
        mensaje.className = "container darker";
        chat.appendChild(mensaje);

        var imagen = document.createElement("img");
        imagen.setAttribute("src", imgURL);
        imagen.setAttribute("alt", "Avatar");
        imagen.className = "right";
        var contenido = document.createElement("p");
        contenido.innerHTML =message;
        var hora = document.createElement("span");
        hora.className = "time-left";
        hora.innerHTML = time;

        mensaje.appendChild(imagen);
        mensaje.appendChild(contenido);
        mensaje.appendChild(hora);
        mensaje.scrollIntoView();
    }

    var starCountRef = firebase.database().ref('mensajes/<?php echo $UID; ?>');
    starCountRef.on('child_added', (data) => {
        //console.log(data.key);
        starCountRef.child(data.key).get().then((snapshot) => {
            console.log(snapshot.val().De);
            console.log(snapshot.val().Para);
            console.log(snapshot.val().mensaje);
            console.log(snapshot.val().hora);
            console.log(snapshot.val().NombreDe);
            console.log(snapshot.val().NombrePara);
            console.log(snapshot.val().ImagenDe);
            console.log(snapshot.val().ImagenPara);
            if(snapshot.val().De == <?php echo $Alumno; ?>){
                CrearMensajeDe(snapshot.val().ImagenDe, snapshot.val().hora, snapshot.val().mensaje);
            }else{
                CrearMensajePara(snapshot.val().ImagenDe, snapshot.val().hora, snapshot.val().mensaje, snapshot.val().NombreDe);
            }
        });
    });
</script>

<script src="Js/Chat.js"></script>

</html>