
/*function validar(contenido){
    var alerta = "Éste campo debe ";
    var tieneTamaño;
    if(contenido.lenght >= 8){
        tieneTamaño = true;
    }
    var tieneNumero = /\d/.test(contenido); //verifica si contiene mínimo un número
    var tieneEspecial = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(contenido); //para carácteres especiales


}  */

function hayError() {
    alert("Se encontró un error");
}

function validarRegistro() {

    nombre = document.getElementById("nomReg").value;
    if (nombre == null || nombre.length == 0 || /\d/.test(nombre) || /^\s+$/.test(nombre)) {
        alert("agregue un nombre valido");
        return false;
    }

    correo = document.getElementById("correoReg").value;
    if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(correo))) {
        alert("agregue un correo valido");
        return false;
    }
    if (contra == null || (contra.length < 8 || contra.length > 15) || /^[a-zA-Z0-9]+$/.test(contra)) {
        alert("agrege una contraseña valida");
        return false;
    }

    alert("se ha registrado exitosamente");

}

function validarInicio() {

    correo = document.getElementById("correoIni").value;
    if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(correo))) {
        alert("correo no registrado");
        return false;
    }

    contra = document.getElementById("contraIni").value;
    if (contra == null || (contra.length < 8 || contra.length > 15) || /^[a-zA-Z0-9]+$/.test(contra)) {
        alert("contraseña invalida");
        return false;
    }

    alert("ha inicioado sesión");

}