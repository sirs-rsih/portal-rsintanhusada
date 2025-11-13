<?php
function uploadFile($ekstensi, $unit, $judul, $file_tmp)
{
  include('./config.php');
  $folder_tujuan = realpath(__DIR__ . '/../../files');
  $nama_file = $unit . '-' . $judul . '.' . $ekstensi;
  $lokasi = $folder_tujuan . '/' . $nama_file;
  $lokasi_db = '../../files/' . $unit . '-' . $judul . '.' . $ekstensi;
  move_uploaded_file($file_tmp, $lokasi);
  return [
    'status' => true,
    'path' => $lokasi_db
  ];
}
