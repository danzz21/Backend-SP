<?php

header("Content-Type: application/json");

header("Access-Control-Allow-Origin: https://emakh.netlify.app");

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

header("Access-Control-Allow-Headers: Content-Type");

include "../../config/koneksi.php";

$query = mysqli_query($conn, "
    SELECT
        siswa.id_siswa,
        siswa.nama_siswa,
        siswa.kelas,
        COALESCE(SUM(pelanggaran.poin), 0) as poin
    FROM siswa
    LEFT JOIN pelanggaran
        ON siswa.id_siswa = pelanggaran.id_siswa
    GROUP BY siswa.id_siswa
");

if (!$query) {

    http_response_code(500);

    echo json_encode([
        "status" => "error",
        "message" => mysqli_error($conn)
    ]);

    exit;
}

$data = [];

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

echo json_encode([
    "status" => "success",
    "data" => $data
]);