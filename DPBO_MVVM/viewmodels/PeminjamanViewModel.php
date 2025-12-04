<?php
require_once 'models/Peminjaman.php';
require_once 'models/Buku.php';
require_once 'models/Anggota.php';
require_once 'models/Petugas.php';

class PeminjamanViewModel
{
    private $peminjamanModel;
    private $bukuModel;
    private $anggotaModel;
    private $petugasModel;

    public function __construct()
    {
        $this->peminjamanModel = new Peminjaman();
        $this->bukuModel = new Buku();
        $this->anggotaModel = new Anggota();
        $this->petugasModel = new Petugas();
    }

    public function getPeminjamanList()
    {
        return $this->peminjamanModel->getAll();
    }

    public function getPeminjamanById($id)
    {
        return $this->peminjamanModel->getById($id);
    }

    // --- Fungsi Tambahan untuk Dropdown ---
    public function getBukuList()
    {
        return $this->bukuModel->getAll();
    }

    public function getAnggotaList()
    {
        return $this->anggotaModel->getAll();
    }

    public function getPetugasList()
    {
        return $this->petugasModel->getAll();
    }
    // --------------------------------------

    public function addPeminjaman($id_buku, $id_anggota, $id_petugas, $tanggal_pinjam)
    {
        return $this->peminjamanModel->create($id_buku, $id_anggota, $id_petugas, $tanggal_pinjam);
    }

    public function updatePeminjaman($id, $id_buku, $id_anggota, $id_petugas, $tanggal_pinjam)
    {
        return $this->peminjamanModel->update($id, $id_buku, $id_anggota, $id_petugas, $tanggal_pinjam);
    }

    public function deletePeminjaman($id)
    {
        return $this->peminjamanModel->delete($id);
    }
}