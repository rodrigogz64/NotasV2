<?php

use App\Conexion;

class Aula extends Conexion
{
    //Metodo que muestra las aulas disponibles
    public function aulasDisponibles(){
        //conexion DB
        $this->conexionDB();

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