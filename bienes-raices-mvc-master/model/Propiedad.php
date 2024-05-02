<?php

namespace Model;

class Propiedad extends ActiveRecord {

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    protected $id;
    protected $titulo;
    protected $precio;
    protected $imagen;
    protected $descripcion;
    protected $habitaciones;
    protected $wc;
    protected $estacionamiento;
    protected $creado;
    protected $vendedorId;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    // Validación
    public function validar(): array {
        static::$errores = [];

        if (!$this->titulo) {
            self::$errores[] = 'Debes añadir un título';
        }

        if (!$this->precio) {
            self::$errores[] = 'El precio es obligatorio';
        } else if ($this->precio < -2147483648 || $this->precio > 2147483647) {
            self::$errores[] = 'El precio está fuera del rango permitido';
        }

        if (!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }

        if (!$this->habitaciones) {
            self::$errores[] = 'El número de habitaciones es obligatorio';
        } elseif ($this->habitaciones < 0 || $this->habitaciones > 9) {
            self::$errores[] = 'El precio está fuera del rango permitido';
        }

        if (!$this->wc) {
            self::$errores[] = 'El número de baños es obligatorio';
        } else if ($this->wc < 0 || $this->wc > 9) {
            self::$errores[] = 'El precio está fuera del rango permitido';
        }

        if (!$this->estacionamiento) {
            self::$errores[] = 'El número de estacionamientos es obligatorio';
        } else if ($this->estacionamiento < 0 || $this->estacionamiento > 9) {
            self::$errores[] = 'El precio está fuera del rango permitido';
        }

        if (!$this->vendedorId) {
            self::$errores[] = 'Elige un vendedor';
        }

        return self::$errores;
    }

    public function eliminar(): bool {
        $resultado = parent::eliminar();
        if ($resultado) {
            $this->eliminarImagen();
        }
        return $resultado;
    }

    // Subida de archivos
    public function setImagen($imagen)
    {
        // Elimina la imagen previa
        if (!is_null($this->id)) {
            $this->eliminarImagen();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Elimina el archivo
    public function eliminarImagen()
    {
        // Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    public function getId(): string {
        return $this->id;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    public function getPrecio(): string {
        return $this->precio;
    }

    public function setPrecio(string $precio): void {
        $this->precio = $precio;
    }

    public function getImagen(): string {
        return $this->imagen;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function getHabitaciones(): string {
        return $this->habitaciones;
    }

    public function setHabitaciones(string $habitaciones): void {
        $this->habitaciones = $habitaciones;
    }

    public function getWc(): string {
        return $this->wc;
    }

    public function setWc(string $wc): void {
        $this->wc = $wc;
    }

    public function getEstacionamiento(): string {
        return $this->estacionamiento;
    }

    public function setEstacionamiento(string $estacionamiento): void {
        $this->estacionamiento = $estacionamiento;
    }

    public function getCreado(): string {
        return $this->creado;
    }

    public function setCreado(string $creado): void {
        $this->creado = $creado;
    }
    public function getVendedorId(): string {
        return $this->vendedorId;
    }

    public function setVendedorId(string $vendedorId): void {
        $this->vendedorId = $vendedorId;
    }

}