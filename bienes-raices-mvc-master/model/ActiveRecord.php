<?php

namespace Model;

use mysqli;

abstract class ActiveRecord {

    protected $id;

    // Base de datos
    protected static mysqli $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    protected static $errores = [];

    public static function setDB(mysqli $db) {
        self::$db = $db;
    }

    public static function getAll(): array {
        $query = "SELECT * FROM " . static::$tabla;
        return self::consultarSQL($query);
    }

    public static function get(int $cantidad): array {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        return self::consultarSQL($query);
    }

    public static function getByID(int $id): ?static {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id=($id)";
        $resultado = self::consultarSQL($query);
        return $resultado ? $resultado[0] : null;
    }

    public function guardar(): bool {
        if ($this->id) {
            return $this->actualizar();
        } else {
            return $this->crear();
        }
    }

    private function crear(): bool {
        // Sanitizar datos
        $atributos = $this->sanitizarDatos();

        $columnas = join(', ', array_keys($atributos));
        $filas = join("', '", array_values($atributos));
        $query = "INSERT INTO " . static::$tabla ."($columnas) VALUES ('$filas')";

        return self::$db->query($query);
    }

    private function actualizar(): bool {
        // Sanitizar datos
        $atributos = $this->sanitizarDatos();

        $args = [];
        foreach ($atributos as $key => $value) {
            $args[] = "{$key}='{$value}'";
        }

        $valores = join(", ", $args);
        $query = "UPDATE " . static::$tabla . " SET $valores WHERE id=$this->id";

        return self::$db->query($query);
    }

    public function eliminar(): bool {
        $query = "DELETE FROM " . static::$tabla . " WHERE id=" . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    private function atributos(): array {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    private function sanitizarDatos(): array {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    protected static function consultarSQL($query): array {
        $resultado = self::$db->query($query);

        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        $resultado->free();

        return $array;
    }

    protected static function crearObjeto($registro): self {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    public function sincronizar($args = []) {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    public static function getErrores(): array {
        return static::$errores;
    }

}