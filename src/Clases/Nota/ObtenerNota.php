<?php

use App\Conexion;

<<<<<<< HEAD:src/Clases/ObtenerNota.php
require_once "Conexion.php";

=======
>>>>>>> bad34d1b7cb89f6fa4efb051d21f2764f5857ce8:src/Clases/Nota/ObtenerNota.php
class ObtenerNota extends Conexion
{
    //metodo que extrae las notas de cada estudiante
    public function extraerNota(){
        //conexion DB
        $this->conexionDB();
        
        if(isset($_POST['idestudiante'])){
            $estudiante = $_POST['idestudiante'];
            $this->materia = $_SESSION['materia'];
            $query = "SELECT estudiante.Nombre AS nombre, nota.idEstudiante AS idEstudiante, nota.n1 AS nota1, nota.n2 AS nota2, nota.n3 AS nota3, nota.idMateria AS idMateria FROM nota INNER JOIN estudiante ON nota.idEstudiante=estudiante.Id INNER JOIN materia ON nota.idMateria=materia.id WHERE nota.idEstudiante=$estudiante AND nota.idMateria=$this->materia";
            $result = mysqli_query($this->con, $query);
            while($imp = mysqli_fetch_array($result)){
                $det = "<label><b>Estudiante:</b> " .$imp['nombre']."</label><br>";
                $det .= "<label>Nota 1</label>";
                $det .= "<input type='text' name='nota1' value='".$imp['nota1']."'><br>";
                $det .= "<label>Nota 2</label>";
                $det .= "<input type='text' name='nota2' value='".$imp['nota2']."'><br>";
                $det .= "<label>Nota 3</label>";
                $det .= "<input type='text' name='nota' value='".$imp['nota3']."'><br>";
                $det .= "<input type='hidden' name='idEstudiante' value='".$imp['idEstudiante']."'><br>";
                $det .= "<input type='hidden' name='idMateria' value='".$imp['idMateria']."'><br>";
                $det .= "<input type='submit' name='extraerNota' value='Modificar'>";
                echo $det;
            }
        }

    }
}