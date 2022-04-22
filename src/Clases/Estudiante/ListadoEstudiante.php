<?php

namespace App\Clases;

class ListadoEstudiante
{
    //metodo que muestra los estudiantes de su materia al profesor
    public function visualizarAsignadas(){
        $this->conexionDB();
        $materia = $_SESSION['materia'];
        $query = "SELECT estudiante.Id AS idestudiante, estudiante.Nombre AS nombre, estudiante.Apellido AS apellido, aula.nombre AS aula, nota.n1 AS nota1, nota.n2 AS nota2, nota.n3 AS nota3, nota.Promedio AS promedio FROM nota INNER JOIN materia ON nota.idMateria=materia.id INNER JOIN estudiante ON nota.idEstudiante=estudiante.Id INNER JOIN aula ON aula.id=estudiante.Idaula WHERE nota.idMateria=$materia";
        $result = mysqli_query($this->con, $query);
        $cont = 1;
        while($imp = mysqli_fetch_array($result)){
            $tabla = "<tr>";
                $tabla .= "<td>". $cont ."</td>";
                $tabla .= "<td>".$imp['nombre']."</td>";
                $tabla .= "<td>". $imp['apellido'] ."</td>";
                $tabla .= "<td>". $imp['aula'] ."</td>";
                $tabla .= "<td>". $imp['nota1'] ."</td>";
                $tabla .= "<td>". $imp['nota2'] ."</td>";
                $tabla .= "<td>". $imp['nota3'] ."</td>";
                $tabla .= "<td>". $imp['promedio'] ."</td>";
                $tabla .= "<form action='modificarNota.php' method='POST'>";
                    $tabla .= "<td><button name='idestudiante' value='".$imp['idestudiante']."'>Modificar Nota</button></td>";
                $tabla .= "</form>";
            $tabla .= "</tr>";
            echo $tabla;
            $cont++;
        }
    }
}