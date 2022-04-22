<?php

use App\Clases\Persona;

require "Persona.php";
class Estudiante extends Persona{
    public $aula;
    public $estado;

    //metodos
    
    /* Metodos de Registro */
    //metodo para registrar alumnos
    public function resgistrarEstudiante(){
        $this->conexionDB();
        $this->Persona();

        if(isset($_POST['aula'])){
            $this->aula = $_POST['aula'];
            $this->rol = 3;
            $this->estado = 1;
                if(isset($_POST['registrarAlumno'])){
                $query = "INSERT INTO estudiante(Nombre,Apellido,Edad,Idaula,Usuario,Password, idroles, idEstado) VALUES ('$this->nombre', '$this->apellido', '$this->edad', $this->aula, '$this->usuario', '$this->contrasena', $this->rol, $this->estado)";
                $result = mysqli_query($this->con, $query);
                if(!empty($result)){
                    $query2 = "SELECT * FROM estudiante ORDER BY id DESC LIMIT 1";
                    $result2 = mysqli_query($this->con, $query2);
                    while($imp = mysqli_fetch_array($result2)){
                        echo "Estudiante: ".$imp['Nombre'] ." ". $imp['Apellido'];
                        echo "<input type='hidden' name='idestudiante' value='".$imp['Id']."'>";
                    }
                }
            }    
            
        }
    }

    //Metodo que muestra las aulas disponibles
    public function aulasDispobibles(){

        $this->conexionDB();
        $query = "SELECT * FROM aula";
        $resultado = mysqli_query($this->con, $query);
        while($mostrar = mysqli_fetch_array($resultado)){
            $lista = "<option value='".$mostrar['id']."'>";
            $lista .= $mostrar['nombre'];
            $lista .= "</option>";
            echo $lista;
        }
    }

    //Muestra todas las materias que puden llevar los alumnos(Diseño)
    function materiasDisponibles(){
        $this->conexionDB();
        $query = "SELECT * FROM materia";
        $result = mysqli_query($this->con, $query);
        while($imp = mysqli_fetch_array($result)){
            $check = "<input type='checkbox' name='materias[]' value='".$imp['id']."'>".$imp['nombre']."<br>";
            echo $check;
        }
    }

    //metodo que le asigna las materias el Estudiante y las alamacena en la BD
    public function asignarMateria(){
        $this->conexionDB();
        if(isset($_POST['asignarMaterias'])){
            $idEstudiante = $_POST['idestudiante'];
            $materias = $_POST['materias'];
            for ($i=0; $i< count($materias); $i++){
                $query = "INSERT INTO detalle (idEstudiante,idMateria) VALUES ($idEstudiante,$materias[$i])";
                $result = mysqli_query($this->con, $query);
            }
        }
    }

      /* Metodos para Vista Estudiante */
     //metodo que muestra quien es el que está teniendo acceso a la pagina
     public function verAl(){
        $this->conexionDB();
        $cont = 0;
        $alumno = $_SESSION['alumno'];
        $query = "select estudiante.Nombre AS nombre, estudiante.Apellido AS apellido,aula.nombre AS aula ,materia.nombre AS materia, materia.id AS idmateria from detalle inner join estudiante on detalle.idEstudiante=estudiante.id INNER JOIN materia on detalle.idMateria=materia.id inner join aula on estudiante.Idaula=aula.id WHERE estudiante.Id=$alumno";
        $result = mysqli_query($this->con, $query);
        while($imp = mysqli_fetch_array($result)){
            $nom = "<h2>".$imp['nombre'] . " " . $imp['apellido']. " " . $imp['aula']."</h2> <br>";
            $tabla = "<table>";
                $tabla .= "<thead>";
                    $tabla .= "<th>Materia</th>";
                    $tabla .= "<th>Ver Nota</th>";
                $tabla .= "</thead>";
                $tabla .= "<tbody>";
                    $tabla .= "<td>".$imp['materia']."</td>";
                    $tabla .= "<td>
                                <form action='VerNota.php' method='POST'>
                                    <button class='btn btn-success' type='submit' name='nota_materia' value='".$imp['idmateria']."'>Ver Nota</button>
                                </form>
                            </td>";
                $tabla .= "</tbody>";

            $tabla .= "</table> <br>";
            $cont++; 
            if($cont == 1){
                echo $nom;
            }
            echo $tabla;
        }
    }
    
    //metodo que muestra las notas segun la materia que escoja el estudiante
    public function notaMateria(){
        $this->conexionDB();
        if(isset($_POST['nota_materia'])){
            $materia = $_POST['nota_materia'];
            $alumno = $_SESSION['alumno'];
            $query = "select estudiante.Nombre AS nombre, estudiante.Apellido AS apellido, materia.nombre AS materia,nota.n1 AS nota1, nota.n2 AS nota2, nota.n3 AS nota3, nota.Promedio AS promedio from materia INNER JOIN nota on nota.idMateria=materia.id INNER JOIN estudiante on nota.idEstudiante=estudiante.Id WHERE nota.idMateria=$materia AND nota.idEstudiante=$alumno";
            $result = mysqli_query($this->con, $query);
            
                while($imp = mysqli_fetch_array($result)){
                    $det = "Estudiante: ".$imp['nombre']." ".$imp['apellido']."<br>";
                    $det .= "Materia: ".$imp['materia']."<br>";
                    $det .= "Nota1: ".$imp['nota1']."<br>";
                    $det .= "Nota2: ".$imp['nota2']."<br>";
                    $det .= "Nota3: ".$imp['nota3']."<br>";
                    $det .= "Promedio: ". round($imp['promedio'],2);
                    echo $det;
                }
            
            
        }
    }

    //metodo que muestra todos los alumnos inscritos
    public function listaAlumnosActivos($rol){
        $this->conexionDB();
        //WHERE estudiante.idEstado = 1 -> agregar para quitar a las personas inactivas
        $query = "SELECT estudiante.*, aula.nombre AS aula, estado.tipoEstado AS estado FROM estudiante INNER JOIN aula on estudiante.Idaula=aula.id INNER JOIN estado ON estudiante.idEstado=estado.Id WHERE estudiante.idEstado = $rol";
        $result = mysqli_query($this->con, $query);
        $cont = 1;
        while($imp = mysqli_fetch_array($result)){
            $tabla = "<tr>";
                $tabla .= "<td>".$cont."</td>";
                $tabla .= "<td>".$imp['Nombre']."</td>";
                $tabla .= "<td>". $imp['Apellido'] ."</td>";
                $tabla .= "<td>". $imp['Edad'] ."</td>";
                $tabla .= "<td>". $imp['aula'] ."</td>";
                $tabla .= "<td>". $imp['Usuario'] ."</td>";
                $tabla .= "<td>". $imp['estado'] ."</td>";
                $tabla .= "<form action='modificarEstudiante.php' method='POST'>";
                    $tabla .= "<td><button class='btn btn-success' name='idestudiante' value='".$imp['Id']."'>Modificar</button></td>";
                $tabla .= "</form>";
            $tabla .= "</tr>";
            echo $tabla;
            $cont++;
            
        }
    }

    //metodo que muestra todos los alumnos Inactivos
    public function listaAlumnosInactivos(){
        $this->listaAlumnosActivos(2);
    }

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
          
    //metodo que actuliza los datos de los estudiantes
    public function modificarEstudiante(){
        $this->conexionDB();
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
?>