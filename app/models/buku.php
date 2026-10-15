<?php

require_once __DIR__ . '/../../config/Database.php';

class Buku
{
    private $conn;
    private $table = 'buku';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Mengambil semua data buku
    public function getAll()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // Mengambil satu data buku berdasarkan ID
    public function getById($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    // Menambahkan data buku
    public function create($data)
    {
        $query = "INSERT INTO {$this->table}
                  (judul, penulis, penerbit, tahun_terbit, harga)
                  VALUES
                  (:judul, :penulis, :penerbit, :tahun_terbit, :harga)";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':judul' => $data['judul'],
            ':penulis' => $data['penulis'],
            ':penerbit' => $data['penerbit'],
            ':tahun_terbit' => $data['tahun_terbit'],
            ':harga' => $data['harga']
        ]);
    }

    // Mengubah data buku
    public function update($id, $data)
    {
        $query = "UPDATE {$this->table}
                  SET judul = :judul,
                      penulis = :penulis,
                      penerbit = :penerbit,
                      tahun_terbit = :tahun_terbit,
                      harga = :harga
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':judul' => $data['judul'],
            ':penulis' => $data['penulis'],
            ':penerbit' => $data['penerbit'],
            ':tahun_terbit' => $data['tahun_terbit'],
            ':harga' => $data['harga'],
            ':id' => $id
        ]);
    }

    // Menghapus data buku
    public function delete($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}