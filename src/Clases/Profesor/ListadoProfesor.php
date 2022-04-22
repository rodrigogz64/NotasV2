<?php

namespace \App\Clases;

class ListadoProfesor
{
    //metodo que muestra a todos los profesores
    public function verLista($rol){
        //conexion DB
        $conexion = new Conexion();
        $conexion->conexionDB();

        $query = "SELECT profesor.*, materia.nombre AS materia, estado.tipoEstado AS estado FROM profesor INNER JOIN materia on profesor.Idmateria=materia.id INNER JOIN estado ON profesor.idEstado=estado.Id WHERE profesor.idEstado=$rol";
        $result = mysqli_query($this->con, $query);
        $cont = 1;
        while($imp = mysqli_fetch_array($result)){
            $tabla = "<tr>";
                $tabla .= "<td>".$cont."</td>";
                $tabla .= "<td>".$imp['Nombre']."</td>";
                $tabla .= "<td>". $imp['Apellido'] ."</td>";
                $tabla .= "<td>". $imp['Edad'] ."</td>";
                $tabla .= "<td>". $imp['materia'] ."</td>";
                $tabla .= "<td>". $imp['Usuario'] ."</td>";
                $tabla .= "<td>". $imp['estado'] ."</td>";
                $tabla .= "<form action='modificarProfesor.php' method='POST'>";
                    $tabla .= "<td><button name='idprofesor' value='".$imp['Id']."'>Modificar</button></td>";
                $tabla .= "</form>";
            $tabla .= "</tr>";
            echo $tabla;
            $cont++;
            
        }
    }
    
    //metodo que muestra a todos los profesores Inactivos
    public function listaProfesorInactivos(){
        $this->listaProfesor(2);
    }
}