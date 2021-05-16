function AgregarCursoListaDeseados(IdCurso, idUsuario){
    if(idUsuario == -1)
        return false;
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