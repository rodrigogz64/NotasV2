<?php

use App\Conexion;

<<<<<<< HEAD:src/Clases/RegistrarEstudiante.php
require_once "Conexion.php";

=======
>>>>>>> bad34d1b7cb89f6fa4efb051d21f2764f5857ce8:src/Clases/Estudiante/RegistrarEstudiante.php
class registrarEstudiante extends Conexion
{
    //metodo para registrar alumnos
    public function agregar(){
        //conexion DB
        $this->conexionDB();

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