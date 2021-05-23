<?php
include 'conexionPHP.php';
$UID = $_GET["Alumno"] . $_GET["Maestro"];
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


        <div class="container">
            <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png" alt="Avatar">
            <p>Hello. How are you today?</p>
            <span class="time-right">11:00</span>
        </div>

        <div class="container darker">
            <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png" alt="Avatar" class="right">
            <p>Hey! I'm fine. Thanks for asking!</p>
            <span class="time-left">11:01</span>
        </div>

        <div class="container">
            <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png" alt="Avatar">
            <p>Sweet! So, what do you wanna do today?</p>
            <span class="time-right">11:02</span>
        </div>

        <div class="container darker">
            <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png" alt="Avatar" class="right">
            <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
            <span class="time-left">11:05</span>
        </div>

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

    function EnviarMensaje(e) {

        let current = new Date();
        let cDate = current.getFullYear() + '-' + (current.getMonth() + 1) + '-' + current.getDate();
        let cTime = current.getHours() + ":" + current.getMinutes() + ":" + current.getSeconds();
        let dateTime = cDate + ' ' + cTime;

        var storageRef = firebase.database().ref('mensajes/' + <?php echo $_GET["Alumno"] ?>).push({
            De: "<?php echo $_GET["Alumno"] ?>",
            Para: "<?php echo $_GET["Maestro"] ?>",
            Mensaje: mensaje
        });
        storageRef = firebase.database().ref('mensajes/' + <?php echo $_GET["Maestro"] ?>).push({
            De: "<?php echo $_GET["Maestro"] ?>",
            Para: "<?php echo $_GET["Alumno"] ?>",
            Mensaje: mensaje
        });
    }

    var starCountRef = firebase.database().ref();
    starCountRef.child("mensajes").child("<?php echo $_GET["Alumno"]?>").get().then((snapshot) => {
        if (snapshot.exists()) {
            console.log(snapshot.val());
        } else {
            console.log("No data available");
        }
    }).catch((error) => {
        console.error(error);
    });
</script>

<script src="Js/Chat.js"></script>

</html>