function EliminarUsuario(idUsuario, id){
    idUsuario.remove();
    console.log(id);
    var Delete = new FormData();
                Delete.append('idUsuario',id);
                fetch('deleteUser.php',{method:"POST",body:Delete})
                .then(response => {
                    return response.text();
                })
                .then(data => {
                if(data=="exito"){
                    console.log("Eliminado usuario: " + id);
                }
                else
                    console.log(data);
  })
}



 
function ActualizarUsuario(type, id){
    console.log(id);
    var Update = new FormData();
    Update.append('idUsuario',id);
    Update.append('tipoUsuario',type);
                fetch('updateTypeUser.php',{method:"POST",body:Update})
                .then(response => {
                    return response.text();
                })
                .then(data => {
                if(data!="exito"){
                    console.log("Cambiado el tipo de usuaior :" + id + " a tipo de usuario: " + type);
                }
                else
                    console.log(data);
  })
}

function alerta(type, id){
    console.log("Tipo usuario es: " + type)
    console.log("Id usuario es: " + id)
}