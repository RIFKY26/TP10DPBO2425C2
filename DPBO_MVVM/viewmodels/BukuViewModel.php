<?php
require_once 'models/Buku.php';

class BukuViewModel
{
    private $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new Buku();
    }

    public function getBukuList()
    {
        return $this->bukuModel->getAll();
    }

    public function getBukuById($id)
    {
        return $this->bukuModel->getById($id);
    }

    public function addBuku($judul_buku, $penulis, $penerbit, $tahun_terbit)
    {
        return $this->bukuModel->create($judul_buku, $penulis, $penerbit, $tahun_terbit);
    }

    public function updateBuku($id, $judul_buku, $penulis, $penerbit, $tahun_terbit)
    {
        return $this->bukuModel->update($id, $judul_buku, $penulis, $penerbit, $tahun_terbit);
    }

    public function deleteBuku($id)
    {
        return $this->bukuModel->delete($id);
    }
}