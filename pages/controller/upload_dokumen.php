<?php
include('../../config.php');
include('../helpers/upload_helper.php');

$unit = $_GET['unit'];
$unit_table = strtolower(str_replace(' ', '', $unit));
$sql = "SHOW TABLES LIKE '$unit_table'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
  // echo "✅ Tabel $unit_table ditemukan di database.";
  // Form POST
  // $file_upload = $_POST['upload'];
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  //File Description
  $file_description = $_FILES['upload'];
  $nama_file = $file_description['name'];
  $ukuran = $file_description['size'];
  $temp_dir = $file_description['tmp_name'];
  //pengolahan files
  $target_dir = "../../files/";
  $valid_ekstensi = array('pdf', 'docx');
  $pecahan_nama = explode('.', $nama_file);
  $ekstensi = strtolower(end($pecahan_nama));
  $q = mysqli_query($connect, "SELECT * FROM $unit_table WHERE unit='$unit' AND judul='$judul'");
  if (mysqli_num_rows($q) >= 1) {
    header("location:../../pages/$unit_table/index.php?unit=" . $unit . '&message=duplicate');
    return false;
  } else if (in_array($ekstensi, $valid_ekstensi) === true) {

    $hasil = uploadFile($ekstensi, $unit, $judul, $file_tmp);
    $lokasi = $hasil['path'];
    $query = mysqli_query($connect, "INSERT INTO $unit_table VALUES(NULL,'$unit','$judul','$deskripsi','$lokasi',now())");
    if ($query) {
      header("location:../../pages/$unit_table/index.php?unit=" . $unit . '&message=success');
      return false;
    } else {
      header("location:../../pages/$unit_table/index.php?unit=" . $unit . '&message=gagal');
      return false;
    }
  } else {
    header("location:../../pages/$unit_table/index.php?unit=" . $unit . '&error=2');
    return false;
  }
} else {
  echo "❌ Tabel $unit_table tidak ditemukan.";
  exit;
}
