function AgregarCursoListaDeseados(IdCurso, idUsuario){
    if(idUsuario == -1){
        return false;
    }
    console.log(IdCurso + " __ " + idUsuario + " __ " + 'Deseado');
    var boton = document.getElementById("BtnListaDeseados"); 
    var Agregar = new FormData();
    Agregar.append('idCurso', IdCurso);
    Agregar.append('idUsuario',idUsuario);
    Agregar.append('Estado', 1);
    fetch('AgregarCursoUsuario.php',{method:"POST",body:Agregar})
    .then(response => {
        return response.text();
    })
    .then(data => {
    if(data=="exito"){
        console.log(data);
        boton.className = "btn btn-danger btn-sm";
        boton.innerHTML = "Deseado";
    }
    else{
        console.log(data);
        boton.className = "btn btn-outline-danger btn-sm";
        boton.innerHTML = "Lista de deseados"
    }
})
}

function AgregarCursoCompra(IdCurso, idUsuario){
    if(idUsuario == -1){
        return false;
    }
    var respuesta = confirm("¿Seguro desea comprar el curso " +IdCurso +"?");
    if(respuesta){
        console.log(IdCurso + " __ " + idUsuario + " __ " + 'Comprado');
        var Comprar = new FormData();
        Comprar.append('idCurso', IdCurso);
        Comprar.append('idUsuario',idUsuario);
        Comprar.append('Estado', 3);
        fetch('AgregarCursoUsuario.php',{method:"POST",body:Comprar})
        .then(response => {
            return response.text();
        })
        .then(data => {
        if(data=="exito"){
            console.log(data);
            window.location.href = "perfil.php";
        }
        else{
            console.log(data);
        }
    })
    }else{
        console.log("Bueno, espero lo hagas luego");
    }
}