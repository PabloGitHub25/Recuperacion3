// Función para abrir la ventana modal de edición
function openEditModal(userId) {
    // Obtener la ventana modal de edición
    var modal = document.getElementById("editModal");

    // Mostrar la ventana modal
    modal.style.display = "block";

    // Obtener los datos del usuario mediante AJAX y llenar el formulario de edición
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Parsear la respuesta JSON
            var userData = JSON.parse(this.responseText);
            // Llenar el formulario de edición con los datos del usuario
            document.getElementById("editUserId").value = userData.idUser;
            document.getElementById("editNombre").value = userData.nombreUser;
            document.getElementById("editEmail").value = userData.emailUser;
        }
    };
    xhttp.open("GET", "../Model/MBuscarDatosUsuario.php?idUser=" + userId, true);
    xhttp.send();
}

// Función para cerrar la ventana modal de edición
function closeEditModal() {
    // Obtener la ventana modal de edición
    var modal = document.getElementById("editModal");
    // Ocultar la ventana modal
    modal.style.display = "none";
}

// Cerrar la ventana modal si el usuario hace clic fuera de ella
window.onclick = function(event) {
    var modal = document.getElementById("editModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


//Update Modal

// Función para abrir la ventana modal con los datos actualizados del usuario
function openUpdatedModal(userData) {
    // Obtener el elemento modal
    var modal = document.getElementById('updatedModal');

    // Obtener el elemento donde se mostrarán los datos del usuario
    var userDataElement = document.getElementById('userData');

    // Limpiar el contenido anterior en caso de que exista
    userDataElement.innerHTML = '';

    // Crear un elemento de lista para mostrar los datos del usuario
    var ul = document.createElement('ul');

    // Iterar sobre los datos del usuario y agregarlos a la lista
    for (var key in userData) {
        var li = document.createElement('li');
        li.textContent = key + ': ' + userData[key];
        ul.appendChild(li);
    }

    // Agregar la lista al elemento userData
    userDataElement.appendChild(ul);

    // Mostrar la ventana modal
    modal.style.display = 'block';
}

// Función para cerrar la ventana modal
function closeUpdatedModal() {
    // Obtener el elemento modal
    var modal = document.getElementById('updatedModal');

    // Ocultar la ventana modal
    modal.style.display = 'none';
}

// Cerrar la ventana modal si el usuario hace clic fuera de ella
window.onclick = function(event) {
    var modal = document.getElementById('updatedModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
