<?php
//print_r($_GET)

if(!isset($_GET['id'])){
    exit();
}

$codigo = $_GET['id'];
include 'model/conexion.php';
$sentencia = $bd->prepare("DELETE FROM Alumno WHERE id_alumno = ?;");
$resultado = $sentencia->execute([$codigo]);

if($resultado === TRUE){
    header('Location: index.php');
}else{
    echo "Error";
}

?>