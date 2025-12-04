<?php
require_once 'config/Database.php';

class Peminjaman
{
    private $conn;
    private $table = 'peminjaman';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // 1. READ ALL (Dengan JOIN agar nama buku/anggota/petugas muncul)
    public function getAll()
    {
        // Query ini menggabungkan 4 tabel sekaligus
        $query = "SELECT p.id, p.tanggal_pinjam, 
                         b.judul_buku, 
                         a.nama_anggota, 
                         t.nama_petugas
                  FROM " . $this->table . " p
                  JOIN buku b ON p.id_buku = b.id
                  JOIN anggota a ON p.id_anggota = a.id
                  JOIN petugas t ON p.id_petugas = t.id
                  ORDER BY p.tanggal_pinjam DESC"; // Urutkan dari yang terbaru

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. READ ONE (Ambil data berdasarkan ID untuk keperluan Edit)
    public function getById($id)
    {
        // Untuk form edit, kita butuh ID raw-nya (misal: id_buku=5)
        // agar dropdown bisa otomatis terpilih
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 3. CREATE (Tambah Peminjaman Baru)
    public function create($id_buku, $id_anggota, $id_petugas, $tanggal_pinjam)
    {
        $query = "INSERT INTO " . $this->table . " 
                  (id_buku, id_anggota, id_petugas, tanggal_pinjam) 
                  VALUES (:id_buku, :id_anggota, :id_petugas, :tanggal_pinjam)";
        
        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':id_buku', $id_buku);
        $stmt->bindParam(':id_anggota', $id_anggota);
        $stmt->bindParam(':id_petugas', $id_petugas);
        $stmt->bindParam(':tanggal_pinjam', $tanggal_pinjam);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // 4. UPDATE (Edit Peminjaman)
    public function update($id, $id_buku, $id_anggota, $id_petugas, $tanggal_pinjam)
    {
        $query = "UPDATE " . $this->table . " 
                  SET id_buku = :id_buku, 
                      id_anggota = :id_anggota, 
                      id_petugas = :id_petugas, 
                      tanggal_pinjam = :tanggal_pinjam 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id_buku', $id_buku);
        $stmt->bindParam(':id_anggota', $id_anggota);
        $stmt->bindParam(':id_petugas', $id_petugas);
        $stmt->bindParam(':tanggal_pinjam', $tanggal_pinjam);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // 5. DELETE (Hapus Peminjaman)
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}