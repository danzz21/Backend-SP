<?php

$conn = mysqli_connect(
    getenv("MYSQLHOST"),
    getenv("MYSQLUSER"),
    getenv("MYSQLPASSWORD"),
    getenv("MYSQLDATABASE"),
    getenv("MYSQLPORT")
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "Koneksi berhasil";