<?php
require_once 'config/Database.php';

class Anggota
{
    private $conn;
    private $table = 'anggota';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_anggota, $nomor_telepon, $alamat)
    {
        $query = "INSERT INTO " . $this->table . " (nama_anggota, nomor_telepon, alamat) VALUES (:nama_anggota, :nomor_telepon, :alamat)";
        $stmt = $this->conn->prepare($query);

        // Sanitasi data
        $nama_anggota = htmlspecialchars(strip_tags($nama_anggota));
        $nomor_telepon = htmlspecialchars(strip_tags($nomor_telepon));
        $alamat = htmlspecialchars(strip_tags($alamat));

        // Bind parameter
        $stmt->bindParam(':nama_anggota', $nama_anggota);
        $stmt->bindParam(':nomor_telepon', $nomor_telepon);
        $stmt->bindParam(':alamat', $alamat);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update($id, $nama_anggota, $nomor_telepon, $alamat)
    {
        $query = "UPDATE " . $this->table . " SET nama_anggota = :nama_anggota, nomor_telepon = :nomor_telepon, alamat = :alamat WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitasi data
        $nama_anggota = htmlspecialchars(strip_tags($nama_anggota));
        $nomor_telepon = htmlspecialchars(strip_tags($nomor_telepon));
        $alamat = htmlspecialchars(strip_tags($alamat));
        $id = htmlspecialchars(strip_tags($id));

        // Bind parameter
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama_anggota', $nama_anggota);
        $stmt->bindParam(':nomor_telepon', $nomor_telepon);
        $stmt->bindParam(':alamat', $alamat);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

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