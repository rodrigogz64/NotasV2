<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../style/administrador.css">
    <title>Registrar Alumno</title>
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
                        <span class="iconos"><i class="fa-solid fa-user-check"></i></span>
                        <input class="btn btn-link" type="submit" value="Estudiante Inactivos">
                    </form>
                </li>
                <!--nav que muestra los profesores inactivos-->
                <li>
                    <form action="ProfesorInactivo.php">
                        <span class="iconos"><i class="fa-solid fa-chalkboard-user"></i></span>
                        <input class="btn btn-link" type="submit" value="Profesores Inactivos">
                    </form>
                </li>
                <li>
                    <form action="" method="post">
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
            //llamando al archivo que contiene la clase
            require "../../Clases/Estudiante.php";
            //Instancia de la clase
            $persona = new Estudiante();
            if(!isset($_POST['registrarAlumno'])){
        ?>
        <section class="d-flex justify-content-center">
            <div class="card col-sm-6 p-2">
                <div class="mb-2">
                    <h4>Registrar Alumnos</h4>
                </div>
                <div class="mb-2">
                    <form action="" method="post">
                        <div class="mb-2">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese Nombres" require>
                        </div> 
                        <div class="mb-2">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Ingrese Apellidos" require>
                        </div> 
                        <div class="mb-2">
                            <label for="edad" class="form-label">Edad</label>
                            <input class="form-control" type="number" name="edad" id="edad" placeholder="0" require>
                        </div>
                        <div class="mb-2">
                            <label for="aula" class="form-label">Aula</label>
                            <select name="aula" id="" class="form-select" require>
                                <?php $persona->aulasDispobibles(); ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="usuario" class="form-label">Asignar Usuario</label>
                            <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Asignar usuario" require>
                        </div>
                        <div class="mb-2">
                            <label for="contrasena" class="form-label">Asignar Contraseña</label>
                            <input class="form-control" type="text" name="password" id="password" require>
                        </div>
                        <div class="mb-2 d-grid gap-2">
                            <!-- boton -->
                            <input class="btn btn-primary" type="submit" value="Registrar" name="registrarAlumno" id="resgistrarAlumno">
                        </div>
                    </form>
                    <?php } else{?>
                    <form action="" method="POST">
                        <?php
                        //recibe los datos del nuevo estudiante y los almacena en la base de datos  
                            $persona->resgistrarEstudiante();
                        ?>
                        <br>
                        <br>
                        <label for="">Asignar Materias</label><br>
                        <!-- checkbox que contienen las materias -->
                        <?php $persona->materiasDisponibles(); ?>
                        <br>
                        <!-- boton para asignar las materias al estudiante -->
                        <input type="submit" name="asignarMaterias" placeholder="Asignar Materias">
                    </form>
                    <?php
                        }$persona->asignarMateria();  
                    ?>
                </div>
            </div>
        </section>
       
        </div>
    </div>
    </div>
    
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

