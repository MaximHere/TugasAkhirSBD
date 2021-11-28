<?php
    require "fpdf.php";
    include "fungsi.php";

    $id = $_GET["id"];
    $data = query("SELECT * FROM pelanggan NATURAL JOIN invoice NATURAL JOIN orders  NATURAL JOIN layanan");

    $pelanggan = $data[0]["NamaPelanggan"];

    $pdf = new FPDF("p","cm","a5");
    $pdf->AddPage();


    $pdf->SetFont("courier","B",20);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(10,3.5,"Chris Laundry  ",0,2,"R");

    $pdf->SetFont("courier","B",14);

    $pdf->Cell(-4,-1.6,"",0,2);
    $pdf->Cell(-4,3,   "",0,2);

    $pdf->Cell(-4,-1.6,"",0,2);
    $pdf->Cell(-4,3,   "",0,2);
    $pdf->Line(1,1,10,1);

    $pdf->Cell(-4,-1.6,"    $id",0,2); 
    $pdf->Cell(-4,-1.6,"    $pelanggan",0,2);

    $pdf->Output();
?>