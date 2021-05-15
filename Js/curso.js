var Selected = 0;
var RequisitosIndex = 0;
var TemasIndex = 0;
 

function AgregarSelected(e){
    console.log(e.value);
    console.log(e.selectedIndex);
    var contenedor = document.getElementById("CategoriasDiv");
    var Categoria = document.createElement("INPUT");//Creamos el elemento tipo boton
    Categoria.setAttribute("id", "Selected"+Selected); //A ese objeto le ponemos un id autoincrementable provisional
    Categoria.setAttribute("name","Selected"+Selected); //A ese objeto le ponemos un nombre autoincrementable provisional
    Categoria.className += "form-control";//Se agregan las clases
    Categoria.className += " form-control-sm";
    Categoria.className += " mb-3";
    Categoria.setAttribute("type", "text");
    Categoria.setAttribute("onclick", "QuitarSelected(this);");
    Categoria.value = e.value
    Categoria.readOnly = true;
    contenedor.appendChild(Categoria);
    e.remove(e.selectedIndex);
    Selected+=1;
}

function QuitarSelected(e){
    console.log(e.value);
    var select = document.getElementById("SelectCategoria");
    var opcion = document.createElement("option");
    opcion.text = e.value;
    select.appendChild(opcion);
    e.remove(e);
    Selected-=1;
}

function CrearRequisito(){
    if(RequisitosIndex<=6){   
        RequisitosIndex+=1; 
        var contenedor = document.getElementById("RequisitosDiv");
        var NuevoRequisito = document.createElement("INPUT");//Creamos el elemento tipo input
        NuevoRequisito.setAttribute("id","InputRequisito"+RequisitosIndex); //A ese objeto le ponemos un id autoincrementable provisional
        NuevoRequisito.setAttribute("name","InputRequisito"+RequisitosIndex); //A ese objeto le ponemos un nombre autoincrementable provisional
        NuevoRequisito.className += "form-control";//Se agregan las clases
        NuevoRequisito.className += " form-control-sm";
        NuevoRequisito.className += " mb-3";
        NuevoRequisito.setAttribute("type", "text");
        contenedor.appendChild(NuevoRequisito);
        console.log(NuevoRequisito.id);
        console.log(RequisitosIndex);
    }else{
        alert("Solo puede tener 7 requisitos Maximo!");
    }

}

function EliminarRequisito(){
    if(RequisitosIndex>=1){
        console.log(RequisitosIndex);
        var Requisito = document.getElementById("InputRequisito" + RequisitosIndex);
        console.log(Requisito.id);
        Requisito.remove();
        RequisitosIndex-=1;
    }else{
        alert("Minimo debes tener un requisito!");
    }
}

function CrearTema(){
    if(TemasIndex<=8){   
        TemasIndex+=1; 
        var contenedor = document.getElementById("TemasDiv");
        var NuevoTema = document.createElement("INPUT");//Creamos el elemento tipo input
        NuevoTema.setAttribute("id","InputNombreTema"+TemasIndex); //A ese objeto le ponemos un id autoincrementable provisional
        NuevoTema.setAttribute("name","InputNombreTema"+TemasIndex); //A ese objeto le ponemos un nombre autoincrementable provisional
        NuevoTema.className += "form-control";//Se agregan las clases
        NuevoTema.className += " mb-3";
        NuevoTema.setAttribute("type", "text");
        NuevoTema.setAttribute("placeholder", "Nombre del tema");
        NuevoTema.setAttribute("aria-controls", "collapseTema"+TemasIndex);
        NuevoTema.setAttribute("aria-expanded", "false");
        NuevoTema.setAttribute("role", "button");
        NuevoTema.setAttribute("href", "#collapseTema"+TemasIndex);
        NuevoTema.setAttribute("data-bs-toggle", "collapse"); //Agregamos atributos del titulo colapse
        var refBefore = document.getElementById("divButtonsTeams");
        contenedor.insertBefore(NuevoTema,refBefore);
        console.log(NuevoTema.id);
        console.log(TemasIndex);

        var NuevoContenedorCollapse = document.createElement("div");
        NuevoContenedorCollapse.setAttribute("id", "collapseTema"+TemasIndex);
        NuevoContenedorCollapse.className += "collapse";

        var NuevoTemaArea = document.createElement("textarea")
        NuevoTemaArea.setAttribute("id", "TextAreaTema"+TemasIndex);
        NuevoTemaArea.setAttribute("name", "TextAreaTema"+TemasIndex);
        NuevoTemaArea.className += "form-control";
        NuevoTemaArea.className += " mb-3";
        NuevoTemaArea.setAttribute("placeholder", "Descripción detallada sobre el tema...");
        NuevoTemaArea.setAttribute("rows", "3");

        NuevoContenedorCollapse.appendChild(NuevoTemaArea);
        contenedor.insertBefore(NuevoContenedorCollapse, refBefore);
    }else{
        alert("Solo puede tener 10 temas Maximo!");
    }

}

