<?php

use App\Conexion;

<<<<<<< HEAD:src/Clases/ModificarProfesor.php
require_once "Conexion.php";

=======
>>>>>>> bad34d1b7cb89f6fa4efb051d21f2764f5857ce8:src/Clases/Profesor/ModificarProfesor.php
class ModificarProfesor extends Conexion
{
    //metodo que actualiza los datos de los profesores
    public function modificar(){
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