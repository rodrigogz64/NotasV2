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
    <?php
        require "../../Clases/Estudiante.php";
        $estudiante = new Estudiante();
    ?>
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
            <div class="encabezado_tabla">
                <h2>Control de Alumnos</h2>

                <table class='table table-bordered'  id="tabla_alumno" class="table table-striped table-bodered">
                    <thead class='table-success'>
                        <th></th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th>Aula</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php $estudiante->listaAlumnosActivos(1) ?>
                    </tbody>
                </table>
            </div>
    </div>
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



