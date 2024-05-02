<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false) {
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAutenticado() : void {
    session_start();
    if (!$_SESSION['login']) {
        header('Location: /');
        exit;
    }
}

function debuguear($object) : void {
    echo '<pre>';
    var_dump($object);
    echo '</pre>';
    exit;
}

// Sanitizar html
function s(string $html) : string {
    return htmlspecialchars($html);
}

// Validar tipo de contenido
function validarContenido(string $tipo): bool {
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

// Mostrar mensajes
function mostrarNotificacion(int $codigo): string {
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        default:
            $mensaje = '';
            break;
    }

    return $mensaje;
}

// Validar id en la URL (Pathvariable)
function validarORedireccionar(string $url): int {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    // Verificar id
    if (!$id) {
        header('Location: ' . $url . '?resultado=404');
        exit();
    }

    return $id;
}