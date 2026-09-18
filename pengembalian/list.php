<?php
require_once '../config/functions.php';
$pengembalians = getAllReturns();

if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']);
} elseif (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pengembalian - Perpustakaan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../config/style.css">
</head>

<body>

<div class="container">

    <div class="library-card">

        <div class="page-header">

            <div>
                <h2>↩️ Data Pengembalian</h2>
                <p class="text-muted mb-0">
                    Kelola data pengembalian buku
                </p>
            </div>

            <div class="action-buttons">

                <a href="add.php" class="btn btn-primary">
                    + Tambah Pengembalian
                </a>

                <a href="../" class="btn btn-secondary">
                    ← Kembali
                </a>

            </div>

        </div>

        <div class="table-wrapper">

            <table class="table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Denda</th>
                        <th>Buku</th>
                        <th>Anggota</th>
                        <th>Petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach ($pengembalians as $pengembalian) : ?>

                    <tr>

                        <td><?php echo $pengembalian['id_pengembalian']; ?></td>

                        <td><?php echo $pengembalian['tanggal_pengembalian']; ?></td>

                        <td>
                            Rp <?php echo number_format($pengembalian['denda'], 0, ',', '.'); ?>
                        </td>

                        <td><?php echo htmlspecialchars($pengembalian['judul_buku']); ?></td>

                        <td><?php echo htmlspecialchars($pengembalian['nama_anggota']); ?></td>

                        <td><?php echo htmlspecialchars($pengembalian['nama_petugas']); ?></td>

                        <td>

                            <div class="action-buttons">

                                <a href="edit.php?id=<?php echo $pengembalian['id_pengembalian']; ?>"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="delete.php?id=<?php echo $pengembalian['id_pengembalian']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    Hapus
                                </a>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>