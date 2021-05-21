var starBase1 = document.getElementById("Star1").className;
var starBase2 = document.getElementById("Star2").className;
var starBase3 = document.getElementById("Star3").className;
var starBase4 = document.getElementById("Star4").className;
var starBase5 = document.getElementById("Star5").className;

document.getElementById("Star1").onmouseover = function(){
    this.className += ' checked';
};
document.getElementById("Star2").onmouseover = function(){
    document.getElementById("Star1").className += ' checked';
    this.className += ' checked';
};
document.getElementById("Star3").onmouseover = function(){
    document.getElementById("Star1").className += ' checked';
    document.getElementById("Star2").className += ' checked';
    this.className += ' checked';
};
document.getElementById("Star4").onmouseover = function(){
    document.getElementById("Star1").className += ' checked';
    document.getElementById("Star2").className += ' checked';
    document.getElementById("Star3").className += ' checked';
    this.className += ' checked';
};
document.getElementById("Star5").onmouseover = function(){
    document.getElementById("Star1").className += ' checked';
    document.getElementById("Star2").className += ' checked';
    document.getElementById("Star3").className += ' checked';
    document.getElementById("Star4").className += ' checked';
    this.className += ' checked';
};
/* $$$$$$$$$$$$$$ %%%%%%%%%%%%%%%%%%% $$$$$$$$$$$$$$$ %%%%%%%%%%%%%%%%%% $$$$$$$$$$$$ %%%%%%%%%% */
function CleanStars(){
    document.getElementById("Star1").className = starBase1;
    document.getElementById("Star2").className = starBase2;
    document.getElementById("Star3").className = starBase3;
    document.getElementById("Star4").className = starBase4;
    document.getElementById("Star5").className = starBase5;
}
/* $$$$$$ %%%%%%%%% $$$$$$$$$$$ %%%%%%%%%% $$$$$$$$ %%%%%%%% $$$$$$$$$$ %%%%%%%% $$$$$$$$$ %%%%%%% */
function Calificar(e, idUser, Curso,  Estado){
    if(idUser == -1){
        alert("Ingresar sesion para calificar");
        return false;
    }
    if(Estado == 'Deseado' || Estado == 'Ninguno'){
        alert("Debe de comprar el curso para calificar!");
        return false;
    }
    switch(e.id){
        case 'Star1':{
            console.log((e.id).substr(4,5) + " " + Curso + " " + idUser);
            starBase1 = 'fa fa-star col-auto checked';
            starBase2 = 'fa fa-star col-auto';
            starBase3 = 'fa fa-star col-auto';
            starBase4 = 'fa fa-star col-auto';
            starBase5 = 'fa fa-star col-auto';
            CleanStars();
            CalificarCurso(idUser, Curso, 1);
            break;
        }
        case 'Star2':{
            console.log((e.id).substr(4,5) + " " + Curso + " " + idUser);
            starBase1 = 'fa fa-star col-auto checked';
            starBase2 = 'fa fa-star col-auto checked';
            starBase3 = 'fa fa-star col-auto';
            starBase4 = 'fa fa-star col-auto';
            starBase5 = 'fa fa-star col-auto';
            CleanStars();
            CalificarCurso(idUser, Curso, 2);
            break;
        }
        case 'Star3':{
            console.log((e.id).substr(4,5) + " " + Curso + " " + idUser);
            starBase1 = 'fa fa-star col-auto checked';
            starBase2 = 'fa fa-star col-auto checked';
            starBase3 = 'fa fa-star col-auto checked';
            starBase4 = 'fa fa-star col-auto';
            starBase5 = 'fa fa-star col-auto';
            CleanStars();
            CalificarCurso(idUser, Curso, 3);
            break;
        }
        case 'Star4':{
            console.log((e.id).substr(4,5) + " " + Curso + " " + idUser);
            starBase1 = 'fa fa-star col-auto checked';
            starBase2 = 'fa fa-star col-auto checked';
            starBase3 = 'fa fa-star col-auto checked';
            starBase4 = 'fa fa-star col-auto checked';
            starBase5 = 'fa fa-star col-auto';
            CleanStars();
            CalificarCurso(idUser, Curso, 4);
            break;
        }
        case 'Star5':{
            console.log((e.id).substr(4,5) + " " + Curso + " " + idUser);
            starBase1 = 'fa fa-star col-auto checked';
            starBase2 = 'fa fa-star col-auto checked';
            starBase3 = 'fa fa-star col-auto checked';
            starBase4 = 'fa fa-star col-auto checked';
            starBase5 = 'fa fa-star col-auto checked';
            CleanStars();
            CalificarCurso(idUser, Curso, 5);
            break;
        }
    }
}

function CalificarCurso(IdUsuario, Curso, Calificacion){
    var Calificar = new FormData();
    Calificar.append('idUsuario',IdUsuario);
    Calificar.append('idCurso',Curso);
    Calificar.append('Calificacion',Calificacion);
    fetch('CalificarCurso.php',{method:"POST",body:Calificar})
    .then(response => {
        return response.text();
    })
    .then(data => {
    if(data!=null){
        console.log(data);
    }
    else
        console.log("Ocurrio un error");
    });
}