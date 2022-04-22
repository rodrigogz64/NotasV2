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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../style/administrador.css">
    <title>Control Alumnos</title>
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
                require "../../Clases/VisualizarProfesor.php";
                $clase = new VisualizarProfesor();
                $clase->ver();
                
            ?>
            <div class="encabezado_tabla">

                <table class='table table-bordered' id="tabla_alumno" class="table table-striped table-bodered">
                    <thead class='table-success'>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Aula</th>
                        <th>N1</th>
                        <th>N2</th>
                        <th>N3</th>
                        <th>Promedio</th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php                     
                        require "../../Clases/EstudianteNota.php";
                        $estudiante = new EstudianteNota();
                        $estudiante->verEstudianteNotas();                    
                    ?>
                    </tbody>
                </table>
                <a href="Alumnos.php">Agregar Notas</a>
            </div>
            
    </div>
            <footer>
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); margin-top:60px">
                © 2022 Copyright: Bootcamp Full Stack Junior (Grupo 2)
            </div>
            </footer>
    </div>
    
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
    $('#tabla_alumno').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "¡Lo sentimos encontrado!",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se han encontrado coincidencias",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "previous": "Anterior",
                "next": "Siguiente",
                "last": "Ultimo"
            }
        },
        "scrollY": 300,
        "lengthMenu":[[10, 25, -1], [10, 25, "Todo"]],
    } );
    } );
    </script>

</body>
</html>

           
            