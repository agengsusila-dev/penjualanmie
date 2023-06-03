<?php
include('koneksi.php');

$id = $_POST['idproduk'];
$namaProduk = $_POST['namaproduk'];
$hargaProduk = $_POST['hargaproduk'];

$query = mysqli_query($conn, "UPDATE produk SET namaproduk = '$namaProduk', hargaproduk = '$hargaProduk' WHERE idproduk='$id'");

if ($query) {
    echo "<script type='text/javascript'>alert('Data Berhasil Di-update'); window.location.href = 'index.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Data TIDAK Berhasil Di-update'); window.location.href = 'index.php';</script>";
}
