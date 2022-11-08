<?php
    session_start();
    if(!isset($_SESSION['nombre'])){
        header('Location: login.php');
    }elseif(isset($_SESSION['nombre'])){
        include 'model/conexion.php';
        $sentencia = $bd->query("SELECT * FROM Alumno;");
        $alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($alumnos);
    }else{
        echo "Error en el sistema";
    }
   
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lista de alumnos</title>
</head>
<body>
    <section class="form-main" >
        <div class="form-content">
        <div class="circle-1"></div>
            <div class="circle-2"></div>
            <div class="circle-3"></div>
            
           
            <h1>Bienvenido: <?php echo $_SESSION['nombre']?></h1>
            <a href="cerrar.php" class="cerrar2" >Cerrar sesion</a>
            

            <div class="box">

                <h2>Lista de Alumnos</h2>   
                <div class="input-box">
                    <table> 
                        <thead>
                        <tr class="arriba">
                            
                                <td>Codigo</td></div>
                                <td>Apellido Paterno</td>
                                <td>Apellido Materno</td>
                                <td>Nombre</td>
                                <td>Parcial</td>
                                <td>Final</td>
                                <td>Promedio</td>
                                <td>Editar</td>
                                <td>Eliminar</td>
                        </tr>
                        </thead>
                                <?php foreach($alumnos as $dato){?>
                        <tr>
                                <td><?php echo $dato->id_alumno; ?></td>
                                <td><?php echo $dato->ap_paterno; ?></td>
                                <td><?php echo $dato->ap_materno; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->ex_parcial; ?></td>
                                <td><?php echo $dato->ex_final; ?></td>
                                <td><?php echo ($dato->ex_final + $dato->ex_parcial)/2; ?></td>
                                <td><a href="editar.php?id=<?php echo $dato->id_alumno; ?>"class="cerrar2"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><a href="eliminar.php?id=<?php echo $dato->id_alumno; ?>"class="cerrar2"><i class="fa-sharp fa-solid fa-trash"></i></a></td>
                        </tr>
                        
                      
                    <?php    }?> 
                    </table>
            
                                <a href="descargarCsv.php?id=<?php echo $dato->id_alumno; ?> " class="cerrar">CSV <i class="fa-solid fa-file-csv"></i></a>
                                <a href="descargarPdf.php?id=<?php echo $dato->id_alumno; ?>" class="cerrar">PDF <i class="fa-solid fa-file-pdf"></i></a>
                                
                    

                            <!-- inicio insert -->
                </div> 
                
            </div>                
            

                <h2>Ingresar Alumnos Nuevos:</h2>
                
                <div class="box">
                    <form method="POST" action="insertar.php">
                
                    <table>
                        <tr>
                            <td><i class="fa-solid fa-user"></i><input type="text" name="txtPaterno" placeholder="Apellido paterno" class="input-control"></td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-user"></i><input type="text" name="txtMaterno" placeholder="Apellido materno" class="input-control"></td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-user"></i><input type="text" name="txtNombre" placeholder="Nombre" class="input-control"></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-edit"></i><input type="text" name="txtParcial" placeholder="Nota Parcial" class="input-control"></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-edit"></i><input type="text" name="txtFinal" placeholder="Nota Final" class="input-control"></td>
                        </tr>
                        <tr>
                           <td><i class="fa-solid fa-user"></i><input type="file" name="img" class="cerrar2"></td>
                           
                        </tr>
                        <input type="hidden" name="oculto" value="1" >
                        <td><input type="submit" value="Ingresar Alumno" id="" class="cerrar2"></td>
                        <td><input type="reset" name=""class="cerrar2"></td>
                        
                         <tr>
                           
                        </tr>
                    
                   

                    </table>
                
                    </form>
               

                </div>
       
        
        </div>
                    <!-- fin insert -->

    </section>
    
</body>
</html>