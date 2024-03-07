<?php 
// Iniciar sesión
session_start();
// Obtén la URL de referencia
if (isset($_SERVER['HTTP_REFERER'])) {
    $url = $_SERVER['HTTP_REFERER'];
} else {
    $url = "/";
}
// Configuración de idioma por defecto y lista de idiomas admitidos
$idioma_por_defecto = "en";

// Inicializa la variable $lenguaje
if (isset($_SESSION["lang"])) {
    $lenguaje = $_SESSION["lang"];
} else {
    $lenguaje = $idioma_por_defecto;
}
// Verifica si se proporciona un nuevo idioma en la URL y actualiza la sesión
if (isset($_REQUEST["lang"])) {
    $nuevoLenguaje = $_REQUEST["lang"];
    $_SESSION["lang"] = $nuevoLenguaje;
    $lenguaje = $nuevoLenguaje;
     // Redirige a la URL de referencia con el idioma seleccionado
     header('Location: ' . $url . '');
   
}


// Validar la URL de referencia antes de redirigir
if (!filter_var($url, FILTER_VALIDATE_URL)) {
    $url = "/";
}


?>