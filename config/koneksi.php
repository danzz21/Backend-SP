<?php

header("Access-Control-Allow-Origin: https://emakh.netlify.app");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

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