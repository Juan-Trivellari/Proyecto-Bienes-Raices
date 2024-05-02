<?php

namespace Controller;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController {

    public static function index(Router $router): void {
        $propiedades = Propiedad::getAll();
        $vendedores = Vendedor::getAll();
        $resultado = $_GET['resultado'] ?? null;
        
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado,
        ]);
    }

    public static function crear(Router $router): void {
        $propiedad = new Propiedad();
        $vendedores = Vendedor::getAll();

        // Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad = new Propiedad($_POST['propiedad']);

            // Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Setear imagen
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new ImageManager(new Driver());
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            // Validar
            $errores = $propiedad->validar();

            if (empty($errores)) {
                // Crear carpeta para imágenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guardar en la base de datos
                $resultado = $propiedad->guardar();

                if ($resultado) {
                    // Redireccionar al usuario
                    header('Location: /admin?resultado=1');
                }
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores,
        ]);
    }

    public static function actualizar(Router $router): void {
        $idPropiedad = validarORedireccionar('/admin');

        $propiedad = Propiedad::getByID($idPropiedad);

        if (!$propiedad) {
            header('Location: /admin?resultado=404');
            exit();
        }

        $vendedores = Vendedor::getAll();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad->sincronizar($_POST['propiedad']);

            // Validar
            $errores = $propiedad->validar();

            // Subida de imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new ImageManager(new Driver());
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            if (empty($errores)) {
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                $resultado = $propiedad->guardar();

                if ($resultado) {
                    header('Location: /admin?resultado=2');
                }
            }
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores,
        ]);
    }

    public static function eliminar(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarContenido($tipo)) {
                    $propiedad = Propiedad::getByID($id);
                    $propiedad->eliminar();

                    // Redirige de vuelta a la página actual
                    header('Location: /admin?resultado=3');
                    exit;
                }
            }
        }
    }

}