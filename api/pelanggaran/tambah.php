<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include "../../config/koneksi.php";

$id_siswa = $_POST['id_siswa'] ?? '';
$jenis    = $_POST['jenis'] ?? '';
$poin     = $_POST['poin'] ?? '';

if (
    empty($id_siswa) ||
    empty($jenis) ||
    empty($poin)
) {

    echo json_encode([
        "status" => "error",
        "message" => "Data belum lengkap"
    ]);

    exit();
}

$query = mysqli_query($conn, "
    INSERT INTO pelanggaran (
        id_siswa,
        jenis_pelanggaran,
        poin
    )
    VALUES (
        '$id_siswa',
        '$jenis',
        '$poin'
    )
");

if ($query) {
    echo json_encode([
        "status" => "success",
        "message" => "Pelanggaran berhasil ditambahkan"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => mysqli_error($conn)
    ]);
}
?>