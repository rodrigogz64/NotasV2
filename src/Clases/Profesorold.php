<?php

namespace App\Clases;

require "persona.php";
class Profesor extends Persona{

    
    
    //metodos
    /* Metodos de Registro */
    

    

    
    
    

    

    /* Metodos para Estudiantes */
    
    
    

    //formulario para agregar notas y depende de el metodo ingresar notas
    public function estudianteNotas(){
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
    
    /* Metodos para Notas */
    
    
    //metodo que extrae las notas de cada estudiante
    public function extraerNota(){
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
    
    //metodo que modifica la nota del estudiante
    public function modificarNota(){
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
    

    /* Metodos para Modificar Profesor */
    //metodo que extrae los datos del profesor para modificarlo segun su ID
    public function extraerId(){
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
?>