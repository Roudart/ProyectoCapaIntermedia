var Selected = 0;
var RequisitosIndex = 0;
var TemasIndex = 0;
 

function AgregarSelected(e){
    console.log(e.size);
    console.log(e.value);
    console.log(e.selectedIndex);
    var contenedor = document.getElementById("CategoriasDiv");
    var Categoria = document.createElement("INPUT");//Creamos el elemento tipo boton
    Categoria.setAttribute("id", e.selectedIndex); //A ese objeto le ponemos un id autoincrementable provisional
    Categoria.setAttribute("name",e.selectedIndex); //A ese objeto le ponemos un nombre autoincrementable provisional
    Categoria.className += "form-control";//Se agregan las clases
    Categoria.className += " form-control-sm";
    Categoria.className += " mb-3";
    Categoria.setAttribute("type", "text");
    Categoria.setAttribute("onclick", "QuitarSelected(this);");
    Categoria.value = e.value
    Categoria.readOnly = true;
    contenedor.appendChild(Categoria);
    e.remove(e.selectedIndex);
}

function QuitarSelected(e){
    console.log(e.value);
    var select = document.getElementById("SelectCategoria");
    var opcion = document.createElement("option");
    opcion.text = e.value;
    select.appendChild(opcion);
    e.remove(e);
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
        console.log(Tema.id);
        Tema.remove();
        TemasIndex-=1;
    }else{
        alert("Minimo debes tener un tema!");
    }
}