<?php

use App\Conexion;

class ActualizarEstudiante
{
    public function modificar(){
        //conexion DB
        $conexion = new Conexion();
        $conexion->conexionDB();

        if(isset($_POST['modificar'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $edad = $_POST['edad'];
            $usuario = $_POST['usuario'];
            $estado = $_POST['estado'];
            //Id del estudiante
            $idEst = $_POST['idEst'];
            $query = "UPDATE estudiante SET Nombre='$nombre',Apellido='$apellido',Edad=$edad,Usuario='$usuario', idEstado=$estado WHERE Id=$idEst";
            $result = mysqli_query($this->con, $query);
            if(!empty($result)){
                header("location:listaEstudiante.php");
            }
            else{
                echo "Error al actualizar";
            }
        }

    } 
}