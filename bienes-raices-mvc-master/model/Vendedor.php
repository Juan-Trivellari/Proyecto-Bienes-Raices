<?php

namespace Model;

class Vendedor extends ActiveRecord {

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    protected $id;
    protected $nombre;
    protected $apellido;
    protected $telefono;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    // Validación
    public function validar(): array {
        static::$errores = [];

        if (!$this->nombre) {
            self::$errores[] = 'El nombre es obligatorio';
        }

        if (!$this->apellido) {
            self::$errores[] = 'El apellido es obligatorio';
        }

        if (!$this->telefono) {
            self::$errores[] = 'El telefono es obligatorio';
        }

        if (!preg_match('/^[0-9]{10}$/', $this->telefono)) {
            self::$errores[] = 'Formato de telefono no válido';
        }

        return self::$errores;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getApellido(): string {
        return $this->apellido;
    }

    public function setApellido(string $apellido): void {
        $this->apellido = $apellido;
    }

    public function getTelefono(): string {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void {
        $this->telefono = $telefono;
    }

}