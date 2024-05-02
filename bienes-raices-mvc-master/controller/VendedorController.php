<?php

namespace Controller;

use MVC\Router;
use Model\Vendedor;

class VendedorController {

    public static function crear(Router $router) {
        $vendedor = new Vendedor();

        // Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vendedor = new Vendedor($_POST['vendedor']);

            // Validar
            $errores = $vendedor->validar();

            if (empty($errores)) {
                // Guardar en la base de datos
                $resultado = $vendedor->guardar();

                if ($resultado) {
                    // Redireccionar al usuario
                    header('Location: /admin?resultado=1');
                }
            }
        }

        return $router->render('/vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $idVendedor = validarORedireccionar('/admin');

        $vendedor = Vendedor::getByID($idVendedor);

        if (!$vendedor) {
            header('Location: /admin?resultado=404');
            exit();
        }

        // Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vendedor->sincronizar($_POST['vendedor']);

            // Validar
            $errores = $vendedor->validar();

            if (empty($errores)) {
                // Guardar en la base de datos
                $resultado = $vendedor->guardar();

                if ($resultado) {
                    // Redireccionar al usuario
                    header('Location: /admin?resultado=1');
                }
            }
        }

        return $router->render('/vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = filter_var($_POST['tipo']);

                if (validarContenido($tipo)) {
                    $vendedor = Vendedor::getByID($id);
                    $vendedor->eliminar();

                    // Redirige de vuelta a la página actual
                    header('Location: /admin?resultado=3');
                    exit;
                }
            }
        }
    }
    
}
