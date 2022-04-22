<?php

use App\Conexion;

require_once "Conexion.php";

class EstudianteNota extends Conexion
{
    //formulario para agregar notas y depende de el metodo ingresar notas
    public function verEstudianteNotas(){
        //conexion DB
        $this->conexionDB();

        if(isset($_POST['idestudiante'])){
            $estudiante = $_POST['idestudiante'];
            $query = "select * from estudiante where id=$estudiante";
            $result = mysqli_query($this->con, $query);
            while($imp = mysqli_fetch_array($result)){
                $detalle = "<label>Nombre:</label>".$imp['Nombre']. " " . "<br>";
                $detalle .= "<input type='hidden' name='estudiante' value='".$imp['Id']."'>";
                $detalle .= "<input type='text' name='nota1' placeholder='Nota 1'><br>";
                $detalle .= "<input type='text' name='nota2' placeholder='Nota 2'><br>";
                $detalle .= "<input type='text' name='nota3' placeholder='Nota 3'><br>";
                echo $detalle;
            }
        }
    }

    //tabla para ver los estudiantes sin notas
    public function verEstudiantesSinNotas(){
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
                        $tabla .= "<td><button class='btn btn-success' name='idestudiante' value='".$imp['idestudiante']."'>Agregar Nota</button></td>";
                    $tabla .= "</form>";
                $tabla .= "</tr>";
                echo $tabla;
            $cont++;
        }
    }
}