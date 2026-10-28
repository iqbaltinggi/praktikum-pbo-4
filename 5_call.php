<?php
declare(strict_types=1);

class LaporanMahasiswa {
    public function __construct(private string $nama) {}

    // Hanya 'cetakRingkas' (tanpa argumen) yang diizinkan
    public function __call(string $method, array $args): mixed {
        if ($method === 'cetakRingkas' && count($args) === 0) {
            return 'Mahasiswa: ' . $this->nama;
        }
        throw new BadMethodCallException('Method tidak tersedia: ' . $method);
    }
}

function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

$laporan = new LaporanMahasiswa('Alya');

echo '1. ' . e($laporan->cetakRingkas()) . "<br>";

try {
    $laporan->cetakLengkap();                 // method lain
} catch (BadMethodCallException $ex) {
    echo '2. ' . get_class($ex) . ': ' . e($ex->getMessage()) . "<br>";
}

try {
    $laporan->cetakRingkas('argumen');        // method benar tapi argumen salah
} catch (BadMethodCallException $ex) {
    echo '3. ' . get_class($ex) . ': ' . e($ex->getMessage()) . "<br>";
}