function EliminarTema(){
    if(TemasIndex>=1){
        console.log(TemasIndex);
        var Tema = document.getElementById("InputNombreTema" + TemasIndex);
        var TemaTextArea = document.getElementById("TextAreaTema" + TemasIndex);
        console.log(Tema.id);
        console.log(TemaTextArea.id);
        Tema.remove();
        TemaTextArea.remove();
        TemasIndex-=1;
    }else{
        alert("Minimo debes tener un tema!");
    }
}

function validarCurso(){

    if( document.getElementById("fileButton2").value == ""){
        alert("Debe seleccionar una imagen para el curso");
        return false;
    }

    var ImagenesPermitidas = ["image/jpeg", "image/png", "image/gif"];
    var laImagen = document.getElementById("fileButton2").files[0];

        if(ImagenesPermitidas.indexOf(document.getElementById("fileButton2").files[0].type) == -1){
        alert("El archivo escogido no es permitido \nutilice archivos tipo .jpeg, .png o .gif")
        return false;
    }

    if ((document.getElementById("InputTitulo").value) === ''){
        alert("El titulo está vacío");
        return false;
    }

    console.log("Titulo");

    if ((document.getElementById("InputDescripcion").value) === ''){
        alert("La descripción está vacía");
        return false;
    }

    console.log("Desc");

    var forIndex = 0;
    var todoLleno = true;
    var mensaje = "Falta nombre en tema: ";
    var mensaje2 = "Falta descripción en tema: ";

    do {
        if ((document.getElementById("InputNombreTema"+forIndex).value) === ''){
            mensaje = (mensaje + forIndex + ", ");
            //alert("El nombre del tema " + TemasIndex + " está vacío");
            todoLleno = false;
        }   
    
        console.log("InputNombreTema"+forIndex);

        if ((document.getElementById("TextAreaTema"+forIndex).value) === ''){
            mensaje2 = (mensaje2 + forIndex + ", ");
            //alert("La descripción del tema " + TemasIndex + " está vacía");
            todoLleno = false;
        }   
    
        console.log("TextAreaTema"+forIndex);

        forIndex++;
    } while (forIndex < TemasIndex + 1);

    if(todoLleno == false){
        alert(mensaje + "\n" + mensaje2);
         return false;
     }

     forIndex = 0;

     mensaje = "Los siguintes requisitos están vacíos: ";

     do {
        if ((document.getElementById("InputRequisito"+forIndex).value) === ''){
            mensaje = (mensaje + forIndex + ", ");
            todoLleno = false;
        }   
    
        console.log("InputRequisito"+forIndex);

        forIndex++;
    } while (forIndex < RequisitosIndex + 1);

    if(todoLleno == false){
        alert(mensaje);
         return false;
     }

     var elemCategoria = document.getElementById("Selected0");

     if(elemCategoria == null){
         alert("El curso debe contar con al menos una categoría");
         return false;
     }
     
     if((document.getElementById("PrecioInput").value) <= 0){
         alert("el curso no puede ser gratis");
         return false;
     }

     document.getElementById("FormCrearCurso").submit();

}