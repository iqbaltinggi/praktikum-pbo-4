<?php
declare(strict_types=1);

class Mahasiswa {
    public function __construct(
        public string $nim,
        public string $nama,
        public int $semester = 1,
        public string $fakultas = 'Belum diisi'
    ) {}

    public function profil(): string {
        return "$this->nim - $this->nama (Semester $this->semester, Fakultas: $this->fakultas)";
    }
}

// Objek 1: fakultas memakai nilai default
$mhs1 = new Mahasiswa('231001', 'Alya', 3);
// Objek 2: fakultas diisi eksplisit
$mhs2 = new Mahasiswa('231002', 'Budi', 5, 'Sains dan Teknologi');

echo htmlspecialchars($mhs1->profil(), ENT_QUOTES, 'UTF-8') . "<br>";
echo htmlspecialchars($mhs2->profil(), ENT_QUOTES, 'UTF-8') . "<br>";
