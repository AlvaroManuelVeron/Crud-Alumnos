
<?php
    session_start();
    if(isset($_SESSION['nombre'])){
        header('Location: index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Iniciar sesion</title>
</head>
<body>
    <section class="form-main" >
        <div class="form-content">
            <div class="circle-1"></div>
            <div class="circle-2"></div>
            <div class="circle-3"></div>
            <div class="box">

                <h3>Ingresar</h3>
    
                <form method = "POST" action="loginProceso.php">
                   
                    <div class="input-box">
                        <input type="text" name="txtUsu" placeholder="Usuario" class="input-control">
                    </div>

                    <div class="input-box">      
                    <input type="password" name="txtPass" placeholder="Contraseña" class="input-control">
                        <div class="input-link">
                            <a href="#" class="gradient-text">Has olvidado tu contraseña?</a>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn">Iniciar sesion</button>

                </form>
                <p>No tienes cuenta? <a href="#" class="gradient-text">Crear cuenta</a></p>
            </div>
        </div>
    
    </section>
</body>
</html>