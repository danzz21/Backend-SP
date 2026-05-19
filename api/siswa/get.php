<?php

// ================= SESSION ================= //
session_start();

// ================= HEADERS ================= //
header("Content-Type: application/json");

header("Access-Control-Allow-Origin: https://emakh.netlify.app");

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

header("Access-Control-Allow-Headers: Content-Type");

// ================= DATABASE ================= //
include "../../config/koneksi.php";

// ================= QUERY ================= //
$query = mysqli_query($conn, "
    SELECT
        id_siswa,
        nama_siswa,
        kelas
    FROM siswa
");

// ================= ERROR QUERY ================= //
if (!$query) {

    http_response_code(500);

    echo json_encode([
        "status" => "error",
        "message" => mysqli_error($conn)
    ]);

    exit;
}

// ================= AMBIL DATA ================= //
$data = [];

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

// ================= RESPONSE ================= //
echo json_encode([
    "status" => "success",
    "data" => $data
]);