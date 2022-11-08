<?php
    session_start();
    if(!isset($_GET['id'])){
    header('Location: index.php');
}
    if(!isset($_SESSION['nombre'])){
        header('Location: login.php');
    }elseif(isset($_SESSION['nombre'])){
        include 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("SELECT * FROM Alumno WHERE id_alumno = ?;");
    $sentencia->execute([$id]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
    }else{
        echo "Error en el sistema";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar Alumno</title>
</head>
<body>
    <section class="form-main" >
        <div class="form-content">
            <div class="circle-1"></div>
            <div class="circle-2"></div>
            <div class="circle-3"></div>
        <div class="box">
    
        <h3>Editar Alumno:</h3>

        <form action="editarProceso.php" method="POST">
            
                <table>
                <div class="input-box">
                <tr>
               
                <td>Apellido paterno:</td>
               
                    <td><input type="text" name="txt2Paterno" class="input-control" value="<?php echo $persona->ap_paterno; ?>"></td>
                </tr>
                </div>
                </div>
                <div class="input-box">
                <tr>
                    <td>Apellido materno:</td>
                    <td><input type="text" name="txt2Materno" class="input-control" value="<?php echo $persona->ap_materno; ?> "></td>
                </tr>
                </div>
                <div class="input-box">
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="txt2Nombre" class="input-control" value="<?php echo $persona->nombre; ?> "></td>
                </tr>
                </div>
                <div class="input-box">
                <tr>
                    <td>Examen parcial:</td>
                    <td><input type="text" name="txt2Parcial" class="input-control" value="<?php echo $persona->ex_parcial; ?>"></td>
                </tr>
                </div>
                <div class="input-box">
                <tr>
                    <td>Examen final:</td>
                    <td><input type="text" name="txt2Final" class="input-control" value="<?php echo $persona->ex_final; ?>"></td>
                </tr>
                </div>
                <div class="input-box">
                <tr>
                    <input type="hidden" name="oculto">
                    <input type="hidden" name="id2" value="<?php echo $persona->id_alumno; ?>">
                    <button colspan="2" type="submit" class="btn">EDITAR ALUMNO</button>
                </tr>
                
               
                
                </div>
            </table>
                
        </form>
                
                                  
                    <a href="index.php" class="btn2">VOLVER</a>
                    
                    
                
        
        </div>
        
        </div>
        
     </section>
</body>
</html>