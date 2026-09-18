<?php require_once '../config/functions.php'; $id = $_GET['id']; $peminjam = getBorrowerById($id); if (!$peminjam) { $_SESSION['error_message'] = "Peminjam tidak ditemukan."; header('Location: list.php'); exit(); } if ($_SERVER['REQUEST_METHOD'] == 'POST') { $tanggal_pinjam = $_POST['tanggal_pinjam']; $tanggal_kembali = $_POST['tanggal_kembali']; $id_buku = $_POST['id_buku']; $id_anggota = $_POST['id_anggota']; $id_petugas = $_POST['id_petugas']; if (updateBorrower($id, $tanggal_pinjam, $tanggal_kembali, $id_buku, $id_anggota, $id_petugas)) { $_SESSION['success_message'] = "Data peminjam berhasil diperbarui."; header('Location: list.php'); exit(); } else { $_SESSION['error_message'] = "Gagal memperbarui data peminjam."; } } $books = getAllBooks(); $members = getAllAnggota(); $staffs = getAllStaffs(); ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjam - Perpustakaan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../config/style.css">
</head>

<body>

<div class="container">

    <div class="form-card">

        <div class="text-center mb-4">
            <div class="page-icon">✏️</div>
            <h2>Edit Peminjam</h2>
            <p class="text-muted">
                Perbarui informasi peminjaman buku
            </p>
        </div>

        <form method="POST">

            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="date"
                       class="form-control"
                       name="tanggal_pinjam"
                       value="<?php echo $peminjam['tanggal_pinjam']; ?>"
                       required>
            </div>

            <div class="form-group">
                <label>Tanggal Kembali</label>
                <input type="date"
                       class="form-control"
                       name="tanggal_kembali"
                       value="<?php echo $peminjam['tanggal_kembali']; ?>"
                       required>
            </div>

            <div class="form-group">
                <label>Buku</label>
                <select class="form-control"
                        name="id_buku"
                        required>

                    <?php foreach ($books as $book) : ?>

                        <option value="<?php echo $book['id_buku']; ?>"
                            <?php if ($book['id_buku'] == $peminjam['id_buku']) echo 'selected'; ?>>

                            <?php echo htmlspecialchars($book['judul_buku']); ?>

                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label>Anggota</label>
                <select class="form-control"
                        name="id_anggota"
                        required>

                    <?php foreach ($members as $member) : ?>

                        <option value="<?php echo $member['id_anggota']; ?>"
                            <?php if ($member['id_anggota'] == $peminjam['id_anggota']) echo 'selected'; ?>>

                            <?php echo htmlspecialchars($member['nama_anggota']); ?>

                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label>Petugas</label>
                <select class="form-control"
                        name="id_petugas"
                        required>

                    <?php foreach ($staffs as $staff) : ?>

                        <option value="<?php echo $staff['id_petugas']; ?>"
                            <?php if ($staff['id_petugas'] == $peminjam['id_petugas']) echo 'selected'; ?>>

                            <?php echo htmlspecialchars($staff['nama_petugas']); ?>

                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="bottom-actions">

                <button type="submit" class="btn btn-primary">
                    ✓ Simpan Perubahan
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