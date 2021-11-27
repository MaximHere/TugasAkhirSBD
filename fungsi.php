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
?>