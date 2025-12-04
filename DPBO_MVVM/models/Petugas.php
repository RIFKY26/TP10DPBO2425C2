<?php
require_once 'config/Database.php';

class Petugas
{
    private $conn;
    private $table = 'petugas';

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

    public function create($nama_petugas, $jabatan)
    {
        $query = "INSERT INTO " . $this->table . " (nama_petugas, jabatan) VALUES (:nama_petugas, :jabatan)";
        $stmt = $this->conn->prepare($query);

        // Sanitasi data
        $nama_petugas = htmlspecialchars(strip_tags($nama_petugas));
        $jabatan = htmlspecialchars(strip_tags($jabatan));

        // Bind parameter
        $stmt->bindParam(':nama_petugas', $nama_petugas);
        $stmt->bindParam(':jabatan', $jabatan);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update($id, $nama_petugas, $jabatan)
    {
        $query = "UPDATE " . $this->table . " SET nama_petugas = :nama_petugas, jabatan = :jabatan WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitasi data
        $nama_petugas = htmlspecialchars(strip_tags($nama_petugas));
        $jabatan = htmlspecialchars(strip_tags($jabatan));
        $id = htmlspecialchars(strip_tags($id));

        // Bind parameter
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama_petugas', $nama_petugas);
        $stmt->bindParam(':jabatan', $jabatan);

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