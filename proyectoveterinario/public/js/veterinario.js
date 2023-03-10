function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

async function drop(ev) {
    ev.preventDefault();
    ev.dataTransfer.getData("text").draggable = true;

    console.log(ev.target)

    //console.log(ev.currentTarget.innerHTML);

    /*if (!ev.currentTarget.innerHTML) {*/
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));

    let options = {
        method: "PUT",
        headers: {"Content-type": "application/json; charset=utf-8"},
    };
    let respuesta = await axios(`http://localhost/Cristobal/public/api/apianimal/${data}`, options);
    let json = await respuesta.data;

    location.reload();

    /*} else {
        console.log("hola");
        ev.dataTransfer.getData("text").draggable = false;
    }*/
}


/*
Desplegar el formulario de registro de un nuevo cliente
 */
var btnRegistroCliente = document.getElementById('btnNuevoCliente');

if (btnRegistroCliente != null) {
    btnRegistroCliente.addEventListener('click', function () {
        var btnAnnadirAnimal = document.querySelector("#btnAnnadirAnimal");
        var btnNuevoCliente = document.querySelector("#btnNuevoCliente");
        var formNewClient = document.getElementById("formNewClient");

        var classList = formNewClient.classList;

        classList.forEach(element => {
            if (element == "d-none") {
                formNewClient.classList.remove("d-none");
                formNewClient.classList.add("d-block");
                btnAnnadirAnimal.classList.add("disabled");
                btnNuevoCliente.setAttribute("value", "Cancelar");

            } else if (element == "d-block") {
                formNewClient.classList.remove("d-block");
                formNewClient.classList.add("d-none");
                btnAnnadirAnimal.classList.remove("disabled");
                btnNuevoCliente.setAttribute("value", "¿Nuevo cliente?");
            }
        });
    });
}



//Mostrar la imagen cargada en el input-text del registro de animales
var inputImagen = document.getElementById("fotoAnimalInput");
var imgAnimal = document.getElementById("imgAnimal");

if (inputImagen != null) {
    inputImagen.addEventListener("change", function () {
        // Los archivos seleccionados, pueden ser muchos o uno
        const archivos = inputImagen.files;
        // Si no hay archivos salimos de la función y quitamos la imagen
        if (!archivos || !archivos.length) {
            imgAnimal.src = "";
            return;
        }
        // Ahora tomamos el primer archivo, el cual vamos a previsualizar
        const primerArchivo = archivos[0];
        // Lo convertimos a un objeto de tipo objectURL
        const objectURL = URL.createObjectURL(primerArchivo);
        // Y a la fuente de la imagen le ponemos el objectURL
        imgAnimal.src = objectURL;
    });
}

//Controlar cuando se ha escrito un coste de vacuna para poder imprimir la factura
var inputcosteVacunacion = document.getElementById('costeVacunacion');

if (inputcosteVacunacion != null) {
    var btnImprimir = document.getElementById('imprimir');

    inputcosteVacunacion.addEventListener('change', function () {
        btnImprimir.removeAttribute('disabled');
        inputcosteVacunacion.setAttribute('disabled', 'true');
    });

    if (inputcosteVacunacion.getAttribute('disabled') == 'true') {
        btnImprimir.removeAttribute('disabled');
        console.log('hola')
    }
}

//Imprimir la factura
async function imprimir(costeVacunacion) {
    //Actualización del coste de la vacuna del animal
    var id = document.getElementById('idAnimal').innerText;

    let options = {
        method: "PUT",
        headers: {"Content-type": "application/json; charset=utf-8"},
    };
    let respuesta = await axios(`http://localhost/Cristobal/public/api/apianimal/${id}/${costeVacunacion}`, options);
    let json = await respuesta.data;

}
