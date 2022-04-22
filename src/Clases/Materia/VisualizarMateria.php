<?php

use App\Conexion;

class VisualizarMateria extends Conexion
{
    //Muestra todas las materias que puden llevar los alumnos(Diseño)
    function disponibles(){
        //conexion DB
        $this->conexionDB();

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
        $this->conexionDB();
        
        $query = "SELECT * FROM materia";
        $result = mysqli_query($this->con, $query);
        while($imp = mysqli_fetch_array($result)){
            $select = "<option value='".$imp['id']."'>";
                $select.= $imp['nombre'];
            $select .= "</option>";
            echo $select;
        }
    }

}