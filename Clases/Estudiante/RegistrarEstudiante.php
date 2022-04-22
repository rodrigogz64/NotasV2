<?php

use App\Conexion;

class registrarEstudiante
{
    //metodo para registrar alumnos
    public function agregar(){
        //conexion DB
        $conexion = new Conexion();
        $conexion->conexionDB();

        if(isset($_POST['aula'])){
            $this->aula = $_POST['aula'];
            $this->rol = 3;
            $this->estado = 1;
                if(isset($_POST['registrarAlumno'])){
                $query = "INSERT INTO estudiante(Nombre,Apellido,Edad,Idaula,Usuario,Password, idroles, idEstado) VALUES ('$this->nombre', '$this->apellido', '$this->edad', $this->aula, '$this->usuario', '$this->contrasena', $this->rol, $this->estado)";
                $result = mysqli_query($this->con, $query);
                if(!empty($result)){
                    $query2 = "SELECT * FROM estudiante ORDER BY id DESC LIMIT 1";
                    $result2 = mysqli_query($this->con, $query2);
                    while($imp = mysqli_fetch_array($result2)){
                        echo "Estudiante: ".$imp['Nombre'] ." ". $imp['Apellido'];
                        echo "<input type='hidden' name='idestudiante' value='".$imp['Id']."'>";
                    }
                }
            }    
            
        }
    }
}