<?php

use App\Conexion;

class Aula 
{
    //Metodo que muestra las aulas disponibles
    public function aulasDisponibles(){
        //conexion DB
        $conexion = new Conexion();
        $conexion->conexionDB();

        $query = "SELECT * FROM aula";
        $resultado = mysqli_query($this->con, $query);
        while($mostrar = mysqli_fetch_array($resultado)){
            $lista = "<option value='".$mostrar['id']."'>";
            $lista .= $mostrar['nombre'];
            $lista .= "</option>";
            echo $lista;
        }
    }
}