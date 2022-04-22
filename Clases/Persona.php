<?php

use App\Conexion;

require "Conexion.php";

class Persona extends Conexion{

    //atributos
    public $nombre;
    public $apellido;
    public $edad; 
    public $materia;
    public $usuario;
    public $contrasena;
    public $rol;
    

    //metodos
    //metodo constructor
    function Persona(){
        if(isset($_POST['nombre'], $_POST['apellido'], $_POST['edad'], $_POST['usuario'], $_POST['password'])){
            $this->nombre = $_POST['nombre'];
            $this->apellido = $_POST['apellido'];
            $this->edad = $_POST['edad'];
            $this->usuario = $_POST['usuario'];
            $this->contrasena = $_POST['password'];
        }
    }
}
?>