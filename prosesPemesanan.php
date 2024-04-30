<?php

$conn = mysqli_connect("localhost", "root", "rahasia", "pemweb");

echo $nama_mobil;

if (mysqli_connect_errno()) {
  echo "Koneksi database gagal: " . mysqli_connect_error();
  exit();
} else  echo "Database connected";

$nama_mobil = $_POST['nama_mobil'];
$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$tanggal_peminjaman = $_POST['tanggal_peminjaman'];
$tanggal_pengembalian = $_POST['tanggal_pengembalian'];
$bukti_pembayaran = upload();

$query2 = "call insertPesanan('$nama_mobil','$nama', '$telepon', '$email', '$tanggal_peminjaman', '$tanggal_pengembalian', '$bukti_pembayaran')";

function upload(){
  $uploadDir = 'C:/bukti_transfer/';

  if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] === UPLOAD_ERR_OK) {
      $tmpFilename = $_FILES['bukti']['tmp_name'];

      $filename = uniqid() . '_' . basename($_FILES['bukti']['name']);

      if (move_uploaded_file($tmpFilename, $uploadDir . $filename)) {
          return $filename; 
      } else {
          echo "Gagal mengunggah file.";
          return null;
      }
  } else {
      echo "Tidak ada file yang diunggah atau terjadi kesalahan.";
      return null;
  }
}

if (mysqli_query($conn, $query2)) {
  echo "Data berhasil disimpan ke database.";
} else {
  echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);