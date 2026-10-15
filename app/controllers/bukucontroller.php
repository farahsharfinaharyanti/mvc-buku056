<?php

require_once __DIR__ . '/../models/Buku.php';

class BukuController
{
    private $buku;

    public function __construct()
    {
        $this->buku = new Buku();
    }

    // Menampilkan seluruh data buku
    public function index()
    {
        $dataBuku = $this->buku->getAll();

        require __DIR__ . '/../views/buku/index.php';
    }

    // Menampilkan form tambah buku
    public function create()
    {
        require __DIR__ . '/../views/buku/create.php';
    }

    // Menyimpan buku baru
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php');
            exit;
        }

        $data = [
            'judul' => trim($_POST['judul'] ?? ''),
            'penulis' => trim($_POST['penulis'] ?? ''),
            'penerbit' => trim($_POST['penerbit'] ?? ''),
            'tahun_terbit' => trim($_POST['tahun_terbit'] ?? ''),
            'harga' => trim($_POST['harga'] ?? '')
        ];

        if (
            in_array('', $data, true) ||
            !ctype_digit($data['tahun_terbit']) ||
            (int) $data['tahun_terbit'] < 1 ||
            (int) $data['tahun_terbit'] > (int) date('Y') ||
            !is_numeric($data['harga']) ||
            (float) $data['harga'] < 0
        ) {
            header('Location: index.php?action=create&error=1');
            exit;
        }

        $this->buku->create($data);

        header('Location: index.php?success=create');
        exit;
    }

    // Menampilkan form edit buku
    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            header('Location: index.php');
            exit;
        }

        $buku = $this->buku->getById($id);

        if (!$buku) {
            header('Location: index.php');
            exit;
        }

        require __DIR__ . '/../views/buku/edit.php';
    }

    // Memperbarui data buku
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php');
            exit;
        }

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$id || $id < 1 || !$this->buku->getById($id)) {
            header('Location: index.php');
            exit;
        }

        $data = [
            'judul' => trim($_POST['judul'] ?? ''),
            'penulis' => trim($_POST['penulis'] ?? ''),
            'penerbit' => trim($_POST['penerbit'] ?? ''),
            'tahun_terbit' => trim($_POST['tahun_terbit'] ?? ''),
            'harga' => trim($_POST['harga'] ?? '')
        ];

        if (
            in_array('', $data, true) ||
            !ctype_digit($data['tahun_terbit']) ||
            (int) $data['tahun_terbit'] < 1 ||
            (int) $data['tahun_terbit'] > (int) date('Y') ||
            !is_numeric($data['harga']) ||
            (float) $data['harga'] < 0
        ) {
            header('Location: index.php?action=edit&id=' . $id . '&error=1');
            exit;
        }

        $this->buku->update($id, $data);

        header('Location: index.php?success=update');
        exit;
    }

    // Menghapus buku
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php');
            exit;
        }

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($id && $id > 0) {
            $this->buku->delete($id);
        }

        header('Location: index.php?success=delete');
        exit;
    }
}