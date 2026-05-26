<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include "../../config/koneksi.php";

$nama  = $_POST['nama'] ?? '';
$kelas = $_POST['kelas'] ?? '';

if (empty($nama) || empty($kelas)) {

    echo json_encode([
        "status" => "error",
        "message" => "Nama dan kelas wajib diisi"
    ]);

    exit;
}

$query = mysqli_query($conn, "
    INSERT INTO siswa (nama_siswa, kelas)
    VALUES ('$nama', '$kelas')
");

if ($query) {

    echo json_encode([
        "status" => "success",
        "message" => "Data berhasil ditambahkan"
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => mysqli_error($conn)
    ]);

}
?>