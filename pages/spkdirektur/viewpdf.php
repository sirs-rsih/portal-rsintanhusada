<?php
$file = $_GET['file'];
$path = __DIR__ . '/files/' . basename($file);

if (file_exists($path)) {
  header('Content-Type: application/pdf');
  header('Content-Disposition: inline; filename="' . basename($path) . '"');
  readfile($path);
  exit;
} else {
  echo "File tidak ditemukan.";
}
