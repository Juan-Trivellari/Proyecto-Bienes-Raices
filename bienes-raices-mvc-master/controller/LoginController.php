<?php

namespace Controller;

use MVC\Router;
use Model\Admin;

class LoginController {
    
    public static function login(Router $router) {
        $errores = Admin::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if (empty($errores)) {
                $resultado = $auth->existeUsuario();

                if($resultado) {
                    $autenticado = $auth->comprobarPassword($resultado);
                    
                    if ($autenticado) {
                        $auth->autenticar();
                    } else {
                        $errores = Admin::getErrores();
                    }
                } else {
                    $errores = Admin::getErrores();
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores,
        ]);
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

}