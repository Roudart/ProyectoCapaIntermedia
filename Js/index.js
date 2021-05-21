var LastSearchedWord = "";

function MasVendidos(){
    console.log("Mas vendidos");
    document.forms["formMasVendidos"].submit();
}

function MasRecientes(){
    console.log("Mas recientes");
    document.forms["formMasRecientes"].submit();
}

function MejorCalificados(){
    console.log("Mejor calificados");
    document.forms["formMejorCalificados"].submit();
}

function Results(e){
    var busqueda = e.value;
    if(busqueda == LastSearchedWord){
        return false;
    }
    LastSearchedWord = busqueda;
    console.log(busqueda);
    autocomplete(document.getElementById("myInput"), countries);
    return false;
    var Search = new FormData();
    Search.append('Busqueda', busqueda);
    fetch('deleteUser.php',{method:"POST",body:Search})
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

