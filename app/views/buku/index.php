<?php
function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            color: #333;
        }

        a, button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .tambah {
            background: #2563eb;
            color: white;
            display: inline-block;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #2563eb;
            color: white;
        }

        .edit {
            background: #facc15;
            color: black;
        }

        .hapus {
            background: #dc2626;
            color: white;
        }

        .pesan {
            padding: 10px;
            background: #dcfce7;
            margin-bottom: 15px;
        }

        .aksi {
            display: flex;
            gap: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Daftar Buku</h1>
    <p>Kelola data buku melalui aplikasi MVC PHP Native.</p>

    <?php if (isset($_GET['success'])): ?>
        <div class="pesan">
            <?php
            $pesan = [
                'create' => 'Data buku berhasil ditambahkan.',
                'update' => 'Data buku berhasil diperbarui.',
                'delete' => 'Data buku berhasil dihapus.'
            ];

            echo e($pesan[$_GET['success']] ?? 'Proses berhasil.');
            ?>
        </div>
    <?php endif; ?>

    <a href="?action=create" class="tambah">+ Tambah Buku</a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($dataBuku)): ?>
            <?php foreach ($dataBuku as $index => $buku): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= e($buku['judul']) ?></td>
                    <td><?= e($buku['penulis']) ?></td>
                    <td><?= e($buku['penerbit']) ?></td>
                    <td><?= e($buku['tahun_terbit']) ?></td>
                    <td>Rp<?= number_format((float) $buku['harga'], 0, ',', '.') ?></td>
                    <td>
                        <div class="aksi">
                            <a
                                href="?action=edit&id=<?= (int) $buku['id'] ?>"
                                class="edit"
                            >Edit</a>

                            <form
                                action="?action=delete"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                            >
                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= (int) $buku['id'] ?>"
                                >
                                <button type="submit" class="hapus">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Belum ada data buku.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>