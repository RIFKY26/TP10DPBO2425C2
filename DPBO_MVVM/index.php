<?php
// 1. Load semua ViewModel yang sudah dibuat
require_once 'viewmodels/BukuViewModel.php';
require_once 'viewmodels/AnggotaViewModel.php';
require_once 'viewmodels/PetugasViewModel.php';
require_once 'viewmodels/PeminjamanViewModel.php';

// 2. Ambil parameter entity dan action dari URL
// Contoh: index.php?entity=buku&action=add
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'buku'; // Default buka halaman buku
$action = isset($_GET['action']) ? $_GET['action'] : 'list'; // Default tampilkan list

// 3. Routing Logika
if ($entity === 'buku') {
    $bukuVM = new BukuViewModel();

    switch ($action) {
        case 'list':
            $bukuList = $bukuVM->getBukuList();
            require_once 'views/buku_list.php';
            break;
        case 'add':
            require_once 'views/buku_form.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            $buku = $bukuVM->getBukuById($id);
            require_once 'views/buku_form.php';
            break;
        case 'save':
            $judul = $_POST['judul_buku'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun = $_POST['tahun_terbit'];
            $bukuVM->addBuku($judul, $penulis, $penerbit, $tahun);
            header('Location: index.php?entity=buku&action=list');
            break;
        case 'update':
            $id = $_GET['id'];
            $judul = $_POST['judul_buku'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun = $_POST['tahun_terbit'];
            $bukuVM->updateBuku($id, $judul, $penulis, $penerbit, $tahun);
            header('Location: index.php?entity=buku&action=list');
            break;
        case 'delete':
            $id = $_GET['id'];
            $bukuVM->deleteBuku($id);
            header('Location: index.php?entity=buku&action=list');
            break;
        default:
            echo "Invalid action for Buku.";
            break;
    }

} elseif ($entity === 'anggota') {
    $anggotaVM = new AnggotaViewModel();

    switch ($action) {
        case 'list':
            $anggotaList = $anggotaVM->getAnggotaList();
            require_once 'views/anggota_list.php';
            break;
        case 'add':
            require_once 'views/anggota_form.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            $anggota = $anggotaVM->getAnggotaById($id);
            require_once 'views/anggota_form.php';
            break;
        case 'save':
            $nama = $_POST['nama_anggota'];
            $telp = $_POST['nomor_telepon'];
            $alamat = $_POST['alamat'];
            $anggotaVM->addAnggota($nama, $telp, $alamat);
            header('Location: index.php?entity=anggota&action=list');
            break;
        case 'update':
            $id = $_GET['id'];
            $nama = $_POST['nama_anggota'];
            $telp = $_POST['nomor_telepon'];
            $alamat = $_POST['alamat'];
            $anggotaVM->updateAnggota($id, $nama, $telp, $alamat);
            header('Location: index.php?entity=anggota&action=list');
            break;
        case 'delete':
            $id = $_GET['id'];
            $anggotaVM->deleteAnggota($id);
            header('Location: index.php?entity=anggota&action=list');
            break;
        default:
            echo "Invalid action for Anggota.";
            break;
    }

} elseif ($entity === 'petugas') {
    $petugasVM = new PetugasViewModel();

    switch ($action) {
        case 'list':
            $petugasList = $petugasVM->getPetugasList();
            require_once 'views/petugas_list.php';
            break;
        case 'add':
            require_once 'views/petugas_form.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            $petugas = $petugasVM->getPetugasById($id);
            require_once 'views/petugas_form.php';
            break;
        case 'save':
            $nama = $_POST['nama_petugas'];
            $jabatan = $_POST['jabatan'];
            $petugasVM->addPetugas($nama, $jabatan);
            header('Location: index.php?entity=petugas&action=list');
            break;
        case 'update':
            $id = $_GET['id'];
            $nama = $_POST['nama_petugas'];
            $jabatan = $_POST['jabatan'];
            $petugasVM->updatePetugas($id, $nama, $jabatan);
            header('Location: index.php?entity=petugas&action=list');
            break;
        case 'delete':
            $id = $_GET['id'];
            $petugasVM->deletePetugas($id);
            header('Location: index.php?entity=petugas&action=list');
            break;
        default:
            echo "Invalid action for Petugas.";
            break;
    }

} elseif ($entity === 'peminjaman') {
    $peminjamanVM = new PeminjamanViewModel();

    switch ($action) {
        case 'list':
            $peminjamanList = $peminjamanVM->getPeminjamanList();
            require_once 'views/peminjaman_list.php';
            break;
        
        // PENTING: Saat Add/Edit Peminjaman, kita butuh data Buku, Anggota, & Petugas
        // untuk mengisi Dropdown <select>
        case 'add':
            $bukuList = $peminjamanVM->getBukuList();
            $anggotaList = $peminjamanVM->getAnggotaList();
            $petugasList = $peminjamanVM->getPetugasList();
            require_once 'views/peminjaman_form.php';
            break;
        
        case 'edit':
            $id = $_GET['id'];
            $peminjaman = $peminjamanVM->getPeminjamanById($id); // Data yang mau diedit
            
            // Data untuk Dropdown
            $bukuList = $peminjamanVM->getBukuList();
            $anggotaList = $peminjamanVM->getAnggotaList();
            $petugasList = $peminjamanVM->getPetugasList();
            
            require_once 'views/peminjaman_form.php';
            break;

        case 'save':
            $id_buku = $_POST['id_buku'];
            $id_anggota = $_POST['id_anggota'];
            $id_petugas = $_POST['id_petugas'];
            $tanggal = $_POST['tanggal_pinjam'];
            $peminjamanVM->addPeminjaman($id_buku, $id_anggota, $id_petugas, $tanggal);
            header('Location: index.php?entity=peminjaman&action=list');
            break;
        
        case 'update':
            $id = $_GET['id'];
            $id_buku = $_POST['id_buku'];
            $id_anggota = $_POST['id_anggota'];
            $id_petugas = $_POST['id_petugas'];
            $tanggal = $_POST['tanggal_pinjam'];
            $peminjamanVM->updatePeminjaman($id, $id_buku, $id_anggota, $id_petugas, $tanggal);
            header('Location: index.php?entity=peminjaman&action=list');
            break;
        
        case 'delete':
            $id = $_GET['id'];
            $peminjamanVM->deletePeminjaman($id);
            header('Location: index.php?entity=peminjaman&action=list');
            break;
        
        default:
            echo "Invalid action for Peminjaman.";
            break;
    }

} else {
    echo "Entity tidak ditemukan / Halaman tidak ada.";
}
?>