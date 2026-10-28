<?php
declare(strict_types=1);

class Buku {
    public function __construct(
        private string $judul,
        private string $penulis,
        private int $tahun
    ) {}

    public function tampilInfo(): string {
        return htmlspecialchars("$this->judul | $this->penulis | $this->tahun", ENT_QUOTES, 'UTF-8');
    }
}

$daftar = [
    new Buku('Pemrograman PHP Dasar', 'Andi Wijaya', 2020),
    new Buku('Belajar OOP dengan PHP', 'Siti Rahma', 2022),
    new Buku('Basis Data Praktis', 'Budi Santoso', 2019),
];

foreach ($daftar as $i => $buku) {
    echo ($i + 1) . '. ' . $buku->tampilInfo() . "<br>";
}
