<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../style/administrador.css">
    <title>Alumno</title>
</head>
<body>
<div class="contenido">
        <div class="navegador">
            <ul>
                <li>
                    <form action="#">
                        <span class="iconos"><i class="fa-solid fa-user"></i></span>
                        <input class="btn btn-link" type="submit" value="Alumno">
                    </form>
                </li>
                <li>
                    <form action="VerMateria.php" method="post">
                        <span class="iconos"><i class="fa-solid fa-user-check"></i></span>
                        <input class="btn btn-link" type="submit" value="Ver Materias">
                    </form>
                </li>
                <li>
                    <form action="../../index.php" method="post">
                        <span class="iconos"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                        <input class="btn btn-link" type="submit" value="Salir" name="boton3">
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="reciente">
        <?php 
                require "../../Clases/Estudiante.php";
                require "../../Clases/VisualizarEstudiante.php";
                require "../../Clases/VisualizarNota.php";
                $clase = new VisualizarEstudiante();
                $nota = new VisualizarNota();
                $clase->verInformacion();                
            ?>
            <h1>Notas</h1>
        <?php 
                
                $nota->verSeleccionPorMateria();
        ?>
        </div>
        <footer>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); margin-top:345px">
            © 2022 Copyright: Bootcamp Full Stack Junior (Grupo 2)
        </div>
    </footer>
    </div>





   
</body>
</html>