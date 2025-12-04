<?php
require_once 'config/Database.php';

class Buku
{
    private $conn;
    private $table = 'buku';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // 1. READ (Ambil semua data buku)
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. READ (Ambil satu buku berdasarkan ID - untuk Edit)
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 3. CREATE (Tambah buku baru)
    public function create($judul_buku, $penulis, $penerbit, $tahun_terbit)
    {
        $query = "INSERT INTO " . $this->table . " (judul_buku, penulis, penerbit, tahun_terbit) VALUES (:judul_buku, :penulis, :penerbit, :tahun_terbit)";
        $stmt = $this->conn->prepare($query);

        // Bersihkan data (opsional, untuk keamanan)
        $judul_buku = htmlspecialchars(strip_tags($judul_buku));
        $penulis = htmlspecialchars(strip_tags($penulis));
        $penerbit = htmlspecialchars(strip_tags($penerbit));
        $tahun_terbit = htmlspecialchars(strip_tags($tahun_terbit));

        // Bind data
        $stmt->bindParam(':judul_buku', $judul_buku);
        $stmt->bindParam(':penulis', $penulis);
        $stmt->bindParam(':penerbit', $penerbit);
        $stmt->bindParam(':tahun_terbit', $tahun_terbit);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // 4. UPDATE (Edit data buku)
    public function update($id, $judul_buku, $penulis, $penerbit, $tahun_terbit)
    {
        $query = "UPDATE " . $this->table . " SET judul_buku = :judul_buku, penulis = :penulis, penerbit = :penerbit, tahun_terbit = :tahun_terbit WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':judul_buku', $judul_buku);
        $stmt->bindParam(':penulis', $penulis);
        $stmt->bindParam(':penerbit', $penerbit);
        $stmt->bindParam(':tahun_terbit', $tahun_terbit);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // 5. DELETE (Hapus buku)
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