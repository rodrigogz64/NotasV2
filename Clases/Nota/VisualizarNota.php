<?php

use App\Conexion;

class VisualizarNota 
{
    //metodo que muestra las notas segun la materia que escoja el estudiante 
    public function verSeleccionPorMateria(){
        //conexion DB
        $conexion = new Conexion();
        $conexion->conexionDB();

        if(isset($_POST['nota_materia'])){
            $materia = $_POST['nota_materia'];
            $alumno = $_SESSION['alumno'];
            $query = "select estudiante.Nombre AS nombre, estudiante.Apellido AS apellido, materia.nombre AS materia,nota.n1 AS nota1, nota.n2 AS nota2, nota.n3 AS nota3, nota.Promedio AS promedio from materia INNER JOIN nota on nota.idMateria=materia.id INNER JOIN estudiante on nota.idEstudiante=estudiante.Id WHERE nota.idMateria=$materia AND nota.idEstudiante=$alumno";
            $result = mysqli_query($this->con, $query);
            
                while($imp = mysqli_fetch_array($result)){
                    $det = "Estudiante: ".$imp['nombre']." ".$imp['apellido']."<br>";
                    $det .= "Materia: ".$imp['materia']."<br>";
                    $det .= "Nota1: ".$imp['nota1']."<br>";
                    $det .= "Nota2: ".$imp['nota2']."<br>";
                    $det .= "Nota3: ".$imp['nota3']."<br>";
                    $det .= "Promedio: ". round($imp['promedio'],2);
                    echo $det;
                }            
        }
    }

    //tabla para ver los estudiantes sin notas
    public function verPendientesDeCalificacion(){
        $this->conexionDB();
        $materia = $_SESSION['materia'];
        /* SELECT estudiante.Id, estudiante.Nombre FROM detalle INNER JOIN estudiante ON detalle.idEstudiante=estudiante.Id INNER JOIN materia ON detalle.idMateria=materia.id INNER JOIN nota ON nota.idMateria=materia.id WHERE detalle.idMateria=2 AND detalle.idEstudiante != nota.idEstudiante */
        $query = "SELECT DISTINCT estudiante.Id AS idestudiante, estudiante.Nombre As nombre, estudiante.Apellido As apellido FROM detalle INNER JOIN estudiante ON detalle.idEstudiante=estudiante.Id INNER JOIN materia ON detalle.idMateria=materia.id INNER JOIN nota ON nota.idMateria=materia.id WHERE detalle.idMateria=$materia AND detalle.idEstudiante != nota.idEstudiante";
        $result = mysqli_query($this->con, $query);
        $cont = 1;
        while($imp = mysqli_fetch_array($result)){
                $tabla = "<tr>";
                    $tabla .= "<td>". $cont ."</td>";
                    $tabla .= "<td>".$imp['nombre']."</td>";
                    $tabla .= "<td>". $imp['apellido'] ."</td>";
                    $tabla .= "<form action='EstudianteNotas.php' method='POST'>";
                        $tabla .= "<td><button name='idestudiante' value='".$imp['idestudiante']."'>Agregar Nota</button></td>";
                    $tabla .= "</form>";
                $tabla .= "</tr>";
                echo $tabla;
            $cont++;
        }
    }

}
