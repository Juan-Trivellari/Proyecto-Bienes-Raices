<?php

namespace MVC;

class Router {
    
    public array $rutasGET = [];
    public array $rutasPOST = [];

    public function get(string $url, array $fn): void {
        $this->rutasGET[$url] = $fn;
    }

    public function post(string $url, array $fn): void {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(): void {
        session_start();
        $auth = $_SESSION['login'] ?? null;
        $rutasProtegidad = ['/admin', 
        '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', 
        '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else if ($metodo === 'POST') {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        // Proteger rutas
        if (in_array($urlActual, $rutasProtegidad) && !$auth) {
            header('Location: /');
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo 'Página no encontrada';
        }
    }

    // Muestra una vista
    public function render(string $view, array $datos = []): void {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start(); // Iniciar almacenamiento en memoria
        include __DIR__ . "/view/{$view}.php";
        
        $contenido = ob_get_clean(); // Limpiar el buffer
        include __DIR__ . "/view/layout.php";
    }

}