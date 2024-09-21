<?php
include 'koneksi.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];

  // Query untuk menghapus data berdasarkan ID
  $sql = "DELETE FROM pesanan WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    // Jika sukses, redirect kembali ke halaman riwayat pesanan
    header("Location: riwayat.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
