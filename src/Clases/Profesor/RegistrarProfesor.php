<?php

class RegistrarProfesor 
{
    //metodo que registrar profesor
    public function agregar(){
        //conexion DB
        $conexion = new Conexion();
        $conexion->conexionDB();
        
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