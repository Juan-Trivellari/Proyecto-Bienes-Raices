<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// Conectar BD
$db = conectarDB();

use Model\ActiveRecord;
ActiveRecord::setDB($db);