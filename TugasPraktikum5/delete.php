<?php
include "koneksi.php";

$id = $_GET['id'];

$delete = mysqli_query($koneksi, "DELETE FROM jajanan WHERE id=$id");

if ($delete) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='read.php';</script>";
} else {
    echo "Gagal menghapus data!";
}
?>
