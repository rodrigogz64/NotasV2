<?php

use App\Conexion;

<<<<<<< HEAD:src/Clases/RegistrarProfesor.php
require_once "Conexion.php";
require_once "Profesor.php";

class RegistrarProfesor extends Profesor
=======
class RegistrarProfeso extends Conexion
>>>>>>> bad34d1b7cb89f6fa4efb051d21f2764f5857ce8:src/Clases/Profesor/RegistrarProfesor.php
{
    //metodo que registrar profesor
    public function agregar(){
        //conexion DB
        $this->conexionDB();
        
        if(isset($_POST['materia'])){
            $this->materia = $_POST['materia'];
            $this->rol = 2;
            $this->estado = 1;
            if(isset($_POST['registrarMaestro'])){
                $query= "INSERT INTO profesor(Nombre,Apellido,Edad,Idmateria,Usuario,Password, idroles, idEstado) VALUES ('$this->nombre', '$this->apellido', '$this->edad', $this->materia, '$this->usuario', '$this->contrasena', $this->rol, $this->estado)";
                $resultado = mysqli_query($this->con,$query);
                if(!empty($resultado)){
                    header("location:listaProfesor.php");
                } 
            }
        }
    }
}