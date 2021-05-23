<?php
$NombreCurso = $_GET["NombreCurso"];
$NombreAlumno = $_GET["NombreAlumno"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/certificado.css">
    <title>Certificado</title>
</head>
<body>
        <div class="container">
            <img src="src/Certificado.jpg" alt=". . ." style="width:100%;">
            <div class="name"><?php echo $NombreAlumno;?></div>
            <div class="curso"><?php echo $NombreCurso;?></div>
        </div>
</body>
</html>