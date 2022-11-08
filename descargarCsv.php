<?php

        $con = new mysqli("localhost","root","","Nota");

        $sql = "select * from Alumno";

        $query = $con->query($sql);

        if($query){
            while($r  = $query->fetch_object()){
                echo $r->id.",";
                echo $r->ap_paterno.",";
                echo $r->ap_materno.",";
                echo $r->nombre.",";
                echo $r->ex_parcial.",";
                echo $r->ex_final."\n";
                
            }
        }

        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename=export.csv;');





//video youtube
/*
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
        include 'model/conexion.php';
        $nombre_archivo="ArchivoEjemplo.csv";
        $fp= fopen($nombre_archivo, 'w');
        $leer_bd= "select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS
                    where TABLE_SCHEMA= 'Nota' and TABLE_NAME = 'Alumno'";
        $res_db=$conecta_system->query($leer_bd);  
        
        while($row = mysqli_fetch($res_db)){
            $header[] = $row[0];
        }
        fputcsv($fp,$header);

        $leer_tabla="select * from Alumno";
        $res_tabla=$conecta_system->query($leer_tabla);

        while($row = mysqli_fetch_row($res_tabla)){
            fputcsv($fp, $row);
        }

        if(file_exists($nombre_archivo)){
            $error=0;
            $mensaje = "Archivo CSV Generado";
            $datos=$nombre_archivo;
        } else{
            $error=1;
            $mensaje="Archivo CSV No Generado";
            $datos=0;
        }

        $resp=[
            "error"=>$error,
            "mensaje"=>$mensaje,
            "datos"=>$datos
        ];

        echo json_encode($resp);

    } else{
        $resp=[
            "error"=>1,
            "mensaje"=>"denejada peticion.",
            "datos"=>0
        ];
        echo json_encode($resp);
    }

*/

?>