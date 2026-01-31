<?php
// Set header untuk memberi tahu browser bahwa yang dikirimkan adalah format JSON
header('Content-Type: application/json');

// Membuat koneksi ke database MariaDB
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

// Mengecek jika koneksi gagal
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari database (ganti 'your_table' dan 'column1', 'column2' sesuai kebutuhan)
$sql = "SELECT column1, column2, column3 FROM your_table ORDER BY some_column LIMIT 5";  // Ubah query sesuai dengan data yang diinginkan
$result = $conn->query($sql);

// Siapkan array untuk menyimpan hasil query
$data = array();

// Mengecek jika ada data yang ditemukan
if ($result->num_rows > 0) {
    // Mengambil setiap baris hasil query dan memasukkannya ke dalam array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo json_encode(["message" => "Data tidak ditemukan"]);
}

// Menutup koneksi ke database
$conn->close();

// Mengirimkan data dalam format JSON
echo json_encode($data);
?>
