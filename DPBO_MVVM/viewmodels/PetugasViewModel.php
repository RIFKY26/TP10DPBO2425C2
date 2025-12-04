<?php
require_once 'models/Petugas.php';

class PetugasViewModel
{
    private $petugasModel;

    public function __construct()
    {
        $this->petugasModel = new Petugas();
    }

    public function getPetugasList()
    {
        return $this->petugasModel->getAll();
    }

    public function getPetugasById($id)
    {
        return $this->petugasModel->getById($id);
    }

    public function addPetugas($nama_petugas, $jabatan)
    {
        return $this->petugasModel->create($nama_petugas, $jabatan);
    }

    public function updatePetugas($id, $nama_petugas, $jabatan)
    {
        return $this->petugasModel->update($id, $nama_petugas, $jabatan);
    }

    public function deletePetugas($id)
    {
        return $this->petugasModel->delete($id);
    }
}