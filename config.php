<?php
//Config Database
$host   = 'localhost';
$user   = 'root';
$pass   = '';
$dbname = 'rsintanh_portal';

//mengubung ke host
$connect = mysqli_connect($host, $user, $pass, $dbname);
// $connect = new mysqli($host, $user, $pass, $dbname);

//Deskripsi Apps
$app_name = 'PORTAL RSIH';
$company  = 'RS INTAN HUSADA';
