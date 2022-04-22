<?php

namespace \App\Clases;

class AsignarMateria
{
    //metodo que le asigna las materias el Estudiante y las alamacena en la BD
    public function asignar(){
        //conexion DB
        $conexion = new Conexion();
        $conexion->conexionDB();

        if(isset($_POST['asignarMaterias'])){
            $idEstudiante = $_POST['idestudiante'];
            $materias = $_POST['materias'];
            for ($i=0; $i< count($materias); $i++){
                $query = "INSERT INTO detalle (idEstudiante,idMateria) VALUES ($idEstudiante,$materias[$i])";
                $result = mysqli_query($this->con, $query);
            }
        }
    }
}

