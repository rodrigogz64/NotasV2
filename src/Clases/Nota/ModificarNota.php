<?php

use App\Conexion;

class ModificarNota extends Conexion
{
    //metodo que modifica la nota del estudiante
    public function modificarNota(){
        //conexion DB
        $this->conexionDB();
        
        if(isset($_POST['extraerNota'])){
            $idEstudiante = $_POST['idEstudiante'];
            $idMateria = $_POST['idMateria'];
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['nota3'];
            $promedio = round((($nota1 + $nota2 + $nota3) / 3) ,2);
            $query = "UPDATE nota SET n1=$nota1,n2=$nota2,n3=$nota3, Promedio=$promedio WHERE idMateria=$idMateria AND idEstudiante=$idEstudiante";
            $result = mysqli_query($this->con, $query);
            if(!empty($result)){
                header("location:VerEstudiantes.php");
            }
        }
    }
}