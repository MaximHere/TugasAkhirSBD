<?php
    require "fpdf.php";
    include "fungsi.php";

    $id = $_GET["id"];
    $data = query("SELECT *, (HargaLayanan*Qty) as 'Jumlah' FROM pelanggan NATURAL JOIN invoice NATURAL JOIN orders NATURAL JOIN layanan
            WHERE KodeNota = '$id'");
    $total = query("SELECT SUM(HargaLayanan*Qty) as 'Total' FROM invoice NATURAL JOIN orders NATURAL JOIN layanan
            WHERE KodeNota = '$id'")[0]["Total"];


    $pelanggan = $data[0]["NamaPelanggan"];
    $tanggal = $data[0]["TanggalNota"];
    $telp = $data[0]["NoTelp"];

    $pdf = new FPDF("p","cm","a5");
    $pdf->AddPage();


    $pdf->SetFont("courier","B",24);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(10,3.5,"Chris Laundry ",0,2,"R");

    $pdf->SetFont("courier","B",14);

    $pdf->Cell(-4,-1.6,"",0,2);
    $pdf->Cell(-4,3,   "",0,2);

    $pdf->Cell(-4,-1.6,"",0,2);
    $pdf->Cell(-4,3,   "",0,2);

    $pdf->Line(0.9,6,13,6);
    $pdf->Line(0.9,6.9,13,6.9);
    $pdf->Line(0.9,12,13,12);
    $pdf->Line(0.9,13,13,13);

    $pdf->Line(0.9,6,0.9,13);
    $pdf->Line(2.1,6,2.1,12);
    $pdf->Line(6,6,6,12);
    $pdf->Line(8.6,6,8.6,13);
    $pdf->Line(13,6,13,13);


    $pdf->SetFont("courier","B",12);
    $pdf->Cell(-4,-3.5,"Tanggal: $tanggal",0,4);
    $pdf->Cell(-4,3.5,"                              No Nota: $id",0,4,);
    $pdf->Ln(0.1);
    $pdf->Cell(-4,-2,"Qty",0,2);
    $pdf->Cell(-4,2,"     Jenis Layanan",0,2);  
    $pdf->Cell(-4,-2,"                      Harga",0,2,);
    $pdf->Cell(-4,2,"                                   Jumlah",0,2,); 
    $pdf->Cell(-4,10.1,"                     Total",0,2,);


    $pdf->SetFont("courier",'',14);
    // $pdf->Cell(-4,-2,"    $id",0,2); 
    $pdf->Cell(-4,-8,"Nama: $pelanggan",0,2);
    $pdf->Cell(11,8,"NoTelp: $telp",0,2,"R");
    $pdf->Cell(-4,-10   ,"                              $total",0,2); 

    foreach($data as $baris):
        $qty = $baris['Qty'];
        $layanan = $baris['JenisLayanan'];
        $harga = $baris['HargaLayanan'];
        $jumlah = $baris['Jumlah'];
        $pdf->Cell(11,0," $qty",0,2,);
        $pdf->Cell(11,0,"      $layanan",0,2,);
        $pdf->Cell(11,0,"  $harga               ",0,2,"R");
        $pdf->Cell(11,0," $jumlah ",0,2,"R");
        $pdf->Ln(1);
    endforeach;

    $pdf->Output();
?>