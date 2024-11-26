<?php
// Class Pegawai
class Pegawai {
    public $no;
    public $nama;
    public $unitPendidikan;
    public $tanggalGaji;
    public $jabatan;
    public $lamaKerja;
    public $statusKerja;
    public $gaji;
    public $bonus;
    public $bpjs;
    public $pinjaman;
    public $cicilan;
    public $infaq;

    public function __construct($no, $nama, $unitPendidikan, $tanggalGaji, $jabatan, $lamaKerja, $statusKerja, $bpjs, $pinjaman, $cicilan, $infaq) {
        $this->no = $no;
        $this->nama = $nama;
        $this->unitPendidikan = $unitPendidikan;
        $this->tanggalGaji = $tanggalGaji;
        $this->jabatan = $jabatan;
        $this->lamaKerja = $lamaKerja;
        $this->statusKerja = $statusKerja;
        $this->bpjs = $bpjs;
        $this->pinjaman = $pinjaman;
        $this->cicilan = $cicilan;
        $this->infaq = $infaq;
        $this->setGajiBonus();
    }

    private function setGajiBonus() {
        switch ($this->jabatan) {
            case 'Kepala Sekolah':
                $this->gaji = 10000000;
                break;
            case 'Wakasek':
                $this->gaji = 7000000;
                break;
            case 'Guru':
                $this->gaji = 5000000;
                break;
            case 'Karyawan':
                $this->gaji = 2500000;
                break;
        }
        $this->bonus = ($this->statusKerja == 'Tetap') ? 1000000 : 0;
    }

    public function hitungGajiBersih() {
        return ($this->gaji + $this->bonus) - ($this->bpjs + $this->pinjaman + $this->cicilan + $this->infaq);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penggajian Karyawan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
</head>
<body class="body">
    <div class="contain">
        <div class="text-center">
            <img src="download (1).png" class="rounded" alt="">
        </div>
        <div>
            <h3 class="text-center mb-4"><b>PENGGAJIHAN <br> GURU/KARYAWAN YAYASAN ASSALAM</b></h3>
        </div>

    <form action="" method="post" class="mt-4">
        <div class="card">
            <div class="card-header">Data Penggajihan</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="no" class="form-label">No</label>
                    <input type="text" class="form-control" id="no" name="no" placeholder="No" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required>
                </div>
                <div class="mb-3">
                    <label for="unit" class="form-label">Unit Pendidikan</label>
                    <select class="form-select" id="unit" name="unit" required>
                        <option value="" disabled selected>Pilih Unit Pendidikan</option>
                        <option value="TK">TK</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="MTS">MTS</option>
                        <option value="MA">MA</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal Gaji</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="row">
                    <!-- Kolom Gaji -->
                    <div class="col-md-6">
                        <div class="col-title">Gaji</div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select class="form-select" id="jabatan" name="jabatan" required>
                                <option value="" disabled selected>Pilih Jabatan</option>
                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                <option value="Wakasek">Wakasek</option>
                                <option value="Guru">Guru</option>
                                <option value="Karyawan">Karyawan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lama_kerja" class="form-label">Lama Kerja (Tahun)</label>
                            <input type="text" class="form-control" id="lama_kerja" name="lama_kerja" placeholder="lama kerja">
                        </div>
                        <div class="mb-3">
                        <label for="status" class="form-label">Status Kerja</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="" disabled selected>Pilih Status Kerja</option>
                            <option value="Tetap">Tetap</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-title">Potongan</div>
                        <div class="mb-3">
                            <label for="" class="form-label">BPJS</label>
                            <input type="text" class="form-control" id="bpjs" name="bpjs" placeholder="Masukkan potongan BPJS" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Pinjaman</label>
                            <input type="text" class="form-control" id="pinjaman" name="pinjaman" placeholder="Masukkan pinjaman" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Cicilan</label>
                            <input type="text" class="form-control" id="cicilan" name="cicilan" placeholder="Masukkan cicilan" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Infaq</label>
                            <input type="text" class="form-control" id="infaq" name="infaq" placeholder="lainnya" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-primary btn-center" name="submit">Proses</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Output Struk -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pegawai = new Pegawai(
            $_POST['no'],
            $_POST['name'],
            $_POST['unit'],
            $_POST['date'],
            $_POST['jabatan'],
            $_POST['lama_kerja'],
            $_POST['status'],
            $_POST['bpjs'],
            $_POST['pinjaman'],
            $_POST['cicilan'],
            $_POST['infaq']
        );

        $gajiBersih = $pegawai->hitungGajiBersih();
        echo "
        <div class='row mt-5'>
            <div class='col-md-8 mx-auto'>
                <div class='card'>
                    <div class='card-header text-center'>
                        <h5>STRUK GAJI</h5>
                    </div>
                    <div class='card-body'>
                        <p>No: {$pegawai->no}</p>
                        <p>Nama: {$pegawai->nama}</p>
                        <p>Unit Pendidikan: {$pegawai->unitPendidikan}</p>
                        <p>Tanggal Gaji: {$pegawai->tanggalGaji}</p>
                        <p>Jabatan: {$pegawai->jabatan}</p>
                        <p>Gaji: Rp. " . number_format($pegawai->gaji, 0, ',', '.') . "</p>
                        <p>Bonus: Rp. " . number_format($pegawai->bonus, 0, ',', '.') . "</p>
                        <p>BPJS: Rp. " . number_format($pegawai->bpjs, 0, ',', '.') . "</p>
                        <p>Pinjaman: Rp. " . number_format($pegawai->pinjaman, 0, ',', '.') . "</p>
                        <p>Cicilan: Rp. " . number_format($pegawai->cicilan, 0, ',', '.') . "</p>
                        <p>Infaq: Rp." . number_format($pegawai->infaq, 0, ',', '.') . "</p>
                        <p><strong>Gaji Bersih: Rp." . number_format($gajiBersih, 0, ',', '.') . "</strong></p>
                        </div>
                        </div>
                        </div>
                        </div>
                        ";
    }
    ?>
    </div>
</body>
</html>