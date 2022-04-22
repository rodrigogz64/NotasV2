<?php

class EstudianteNota
{
    //formulario para agregar notas y depende de el metodo ingresar notas
    public function estudianteNotas(){
        //conexion DB
        $conexion = new Conexion();
        $conexion->conexionDB();

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
}