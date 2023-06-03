<?php
include('../koneksi.php');

$id = $_GET['idstore'];

$query = mysqli_query($conn, "DELETE FROM pos WHERE idstore='$id'");

if ($query) {
    echo "<script type='text/javascript'>alert('Data Berhasil Dihapus'); window.location.href = 'pos.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Data TIDAK Berhasil Dihapus'); window.location.href = 'pos.php';</script>";
}
