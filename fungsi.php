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


function delete_pelanggan($id) {
    global $konek;
    mysqli_query($konek, "DELETE FROM pelanggan WHERE PelangganID = '".$id."' ");
    return mysqli_affected_rows($konek);
}
?>