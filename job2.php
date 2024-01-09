<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Tahun Menuju Tahun Tertentu</title>
</head>
<body>
    <h2>Masukkan Tahun Tujuan:</h2>
    <form action="coba.php" method="post">
        <input type="number" name="targetYear" placeholder="Tahun Tujuan" required>
        <button type="submit">Hitung</button>
    </form>

<?php

// Fungsi untuk menghitung berapa tahun lagi menuju tahun tertentu
function yearsRemaining($targetYear) {
    $currentYear = date("Y");
    $yearsRemaining = $targetYear - $currentYear;
    return $yearsRemaining;
}

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai tahun tujuan dari input form
    $targetYear = isset($_POST["targetYear"]) ? intval($_POST["targetYear"]) : 2030;

    // Panggil fungsi yearsRemaining dan cetak hasilnya
    if ($targetYear < date("Y")) { 
        echo "Tahun ke-$targetYear telah lewat.";
    } else {
        for ($i = date("Y"); $i <= $targetYear; $i++) {
            $result = yearsRemaining($i);

            // Gunakan if untuk menentukan pesan yang akan dicetak
            if ($result > 0) {
                echo "Tinggal $result tahun lagi menuju tahun $i.<br>";
            }  else {
                echo "Tahun Saat Ini 2024 <br>";
            }
        }
    }
} else {
    // Jika tidak ada data yang disubmit, beri pesan error
    echo "Isi Tahun Yang Di Tuju Terlebih Dahulu.";
}

?>

</body>
</html>