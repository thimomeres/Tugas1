<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];

    if (empty($nama) || empty($harga)) {
        echo "Semua field harus diisi.";
        exit;
    }

    echo "<h2>Data yang Diterima:</h2>";
    echo "Nama: " . htmlspecialchars($nama) . "<br>";
    echo "Harga: " . htmlspecialchars($harga) . "<br>";
    echo "Deskripsi: " . htmlspecialchars($deskripsi) . "<br>";

} else {
    echo "Data harus dikirim melalui method POST.";
}

?>