<?php
include('../koneksi.php');

$rcpt = $_GET['rcpt'];
$idproduk = $_GET['idproduk'];

$query = mysqli_query($conn, "DELETE FROM detailorder WHERE rcpt='$rcpt' AND idproduk='$idproduk'");

if ($query) {
    echo "<script type='text/javascript'>alert('Data Berhasil Dihapus'); window.location.href = 'order.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Data TIDAK Berhasil Dihapus'); window.location.href = 'order.php';</script>";
}
