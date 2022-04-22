<?php

use App\Conexion;

require_once __DIR__.'/../../src/Clases/Persona.php';

class Profesor extends Persona 
{
    //atributos
    public $materia;
    public $estado;

}