<?php
$konek = mysqli_connect("localhost", "root", "", "chrislaundry");

function query($command){
    global $konek;
    $hasil = mysqli_query($konek, $command);
    $wadah = [];
    while( $baris = mysqli_fetch_assoc($hasil)){
        $wadah[] = $baris;
    }
    return $wadah;
}

function catch_orders($one, $two){
    $wadah = [];
    $wadah[] = $one;
    $wadah[] = $two;
}

function tambah_pelanggan($data){
    global $konek;

    $nama = $_POST["NamaPelanggan"];
    $alamat = $_POST["AlamatPelanggan"];
    $notelp = $_POST["NoTelp"];

    $querry_insert = "INSERT INTO pelanggan VALUES ('','$nama', '$alamat','$notelp')";
    mysqli_query($konek, $querry_insert);
    return mysqli_affected_rows($konek);
}

function tambah_layanan($data){
    global $konek;

    $kode = $_POST["KodeLayanan"];
    $jenis = $_POST["JenisLayanan"];
    $harga = $_POST["HargaLayanan"];

    $querry_insert = "INSERT INTO layanan VALUES ('$kode', '$jenis','$harga')";
    mysqli_query($konek, $querry_insert);
    return mysqli_affected_rows($konek);
}

function tambah_orders($data){
    global $konek;

    $nota = $_POST["KodeNota"];
    $layanan = $_POST["KodeLayanan"];
    $qty = $_POST["Qty"];

    $querry_insert = "INSERT INTO orders VALUES ('$nota', '$layanan','$qty')";
    mysqli_query($konek, $querry_insert);
    return mysqli_affected_rows($konek);
}

function tambah_invoice($data){
    global $konek;

    $tanggal = $_POST["TanggalNota"];
    $pelanggan = $_POST["PelangganID"];

    $querry_insert = "INSERT INTO invoice VALUES ('', '$tanggal','$pelanggan')";
    mysqli_query($konek, $querry_insert);
    return mysqli_affected_rows($konek);
}



function delete_pelanggan($id) {
    global $konek;
    mysqli_query($konek, "DELETE FROM pelanggan WHERE PelangganID = '".$id."' ");
    return mysqli_affected_rows($konek);
}

function delete_layanan($kode) {
    global $konek;
    mysqli_query($konek, "DELETE FROM layanan WHERE KodeLayanan = '".$kode."' ");
    return mysqli_affected_rows($konek);
}

function delete_invoice($kode) {
    global $konek;
    mysqli_query($konek, "DELETE FROM invoice WHERE KodeNota = '".$kode."' ");
    return mysqli_affected_rows($konek);
}

function delete_orders($one, $two) {
    global $konek;
    mysqli_query($konek, "DELETE FROM orders WHERE KodeNota = '".$one."' AND  KodeLayanan = '".$two."' ");
    return mysqli_affected_rows($konek);
}

function update_pelanggan($data) {
    global $konek;
    $NamaPelanggan = htmlspecialchars($data["NamaPelanggan"]);
    $alamatpelanggan = htmlspecialchars($data["AlamatPelanggan"]);
    $notelp = htmlspecialchars($data["NoTelp"]);
    $target = $data["target"];

    $query = "UPDATE pelanggan SET
                NamaPelanggan = '$NamaPelanggan',
                AlamatPelanggan = '$alamatpelanggan',
                NoTelp = '$notelp'
                WHERE PelangganID = '$target'
                ";

    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}

function update_layanan($data) {
    global $konek;
    $kode = htmlspecialchars($data["KodeLayanan"]);
    $jenis = htmlspecialchars($data["JenisLayanan"]);
    $harga = htmlspecialchars($data["HargaLayanan"]);
    $target = $data["target"];

    $query = "UPDATE layanan SET
                KodeLayanan = '$kode',
                JenisLayanan = '$jenis',
                HargaLayanan = '$harga'
                WHERE KodeLayanan = '$target'";

    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}

function update_orders($data) {
    global $konek;
    $qty = htmlspecialchars($data["Qty"]);
    $nota = $data["target_nota"];
    $layanan = $data["target_layanan"];

    $query = "UPDATE orders SET
                Qty = '$qty'
                WHERE KodeLayanan = '$layanan' AND KodeNota = '$nota'";

    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}

function update_invoice($data) {
    global $konek;
    $tanggal = htmlspecialchars($data["TanggalNota"]);
    $pelanggan = htmlspecialchars($data["PelangganID"]);
    $target = $data["target_nota"];
    $query = "UPDATE invoice SET
                TanggalNota = '$tanggal',
                PelangganID = '$pelanggan'
                WHERE KodeNota = '$target'";
    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}
?>