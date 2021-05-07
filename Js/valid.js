
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

    console.log("nombre");

    apeP = document.getElementById("ApePReg").value;
    if (apeP == null || apeP.length == 0 || /\d/.test(apeP) || /^\s+$/.test(apeP)) {
        alert("agregue un apellido P valido");
        return false;
    }

    console.log("apeP");

    apeM = document.getElementById("ApeMReg").value;
    if (apeM == null || apeM.length == 0 || /\d/.test(apeM) || /^\s+$/.test(apeM)) {
        alert("agregue un apellido M valido");
        return false;
    }

    console.log("apeM");

    apod = document.getElementById("apoReg").value;
    if (apod == null || apod.length == 0 || /\d/.test(apod) || /^\s+$/.test(apod)) {
        alert("agregue un apodo valido");
        return false;
    }

    console.log("apodo");

    correo = document.getElementById("correoReg").value;
    if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(correo))) {
        alert("agregue un correo valido");
        return false;
    }

    console.log("correo");

    contra = document.getElementById("contraReg").value;
    if (contra == null || (contra.length < 8 || contra.length > 15) || /^[a-zA-Z0-9]+$/.test(contra)) {
        alert("agrege una contraseña valida");
        return false;
    }
    
    console.log("contra"); 
    UploadImage();
    return true;
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