<?php
require "persona.php";
class Profesor extends Persona{

    //atributos
    public $materia;
    public $estado;
    
    //metodos
    /* Metodos de Registro */
    //metodo que registrar profesor
    public function resgistrarProfesor(){
        $this->conexionDB();
        $this->Persona();
        
        if(isset($_POST['materia'])){
            $this->materia = $_POST['materia'];
            $this->rol = 2;
            $this->estado = 1;
            if(isset($_POST['registrarMaestro'])){
                $query= "INSERT INTO profesor(Nombre,Apellido,Edad,Idmateria,Usuario,Password, idroles, idEstado) VALUES ('$this->nombre', '$this->apellido', '$this->edad', $this->materia, '$this->usuario', '$this->contrasena', $this->rol, $this->estado)";
                $resultado = mysqli_query($this->con,$query);
                if(!empty($resultado)){
                    header("location:listaProfesor.php");
                } 
            }
        }
    }

    //metodo que muestra todas las materias en un select(Diseño)
    public function verMaterias(){
        $this->conexionDB();
        
        $query = "SELECT * FROM materia";
        $result = mysqli_query($this->con, $query);
        while($imp = mysqli_fetch_array($result)){
            $select = "<option value='".$imp['id']."'>";
                $select.= $imp['nombre'];
            $select .= "</option>";
            echo $select;
        }
    }

    //metodo que muestra a todos los profesores
    public function listaProfesor($rol){
        $this->conexionDB();
        $query = "SELECT profesor.*, materia.nombre AS materia, estado.tipoEstado AS estado FROM profesor INNER JOIN materia on profesor.Idmateria=materia.id INNER JOIN estado ON profesor.idEstado=estado.Id WHERE profesor.idEstado=$rol";
        $result = mysqli_query($this->con, $query);
        $cont = 1;
        while($imp = mysqli_fetch_array($result)){
            $tabla = "<tr>";
                $tabla .= "<td>".$cont."</td>";
                $tabla .= "<td>".$imp['Nombre']."</td>";
                $tabla .= "<td>". $imp['Apellido'] ."</td>";
                $tabla .= "<td>". $imp['Edad'] ."</td>";
                $tabla .= "<td>". $imp['materia'] ."</td>";
                $tabla .= "<td>". $imp['Usuario'] ."</td>";
                $tabla .= "<td>". $imp['estado'] ."</td>";
                $tabla .= "<form action='modificarProfesor.php' method='POST'>";
                    $tabla .= "<td><button name='idprofesor' value='".$imp['Id']."'>Modificar</button></td>";
                $tabla .= "</form>";
            $tabla .= "</tr>";
            echo $tabla;
            $cont++;
            
        }
    }
    
    //metodo que muestra a todos los profesores Inactivos
    public function listaProfesorInactivos(){
        $this->listaProfesor(2);
    }

    //metodo que muestra quien es el que está teniendo acceso a la pagina
    public function ver(){
        $this->conexionDB();
        $profe = $_SESSION['profe'];
        $query = "SELECT profesor.*, materia.id AS idmateria, materia.nombre AS materia FROM profesor INNER JOIN materia ON profesor.Idmateria= materia.Id  WHERE profesor.Id=$profe";
        $result = mysqli_query($this->con, $query);
        while($imp = mysqli_fetch_array($result)){
            echo $imp['Nombre'], " " ,$imp['Apellido'] . "<br>";
            echo $imp['materia'] . "<br>";
        }
    }

    /* Metodos para Estudiantes */
    //metodo que muestra los estudiantes de su materia
    public function VerEstudiantesNotas(){
        $this->conexionDB();
        $materia = $_SESSION['materia'];
        $query = "SELECT estudiante.Id AS idestudiante, estudiante.Nombre AS nombre, estudiante.Apellido AS apellido, aula.nombre AS aula, nota.n1 AS nota1, nota.n2 AS nota2, nota.n3 AS nota3, nota.Promedio AS promedio FROM nota INNER JOIN materia ON nota.idMateria=materia.id INNER JOIN estudiante ON nota.idEstudiante=estudiante.Id INNER JOIN aula ON aula.id=estudiante.Idaula WHERE nota.idMateria=$materia";
        $result = mysqli_query($this->con, $query);
        $cont = 1;
        while($imp = mysqli_fetch_array($result)){
            $tabla = "<tr>";
                $tabla .= "<td>". $cont ."</td>";
                $tabla .= "<td>".$imp['nombre']."</td>";
                $tabla .= "<td>". $imp['apellido'] ."</td>";
                $tabla .= "<td>". $imp['aula'] ."</td>";
                $tabla .= "<td>". $imp['nota1'] ."</td>";
                $tabla .= "<td>". $imp['nota2'] ."</td>";
                $tabla .= "<td>". $imp['nota3'] ."</td>";
                $tabla .= "<td>". $imp['promedio'] ."</td>";
                $tabla .= "<form action='modificarNota.php' method='POST'>";
                    $tabla .= "<td><button name='idestudiante' value='".$imp['idestudiante']."'>Modificar Nota</button></td>";
                $tabla .= "</form>";
            $tabla .= "</tr>";
            echo $tabla;
            $cont++;
        }
    }
    
    //tabla para ver los estudiantes sin notas
    public function EstudiantesSinNotas(){
        $this->conexionDB();
        $materia = $_SESSION['materia'];
        /* SELECT estudiante.Id, estudiante.Nombre FROM detalle INNER JOIN estudiante ON detalle.idEstudiante=estudiante.Id INNER JOIN materia ON detalle.idMateria=materia.id INNER JOIN nota ON nota.idMateria=materia.id WHERE detalle.idMateria=2 AND detalle.idEstudiante != nota.idEstudiante */
        $query = "SELECT DISTINCT estudiante.Id AS idestudiante, estudiante.Nombre As nombre, estudiante.Apellido As apellido FROM detalle INNER JOIN estudiante ON detalle.idEstudiante=estudiante.Id INNER JOIN materia ON detalle.idMateria=materia.id INNER JOIN nota ON nota.idMateria=materia.id WHERE detalle.idMateria=$materia AND detalle.idEstudiante != nota.idEstudiante";
        $result = mysqli_query($this->con, $query);
        $cont = 1;
        while($imp = mysqli_fetch_array($result)){
                $tabla = "<tr>";
                    $tabla .= "<td>". $cont ."</td>";
                    $tabla .= "<td>".$imp['nombre']."</td>";
                    $tabla .= "<td>". $imp['apellido'] ."</td>";
                    $tabla .= "<form action='EstudianteNotas.php' method='POST'>";
                        $tabla .= "<td><button name='idestudiante' value='".$imp['idestudiante']."'>Agregar Nota</button></td>";
                    $tabla .= "</form>";
                $tabla .= "</tr>";
                echo $tabla;
            $cont++;
        }
    }

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
    //metodo que ingresa las notas del estudiante
    public function ingresarNotas(){
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