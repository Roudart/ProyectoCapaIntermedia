function crearCategoria(e){
    var CategoriaRef = document.getElementById("InputCategoria");
    var ColorRef = document.getElementById("ColorInputCategoria");
    console.log(CategoriaRef.value);
    console.log(ColorRef.value);

    var Create = new FormData();
    Create.append('InputCategoria',CategoriaRef.value);
    Create.append('ColorInputCategoria',ColorRef.value);
    fetch('crearCategoria.php',{method:"POST",body:Create})
    .then(response => {
        return response.text();
    })
    .then(data => {
    if(data!="exito"){

        var contenedor = document.getElementById("CategoriaNuevaDiv");
        var Nuevacategoria = document.createElement("span");
        Nuevacategoria.setAttribute("id", "Categoria"+data);
        Nuevacategoria.setAttribute("name", "Categoria"+data);
        Nuevacategoria.className += "badge";
        Nuevacategoria.className += " rounded-pill";
        Nuevacategoria.className += " mb-3";
        Nuevacategoria.innerText= CategoriaRef.value;
        Nuevacategoria.style.backgroundColor = ColorRef.value;
        contenedor.appendChild(Nuevacategoria);
        CategoriaRef.value = null;
        console.log("Categoria agregada correctamente: " + data);
    }
    else
        console.log(data);
})
}