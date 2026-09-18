<?php
require_once '../config/functions.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_petugas = $_POST['nama_petugas'];
    $jabatan_petugas = $_POST['jabatan_petugas'];
    $notelp_petugas = $_POST['notelp_petugas'];

    if (addStaff($nama_petugas, $jabatan_petugas, $notelp_petugas)) {
        $_SESSION['success_message'] = "Data petugas berhasil ditambahkan.";
        header('Location: list.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Gagal menambahkan data petugas.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Petugas - Perpustakaan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../config/style.css">
</head>

<body>

<div class="container">

    <div class="form-card">

        <div class="text-center mb-4">
            <div class="page-icon">👩🏻‍💼</div>
            <h2>Tambah Petugas</h2>
            <p class="text-muted">
                Tambahkan data petugas perpustakaan
            </p>
        </div>

        <form method="POST">

            <div class="form-group">
                <label>Nama Petugas</label>

                <input type="text"
                       class="form-control"
                       name="nama_petugas"
                       placeholder="Masukkan nama petugas"
                       required>
            </div>

            <div class="form-group">
                <label>Jabatan Petugas</label>

                <input type="text"
                       class="form-control"
                       name="jabatan_petugas"
                       placeholder="Masukkan jabatan"
                       required>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>

                <input type="text"
                       class="form-control"
                       name="notelp_petugas"
                       placeholder="Masukkan nomor telepon"
                       required>
            </div>

            <div class="bottom-actions">

                <button type="submit" class="btn btn-primary">
                    + Tambah Petugas
                </button>

                <a href="list.php" class="btn btn-secondary">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>