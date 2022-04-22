<?php

namespace App\Clases;

class EstadoEstudiante
{
    //metodo que muestra todos los alumnos inscritos
    public function verActivos($rol){
       //conexion DB
       $conexion = new Conexion();
       $conexion->conexionDB();
       
       //WHERE estudiante.idEstado = 1 -> agregar para quitar a las personas inactivas
       $query = "SELECT estudiante.*, aula.nombre AS aula, estado.tipoEstado AS estado FROM estudiante INNER JOIN aula on estudiante.Idaula=aula.id INNER JOIN estado ON estudiante.idEstado=estado.Id WHERE estudiante.idEstado = $rol";
       $result = mysqli_query($this->con, $query);
       $cont = 1;
       while($imp = mysqli_fetch_array($result)){
           $tabla = "<tr>";
               $tabla .= "<td>".$cont."</td>";
               $tabla .= "<td>".$imp['Nombre']."</td>";
               $tabla .= "<td>". $imp['Apellido'] ."</td>";
               $tabla .= "<td>". $imp['Edad'] ."</td>";
               $tabla .= "<td>". $imp['aula'] ."</td>";
               $tabla .= "<td>". $imp['Usuario'] ."</td>";
               $tabla .= "<td>". $imp['estado'] ."</td>";
               $tabla .= "<form action='modificarEstudiante.php' method='POST'>";
                   $tabla .= "<td><button name='idestudiante' value='".$imp['Id']."'>Modificar</button></td>";
               $tabla .= "</form>";
           $tabla .= "</tr>";
           echo $tabla;
           $cont++;
        }
    }

    //metodo que muestra todos los alumnos Inactivos
    public function verInactivos(){
        $this->verActivos(2);
    }
}
