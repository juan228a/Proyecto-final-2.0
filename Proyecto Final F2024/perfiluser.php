<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Directorio donde se guardarán las imágenes
    $directorio_destino = "publicaciones/";
    
    // Nombre y ubicación temporal del archivo subido
    $archivo_destino = $directorio_destino . basename($_FILES["imagen"]["name"]);
    
    // Mover el archivo subido al directorio de destino
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo_destino)) {
        // Archivo subido con éxito, guardar la publicación en una base de datos o en algún otro lugar
        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];
        $imagen = $archivo_destino;
        
        // Aquí puedes conectar a tu base de datos y guardar la información de la publicación
        
        // Redireccionar a una página de éxito
        header("Location: publicacion_exitosa.php");
        exit;
    } else {
        // Si ocurrió algún error al subir el archivo, mostrar un mensaje de error
        echo "Lo siento, ha ocurrido un error al subir la imagen.";
    }
}
?>