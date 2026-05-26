<?php

// ================= SESSION ================= //
session_start();

// ================= HEADERS ================= //
header("Content-Type: application/json");

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: POST, OPTIONS");

header("Access-Control-Allow-Headers: Content-Type");

// HANDLE PREFLIGHT
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// ================= DATABASE ================= //
include "../../config/koneksi.php";

// ================= METHOD CHECK ================= //
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    http_response_code(405);

    echo json_encode([
        "status" => "error",
        "message" => "Method harus POST"
    ]);

    exit;
}

// ================= AMBIL ID ================= //
$id = $_POST['id'] ?? null;

// ================= VALIDASI ================= //
if (!$id) {

    http_response_code(400);

    echo json_encode([
        "status" => "error",
        "message" => "ID tidak dikirim"
    ]);

    exit;
}

if (!is_numeric($id)) {

    http_response_code(400);

    echo json_encode([
        "status" => "error",
        "message" => "ID tidak valid"
    ]);

    exit;
}

// ================= PREPARED STATEMENT ================= //
$stmt = $conn->prepare("
    DELETE FROM siswa
    WHERE id_siswa = ?
");

$stmt->bind_param("i", $id);

// ================= EKSEKUSI ================= //
if ($stmt->execute()) {

    if ($stmt->affected_rows > 0) {

        echo json_encode([
            "status" => "success",
            "message" => "Berhasil dihapus"
        ]);

    } else {

        echo json_encode([
            "status" => "error",
            "message" => "ID tidak ditemukan"
        ]);
    }

} else {

    http_response_code(500);

    echo json_encode([
        "status" => "error",
        "message" => "Gagal menghapus data"
    ]);
}