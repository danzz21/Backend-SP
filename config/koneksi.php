<?php

$conn = mysqli_connect(
    "yamabiko.proxy.rlwy.net",
    "root",
    "DEmUxauDcCpXBIQJNOIQCCkVfxBuKJhb",
    "railway",
    14076
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
header("Access-Control-Allow-Origin: https://emahk.netlify.app");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type");