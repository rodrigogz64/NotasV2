<?php

namespace \App\Clases;

class Materia
{
    //Muestra todas las materias que puden llevar los alumnos(Diseño)
    function disponibles(){
        //conexion DB
        $conexion = new Conexion();
        $conexion->conexionDB();

        $query = "SELECT * FROM materia";
        $result = mysqli_query($this->con, $query);
        while($imp = mysqli_fetch_array($result)){
            $check = "<input type='checkbox' name='materias[]' value='".$imp['id']."'>".$imp['nombre']."<br>";
            echo $check;
        }
    }

    //metodo que muestra todas las materias en un select(Diseño)
    public function verTodo(){
        //conexion DB
        $conexion = new Conexion();
        $conexion->conexionDB();
        
        $query = "SELECT * FROM materia";
        $result = mysqli_query($this->con, $query);
        while($imp = mysqli_fetch_array($result)){
            $select = "<option value='".$imp['id']."'>";
                $select.= $imp['nombre'];
            $select .= "</option>";
            echo $select;
        }
    }

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
