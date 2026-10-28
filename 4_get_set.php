<?php
declare(strict_types=1);

class MahasiswaDinamis {
    private array $atributTambahan = [];

    public function __construct(public string $nim, public string $nama) {}

    public function __set(string $key, mixed $value): void {
        $diizinkan = ['hobi', 'asalSekolah', 'agama'];
        if (!in_array($key, $diizinkan, true)) {
            throw new InvalidArgumentException('Atribut tidak diizinkan: ' . $key);
        }
        $this->atributTambahan[$key] = $value;
    }

    public function __get(string $key): mixed {
        if (!array_key_exists($key, $this->atributTambahan)) {
            throw new OutOfBoundsException('Atribut tidak ditemukan: ' . $key);
        }
        return $this->atributTambahan[$key];
    }

    public function __isset(string $key): bool {
        return isset($this->atributTambahan[$key]);
    }

    public function __unset(string $key): void {
        unset($this->atributTambahan[$key]);
    }
}

function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

$mhs = new MahasiswaDinamis('231001', 'Alya');

$mhs->hobi = 'Membaca';                                   // memicu __set()
echo '1. hobi = ' . e($mhs->hobi) . "<br>";               // memicu __get()
echo '2. isset(hobi)? ' . (isset($mhs->hobi) ? 'ya' : 'tidak') . "<br>"; // __isset()

unset($mhs->hobi);                                        // memicu __unset()
echo '3. Setelah unset, isset(hobi)? ' . (isset($mhs->hobi) ? 'ya' : 'tidak') . "<br>";

try {
    echo $mhs->hobi;                                      // sudah dihapus
} catch (OutOfBoundsException $ex) {
    echo '4. ' . get_class($ex) . ': ' . e($ex->getMessage()) . "<br>";
}

try {
    $mhs->password = 'rahasia';                           // tidak ada di daftar izin
} catch (InvalidArgumentException $ex) {
    echo '5. ' . get_class($ex) . ': ' . e($ex->getMessage()) . "<br>";
}
