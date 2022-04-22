<?php

use App\Conexion;

class IngresarNota
{
    //metodo que ingresa las notas del estudiante
    public function agregarNotaEstudiante(){
        $this->conexionDB();
        if(isset($_POST['registrarNota'])){
            $this->materia = $_SESSION['materia'];
            $estudiante = $_POST['estudiante'];
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['nota3'];
            $promedio = ($nota1 + $nota2 + $nota3)/3;
            $query = "INSERT INTO nota (n1,n2,n3,Promedio,idMateria,idEstudiante) VALUES($nota1, $nota2, $nota3, $promedio, $this->materia, $estudiante)";
            $result = mysqli_query($this->con, $query);
            if(!empty($result)){
                header("location:VerEstudiantes.php");
            }
        }
    }
}


