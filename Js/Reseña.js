function EnviarComentario(Usuario, Curso){
    console.log(Usuario);
    console.log(Curso);
    reseña = document.getElementById("commentInput").value;
    if(reseña == null || reseña == ""){
        alert("Dejanos un comentario");
        return false;
    }
    console.log(reseña);
    AñadirComentario(reseña);
}

function AñadirComentario(reseña){
    var Comentarios = document.getElementById("BarraComentarios");

    var contenedor = document.createElement("div");
    contenedor.setAttribute("id", "ReseñaContenedor");
    contenedor.className= "row mb-5 shadow-sm";

    var contenedorFoto = document.createElement("div");
    contenedorFoto.className = "col";
    var foto = document.createElement("a");
    foto.setAttribute("href", "perfil.php");
    var src = document.createElement("img");
    src.setAttribute("src", "https://banner2.kisspng.com/20180615/rtc/kisspng-avatar-user-profile-male-logo-profile-icon-5b238cb002ed52.870627731529056432012.jpg");
    src.setAttribute("alt", ". . .");
    src.className = "img rounded-circle img-fluid";

    contenedor.appendChild(contenedorFoto);
    contenedorFoto.appendChild(foto);
    foto.appendChild(src);


    var contenedorComentario = document.createElement("div");
    contenedorComentario.className = "col-11 lh-1";
    var contenedorTexto = document.createElement("div");
    contenedorTexto.className ="col mx-auto";
    var texto = document.createElement("p");
    texto.innerHTML = reseña;

    contenedor.appendChild(contenedorComentario);
    contenedorComentario.appendChild(contenedorTexto);
    contenedorTexto.appendChild(texto);

    var contenedorInfo = document.createElement("div");
    contenedorInfo.className = "row mb-3";
    var contenedorNombre = document.createElement("div");
    contenedorNombre.className = "col-sm align-self-start";
    var Nombre = document.createElement("strong");
    Nombre.innerHTML = "Mariposa";
    var contenedorFecha = document.createElement("div");
    var Fecha = document.createElement("strong");
    Fecha.innerHTML = "25/07/21";
    contenedorFecha.className = "col-sm align-self-end";

    contenedorComentario.appendChild(contenedorInfo);
    contenedorInfo.appendChild(contenedorNombre);
    contenedorInfo.appendChild(contenedorFecha);
    contenedorNombre.appendChild(Nombre);
    contenedorFecha.appendChild(Fecha);


    Comentarios.appendChild(contenedor);
}