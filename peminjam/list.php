<?php
require_once '../config/functions.php';
$peminjams = getAllBorrowers();

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

    <title>Data Peminjam - Perpustakaan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../config/style.css">
</head>

<body>

<div class="container">

    <div class="library-card">

        <div class="page-header">

            <div>
                <h2>📖 Data Peminjam</h2>
                <p class="text-muted mb-0">
                    Kelola data peminjaman buku
                </p>
            </div>

            <div class="action-buttons">

                <a href="add.php" class="btn btn-primary">
                    + Tambah Peminjam
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
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Buku</th>
                        <th>Anggota</th>
                        <th>Petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach ($peminjams as $peminjam) : ?>

                    <tr>

                        <td>
                            <?php echo $peminjam['id_peminjam']; ?>
                        </td>

                        <td>
                            <?php echo $peminjam['tanggal_pinjam']; ?>
                        </td>

                        <td>
                            <?php echo $peminjam['tanggal_kembali']; ?>
                        </td>

                        <td>
                            <?php
                            $book = getBookById($peminjam['id_buku']);

                            echo $book
                                ? htmlspecialchars($book['judul_buku'])
                                : 'Buku tidak ditemukan';
                            ?>
                        </td>

                        <td>
                            <?php
                            $member = getAnggotaById($peminjam['id_anggota']);

                            echo $member
                                ? htmlspecialchars($member['nama_anggota'])
                                : 'Anggota tidak ditemukan';
                            ?>
                        </td>

                        <td>
                            <?php
                            $staff = getStaffById($peminjam['id_petugas']);

                            echo $staff
                                ? htmlspecialchars($staff['nama_petugas'])
                                : 'Petugas tidak ditemukan';
                            ?>
                        </td>

                        <td>

                            <div class="action-buttons">

                                <a href="edit.php?id=<?php echo $peminjam['id_peminjam']; ?>"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="delete.php?id=<?php echo $peminjam['id_peminjam']; ?>"
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