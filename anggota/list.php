<?php
require_once '../config/functions.php';

$anggota = getAllAnggota();

$success = $_SESSION['success_message'] ?? null;
$error = $_SESSION['error_message'] ?? null;

unset($_SESSION['success_message']);
unset($_SESSION['error_message']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Anggota</title>

    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="page-container">

    <!-- HEADER -->
    <div class="page-header">

        <div class="header-left">

            <div class="header-icon">
                👥
            </div>

            <div class="header-text">
                <h1>Data Anggota</h1>
                <p>Kelola data anggota perpustakaan</p>
            </div>

        </div>

        <a href="../" class="btn-back">
            ← Kembali
        </a>

    </div>


    <!-- CONTENT -->
    <div class="content-card">

        <?php if ($success): ?>

            <div class="alert-custom alert-success-custom">
                <?= htmlspecialchars($success); ?>
            </div>

        <?php endif; ?>


        <?php if ($error): ?>

            <div class="alert-custom alert-error-custom">
                <?= htmlspecialchars($error); ?>
            </div>

        <?php endif; ?>


        <div class="content-top">

            <div class="section-title">

                <div class="section-icon">
                    👥
                </div>

                <div>
                    <h2>Daftar Anggota</h2>
                    <p>Informasi anggota yang terdaftar</p>
                </div>

            </div>


            <a href="add.php" class="btn-primary-custom">
                ＋ Tambah Anggota
            </a>

        </div>


        <!-- TABLE -->
        <div class="table-wrapper">

            <table class="custom-table">

                <thead>
                    <tr>
                        <th>ID Anggota</th>
                        <th>Nama Anggota</th>
                        <th>Jurusan</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (empty($anggota)): ?>

                        <tr>
                            <td colspan="5" style="text-align:center;">
                                Belum ada data anggota.
                            </td>
                        </tr>

                    <?php else: ?>

                        <?php foreach ($anggota as $a): ?>

                            <tr>

                                <td>
                                    <span class="id-badge">
                                        <?= htmlspecialchars($a['id_anggota']); ?>
                                    </span>
                                </td>

                                <td>
                                    <?= htmlspecialchars($a['nama_anggota']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($a['jurusan_anggota']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($a['notelp_anggota']); ?>
                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a
                                            href="edit.php?id=<?= urlencode($a['id_anggota']); ?>"
                                            class="btn-edit">
                                            ✎ Edit
                                        </a>

                                        <a
                                            href="delete.php?id=<?= urlencode($a['id_anggota']); ?>"
                                            class="btn-delete"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            🗑 Delete
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>


    <div class="footer">
        © 2026 Sistem Informasi Perpustakaan
    </div>

</div>

</body>
</html>