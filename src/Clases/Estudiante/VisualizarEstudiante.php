<?php 

class VisualizarEstudiante
{
    //metodo que muestra quien es el que está teniendo acceso a la pagina
    public function verInformacion(){
        //conexion DB
        $conexion = new Conexion();
        $conexion->conexionDB();

        $cont = 0;
        $alumno = $_SESSION['alumno'];
        $query = "select estudiante.Nombre AS nombre, estudiante.Apellido AS apellido,aula.nombre AS aula ,materia.nombre AS materia, materia.id AS idmateria from detalle inner join estudiante on detalle.idEstudiante=estudiante.id INNER JOIN materia on detalle.idMateria=materia.id inner join aula on estudiante.Idaula=aula.id WHERE estudiante.Id=$alumno";
        $result = mysqli_query($this->con, $query);
        while($imp = mysqli_fetch_array($result)){
            $nom = "<h2>".$imp['nombre'] . " " . $imp['apellido']. " " . $imp['aula']."</h2> <br>";
            $tabla = "<table>";
                $tabla .= "<thead>";
                    $tabla .= "<th>Materia</th>";
                    $tabla .= "<th>Ver Nota</th>";
                $tabla .= "</thead>";
                $tabla .= "<tbody>";
                    $tabla .= "<td>".$imp['materia']."</td>";
                    $tabla .= "<td>
                                <form action='VerNota.php' method='POST'>
                                    <button type='submit' name='nota_materia' value='".$imp['idmateria']."'>Ver Nota</button>
                                </form>
                            </td>";
                $tabla .= "</tbody>";

            $tabla .= "</table> <br>";
            $cont++; 
            if($cont == 1){
                echo $nom;
            }
            echo $tabla;
        }
    }
}