<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Notas</title>
</head>
<body>
    <?php

        require "Clases/sesion.php";
        $verificar = new IniciarSesion();
    ?>
    <main class="contenedor_diseño">
        <div class="imagen">
            <img src="recursos/elementos-de-pegatinas-de-regreso-a-la-escuela-.png" alt="">
        </div>
        <div class="formulario">
            <div class="datos_login">
                <img src="recursos/datos2.png" alt="">
                <h1>Inicio de Sesión</h1>
                <form action="" method="post" class="login_formulario"> 
                    <div class="grupo_input">
                        <label class="input_relleno">
                            <input type="text" name="user" id="">
                            <span class="input_label">Usuario</span>  
                            <i class="fa-solid fa-user"></i>
                        </label>
                    </div>
                    <div class="grupo_input">
                        <label class="input_relleno">
                            <input type="password" name="pass" id="">
                            <span class="input_label">Contraseña</span>
                            <i class="fa-solid fa-lock"></i>
                        </label>
                    </div>
                    <input type="submit" class="boton_login" value="Acceder" name="autenticar">
                </form>
            </div>
        </div>
    </main>

    <?php $verificar->AutenticarUsuario(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>