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
    <title>Profesor</title>
</head>
<body>
    <div class="contenido">
        <div class="navegador">
            <ul>
                <li>
                    <form action="#">
                        <span class="iconos"><i class="fa-solid fa-user"></i></span>
                        <input class="btn btn-link" type="submit" value="Profesor">
                    </form>
                </li>
                <li>
                    <form action="VerEstudiantes.php" method="post">
                        <span class="iconos"><i class="fa-solid fa-user-check"></i></span>
                        <input class="btn btn-link" type="submit" value="Control de Alumnos">
                    </form>
                </li>
                <li>
                    <form action="Alumnos.php" method="post">
                        <span class="iconos"><i class="fa-solid fa-ban"></i></span>
                        <input class="btn btn-link" type="submit" value="Alumnos sin notas">
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
        require "../../Clases/Profesor.php";
        require "../../Clases/ObtenerNota.php";
        $obtener_nota = new ObtenerNota();
        ?>
        <section class="d-flex justify-content-center">
            <div class="card col-sm-6 p-2">
                <div class="mb-2">
                    <h4>Modificar Notas</h4>
                </div>
                <div class="mb-2">
                    <form action="" method="POST">
                        <?php $obtener_nota->extraerNota(); ?>
                    </form>
                </div>
            </div>
        </section>
        
        <?php 
            require "../../Clases/ModificarNota.php";
            $modificar_nota = new ModificarNota();
            $modificar_nota->modificarNota(); 
        ?>
        </div>
        <footer>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); margin-top:90px">
            © 2022 Copyright: Bootcamp Full Stack Junior (Grupo 2)
        </div>
        </footer>
    </div>
</body>
</html>