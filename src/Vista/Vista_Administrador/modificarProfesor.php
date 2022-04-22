<?php

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
    <title>Administrador</title>
</head>
<body>
    <div class="contenido">
        <div class="navegador">
            <ul>
                <li>
                    <form action="#">
                        <span class="iconos"><i class="fa-solid fa-user"></i></span>
                        <input class="btn btn-link" type="submit" value="Administrador">
                    </form>
                </li>
                <li>
                    <form action="listaEstudiante.php" method="post">
                        <span class="iconos"><i class="fa-solid fa-user-check"></i></span>
                        <input class="btn btn-link" type="submit" value="Control de Alumnos">
                    </form>
                </li>
                <li>
                    <form action="listaProfesor.php">
                        <span class="iconos"><i class="fa-solid fa-chalkboard-user"></i></span>
                        <input class="btn btn-link" type="submit" value="Control de Profesores">
                    </form>
                </li>
                <li>
                    <form action="registrarEstudiante.php" method="post">
                        <span class="iconos"><i class="fa-solid fa-user-pen"></i></span>
                        <input class="btn btn-link" type="submit" value="Registrar Alumno" name="boton1">
                    </form>
                </li>
                <li>
                    <form action="registrarProfesor.php" method="post">
                        <span class="iconos"><i class="fa-solid fa-file-pen"></i></span>
                        <input class="btn btn-link" type="submit" value="Registrar Maestro" name="boton3">
                    </form>
                </li>
                  <!--nav que muestra los estudiantes inactivos-->
                  <li>
                    <form action="EstudianteInactivos.php" method="post">
                        <span class="iconos"><i class="fa-solid fa-user-clock"></i></span>
                        <input class="btn btn-link" type="submit" value="Estudiante Inactivos">
                    </form>
                </li>
                <!--nav que muestra los profesores inactivos-->
                <li>
                    <form action="ProfesorInactivo.php">
                        <span class="iconos"><i class="fa-solid fa-person-chalkboard"></i></span>
                        <input class="btn btn-link" type="submit" value="Profesores Inactivos">
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
           <!-- Pagina que muestra los datos a modificar -->
           <?php
                require "../../Clases/ModificarProfesor.php";
                require "../../Clases/IdProfesor.php";
                $modificar_profesor = new ModificarProfesor();
                $id_profesor = new IdProfesor();
            ?>
            <section class="d-flex justify-content-center">
                <div class="card col-sm-6 p-2">
                    <div class="mb-2">
                        <h4>Modificar Profesor</h4>
                    </div>
                    <div class="mb-2">
                        <form method="POST">
                        <?php $id_profesor->extraerId(); ?>
                        </form>
                    </div>
                </div>
            </section>
           
            <?php $modificar_profesor->modificar(); ?>
        </div><footer>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); margin-top:75px">
            © 2022 Copyright: Bootcamp Full Stack Junior (Grupo 2)
        </div>
     </footer>

    </div>
</body>
</html>