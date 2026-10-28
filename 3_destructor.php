<?php
declare(strict_types=1);

class Buku {
    public function __construct(
        private string $judul,
        private string $penulis,
        private int $tahun
    ) {
        echo "Constructor: objek '$this->judul' dibuat<br>";
    }

    public function tampilInfo(): string {
        return "$this->judul | $this->penulis | $this->tahun";
    }

    public function __destruct() {
        echo "Destructor: objek '$this->judul' dihancurkan<br>";
    }
}

echo "<b>Skenario A - tanpa alias</b><br>";
$a = new Buku('Buku A', 'Penulis A', 2020);
unset($a);                       // tidak ada referensi lain -> destructor langsung jalan
echo "Setelah unset(\$a)<br><br>";

echo "<b>Skenario B - dengan alias</b><br>";
$b = new Buku('Buku B', 'Penulis B', 2021);
$alias = $b;                     // objek sekarang punya 2 referensi
unset($b);                       // masih ada $alias -> destructor BELUM jalan
echo "Setelah unset(\$b), alias masih ada<br>";
unset($alias);                   // referensi terakhir hilang -> destructor jalan
echo "Setelah unset(\$alias)<br><br>";

echo "<b>Skenario C - akhir skrip</b><br>";
$c = new Buku('Buku C', 'Penulis C', 2022);
echo "Skrip selesai (destructor Buku C jalan setelah baris ini)<br>";
