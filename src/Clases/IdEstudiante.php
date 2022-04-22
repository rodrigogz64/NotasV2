<?php

use App\Conexion;

require_once "Conexion.php";

class IdEstudiante extends Conexion
{
    /* Metodo para Modificar */
    //metodo que extrae los datos del estudiante para modificarlo segun su ID
    public function extraerId(){
        $this->conexionDB();
        
        if(isset($_POST['idestudiante'])){
            $idEstudiante = $_POST['idestudiante'];
            $query = "SELECT * FROM estudiante WHERE Id=$idEstudiante";
            $result = mysqli_query($this->con, $query);
            while($imp = mysqli_fetch_array($result)){
                $det = "<label class='form-label'>Nombre: </label>";
                $det .= "<input class='form-control' type='text' name='nombre' value='".$imp['Nombre']."'><br>";
                $det .= "<label class='form-label'>Apellido: </label>";
                $det .= "<input class='form-control' type='text' name='apellido' value='".$imp['Apellido']."'><br>";
                $det .= "<label class='form-label'>Edad: </label>";
                $det .= "<input class='form-control' type='text' name='edad' value='".$imp['Edad']."'><br>";
                $det .= "<label class='form-label'>Usuario: </label>";
                $det .= "<input class='form-control' type='text' name='usuario' value='".$imp['Usuario']."'><br>";
                $det .= "<label class='form-label'>Estado: </label>";
                $det .= "<input class='form-control' type='hidden' name='idEst' value='".$imp['Id']."'><br>";
                $det .= "<select class='form-select' name='estado'>";
                    $queryEstado = "SELECT * FROM estado";
                    $result = mysqli_query($this->con, $queryEstado);
                    $det .= "<option value=''>Seleccione el estado</option>";
                    while($estado = mysqli_fetch_array($result)){
                        $det .= "<option value='".$estado['Id']."'>".$estado['tipoEstado']."</option>";
                    }
                $det .= "</select><br>";
                $det .= "<div class='d-grid gap-2'><input class='btn btn-success' type='submit' name='modificar' value='Modificar'></div>";
                echo $det;
            }
        }
    }
}