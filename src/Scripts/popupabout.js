// Función para cambiar el texto del botón
function showPopup(message) {
    //coje el texto del boton 
    const submitButton = document.querySelector('button[type="submit"]');
    const textbutton = submitButton.textContent;
    submitButton.textContent = message;
     submitButton.classList.add('button-dark');

    // Oculta el popup después de 3 segundos (3000 ms)
    setTimeout(function() {
        submitButton.textContent = textbutton;
        submitButton.classList.remove('button-dark');
    }, 5000); // El popup desaparecerá después de 5 segundos
}

// Llama a la función con el mensaje según el estado
document.addEventListener('DOMContentLoaded', function() {
    const params = new URLSearchParams(window.location.search);
    const status = params.get("status");

    if (status === "ok") {
        showPopup("Mensaje enviado con éxito.");
    } else if (status === "error_campos") {
        showPopup("Todos los campos son obligatorios.");
    } else if (status === "error_db") {
        showPopup("Error al guardar en la base de datos.");
    } else if (status === "error_conexion") {
        showPopup("Error al conectar con la base de datos.");
    }
    
});
