<?php
header('Content-Type: application/json');

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "mahasigma");

// Periksa koneksi
if ($koneksi->connect_error) {
    die(json_encode(["error" => "Gagal terhubung ke database: " . $koneksi->connect_error]));
}

// Query untuk mendapatkan data mahasiswa berdasarkan jurusan
$query = "SELECT jurusan, COUNT(*) as jumlah FROM mahasiswa GROUP BY jurusan";
$result = $koneksi->query($query);

// Periksa apakah query berhasil
if (!$result) {
    die(json_encode(["error" => "Query gagal: " . $koneksi->error]));
}

// Menyiapkan array untuk data grafik
$labels = [];
$values = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['jurusan'];
    $values[] = $row['jumlah'];
}

// Mengembalikan data dalam format JSON
echo json_encode(["labels" => $labels, "values" => $values]);

// Tutup koneksi database
$koneksi->close();
?>
