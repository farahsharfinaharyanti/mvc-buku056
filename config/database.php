<?php

class Database
{
    private $host = 'localhost';
    private $db_name = 'db_buku';
    private $username = 'root';
    private $password = '';

    public function getConnection()
    {
        try {
            $conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $conn;
        } catch (PDOException $e) {
            exit('Koneksi database gagal. Periksa konfigurasi database.');
        }
    }
}