<?php

$host = $_ENV['MYSQLHOST'];
$user = $_ENV['MYSQLUSER'];
$pass = $_ENV['MYSQLPASSWORD'];
$db   = $_ENV['MYSQLDATABASE'];
$port = $_ENV['MYSQLPORT'];

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>