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
    <title>Edit Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button, a {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #2563eb;
            color: white;
        }

        a {
            background: #e5e7eb;
            color: black;
        }

        .error {
            color: #b91c1c;
            background: #fee2e2;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Buku</h1>

    <?php if (isset($_GET['error'])): ?>
        <p class="error">
            Semua kolom harus diisi. Tahun harus valid dan harga tidak boleh negatif.
        </p>
    <?php endif; ?>

    <form action="?action=update" method="POST">
        <input
            type="hidden"
            name="id"
            value="<?= (int) $buku['id'] ?>"
        >

        <label for="judul">Judul Buku</label>
        <input
            type="text"
            id="judul"
            name="judul"
            maxlength="150"
            value="<?= e($buku['judul']) ?>"
            required
        >

        <label for="penulis">Penulis</label>
        <input
            type="text"
            id="penulis"
            name="penulis"
            maxlength="100"
            value="<?= e($buku['penulis']) ?>"
            required
        >

        <label for="penerbit">Penerbit</label>
        <input
            type="text"
            id="penerbit"
            name="penerbit"
            maxlength="100"
            value="<?= e($buku['penerbit']) ?>"
            required
        >

        <label for="tahun_terbit">Tahun Terbit</label>
        <input
            type="number"
            id="tahun_terbit"
            name="tahun_terbit"
            min="1"
            max="<?= date('Y') ?>"
            value="<?= e($buku['tahun_terbit']) ?>"
            required
        >

        <label for="harga">Harga (Rp)</label>
        <input
            type="number"
            id="harga"
            name="harga"
            min="0"
            step="0.01"
            value="<?= e($buku['harga']) ?>"
            required
        >

        <button type="submit">Simpan Perubahan</button>
        <a href="index.php">Kembali</a>
    </form>
</div>
</body>
</html>