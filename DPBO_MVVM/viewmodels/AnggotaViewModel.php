<?php
require_once 'models/Anggota.php';

class AnggotaViewModel
{
    private $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new Anggota();
    }

    public function getAnggotaList()
    {
        return $this->anggotaModel->getAll();
    }

    public function getAnggotaById($id)
    {
        return $this->anggotaModel->getById($id);
    }

    public function addAnggota($nama_anggota, $nomor_telepon, $alamat)
    {
        return $this->anggotaModel->create($nama_anggota, $nomor_telepon, $alamat);
    }

    public function updateAnggota($id, $nama_anggota, $nomor_telepon, $alamat)
    {
        return $this->anggotaModel->update($id, $nama_anggota, $nomor_telepon, $alamat);
    }

    public function deleteAnggota($id)
    {
        return $this->anggotaModel->delete($id);
    }
}