<?php
        $mysqli = new mysqli("localhost","root","","Nota");
        require('fpdf/fpdf.php');


        require('model/conexion.php');
        $consulta = "SELECT * FROM Alumno";
        $resultado = $mysqli->query($consulta);


        class PDF extends FPDF
        {
        // Cabecera de página
        function Header()
        {
            // Arial bold 15
            $this->SetFont('Arial','B',18);
            // Movernos a la derecha
            $this->Cell(60);
            // Título
            $this->Cell(70,10,'Notas de alumnos',0,0,'C');
            // Salto de línea
            $this->Ln(20);

            $this->Cell(40, 10, 'Paterno', 1, 0, 'C, 0');
            $this->Cell(40, 10, 'Materno', 1, 0, 'C, 0');
            $this->Cell(40, 10, 'Nombre', 1, 0, 'C, 0');
            $this->Cell(30, 10, 'Parcial', 1, 0, 'C, 0');
            $this->Cell(30, 10, 'Final', 1, 1, 'C, 0');


        }
        
        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        }
        }





        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();//añadir pagina
        $pdf->SetFont('Arial','',16);//tipo de letra
       // $pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));//celdas
        while($row = $resultado->fetch_assoc()){
            $pdf->Cell(40, 10, $row['ap_paterno'], 1, 0, 'C, 0');
            $pdf->Cell(40, 10, $row['ap_materno'], 1, 0, 'C, 0');
            $pdf->Cell(40, 10, $row['nombre'], 1, 0, 'C, 0');
            $pdf->Cell(30, 10, $row['ex_parcial'], 1, 0, 'C, 0');
            $pdf->Cell(30, 10, $row['ex_final'], 1, 1, 'C, 0');
        }
        
        
        $pdf->Output();//imprimir pdf




?>