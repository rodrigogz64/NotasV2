<?php

use App\Conexion;

class ModificarProfesor extends Conexion
{
    //metodo que actualiza los datos de los profesores
    public function modificarProfesor(){
        $this->conexionDB();
        if(isset($_POST['modificar'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $edad = $_POST['edad'];
            $usuario = $_POST['usuario'];
            $estado = $_POST['estado'];
            $idProf = $_POST['idProf'];
            $query = "UPDATE profesor SET Nombre='$nombre',Apellido='$apellido',Edad=$edad,Usuario='$usuario',idEstado=$estado WHERE Id=$idProf";
            $result = mysqli_query($this->con, $query);
            if(!empty($result)){
                header("location:listaProfesor.php");
            }
            else{
                echo "Error al actualizar";
            }
        }
    }
}