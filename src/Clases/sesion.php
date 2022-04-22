<?php

use App\Conexion;

session_start();
require "Persona.php";
class IniciarSesion extends Persona{
    
    /* metodo que verfica quien tiene acceso a la pagina
    y redericciona dependiendo el usuario */
    public function AutenticarUsuario(){
        $this->conexionDB();
        $this->Persona();
        
        
        if(isset($_POST['user'], $_POST['pass'])){
            $this->usuario = $_POST['user'];
            $this->contrasena = $_POST['pass'];
            
            if(isset($_POST['autenticar'])){
                if($_POST['user'] == "" || $_POST['pass'] == ""){
                    echo "error";
                }
                else{
                    $query_profesor = "SELECT * FROM profesor WHERE Usuario='$this->usuario' AND Password='$this->contrasena'";
                    $query_estudiante = "SELECT Id, Usuario, Password, idroles FROM estudiante WHERE Usuario='$this->usuario' AND Password='$this->contrasena'";
                    $query_admin = "SELECT id, usuario, password, idroles FROM admin WHERE usuario='$this->usuario' AND password='$this->contrasena'";
                    
                    $result_profesor = mysqli_query($this->con, $query_profesor);
                    $result_estudiante = mysqli_query($this->con, $query_estudiante);
                    $result_admin = mysqli_query($this->con, $query_admin);
                    
                    $rol_prof = mysqli_fetch_assoc($result_profesor);
                    $rol_estu = mysqli_fetch_assoc($result_estudiante);
                    $rol_admin = mysqli_fetch_assoc($result_admin);
                    
                    //require "../Vista/Vista_Administrador/inicio.php";
                    if($rol_admin['idroles'] == 1){
                        $_SESSION['admin'] = $rol_prof['Id'];
                        header("location:Vista/Vista_Administrador/inicio.php");
                        exit;
                    }
                    if($rol_prof['idroles'] == 2){
                        $_SESSION['profe'] = $rol_prof['Id'];
                        $_SESSION['materia'] = $rol_prof['Idmateria'];
                        header("location:Vista/Vista_Profesor/VerEstudiantes.php");
                        exit;
                    }
                    if($rol_estu['idroles'] == 3){
                        $_SESSION['alumno'] = $rol_estu['Id'];
                        header("location:Vista/Vista_Estudiante/VerMateria.php");
                        exit;
                    }
                }

            }
        }
    }
}
?>