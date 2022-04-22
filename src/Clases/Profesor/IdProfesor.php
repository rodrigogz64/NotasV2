<?php

use App\Conexion;

class IdProfesor extends Conexion
{
    //metodo que extrae los datos del profesor para modificarlo segun su ID
    public function extraerId(){
        //conexion DB
        $this->conexionDB();
        
        if(isset($_POST['idprofesor'])){
            $idProfesor = $_POST['idprofesor'];
            $query = "SELECT * FROM profesor WHERE Id=$idProfesor";
            $result = mysqli_query($this->con, $query);
            while($imp = mysqli_fetch_array($result)){
                $det = "<label>Nombre: </label>";
                $det .= "<input type='text' name='nombre' value='".$imp['Nombre']."'><br>";
                $det .= "<label>Apellido: </label>";
                $det .= "<input type='text' name='apellido' value='".$imp['Apellido']."'><br>";
                $det .= "<label>Edad: </label>";
                $det .= "<input type='text' name='edad' value='".$imp['Edad']."'><br>";
                $det .= "<label>Usuario: </label>";
                $det .= "<input type='text' name='usuario' value='".$imp['Usuario']."'><br>";
                $det .= "<input type='hidden' name='idProf' value='".$imp['Id']."'><br>";
                $det .= "<select name='estado'>";
                    $queryEstado = "SELECT * FROM estado";
                    $result = mysqli_query($this->con, $queryEstado);
                    $det .= "<option value=''> Seleccione Estado </option>";
                    while($estado = mysqli_fetch_array($result)){
                        $det .= "<option value='".$estado['Id']."'>".$estado['tipoEstado']."</option>";
                    }
                $det .= "</select><br>";
                $det .= "<br><input type='submit' name='modificar' value='Modificar'>";

                echo $det;
            }
        }
    }
}