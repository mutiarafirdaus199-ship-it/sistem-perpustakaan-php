<?php require_once '../config/functions.php'; if ($_SERVER['REQUEST_METHOD'] == 'POST') { $tanggal_pinjam = $_POST['tanggal_pinjam']; $tanggal_kembali = $_POST['tanggal_kembali']; $id_buku = $_POST['id_buku']; $id_anggota = $_POST['id_anggota']; $id_petugas = $_POST['id_petugas']; if (addBorrower($tanggal_pinjam, $tanggal_kembali, $id_buku, $id_anggota, $id_petugas)) { $_SESSION['success_message'] = "Data peminjam berhasil ditambahkan."; header('Location: list.php'); exit(); } else { $_SESSION['error_message'] = "Gagal menambahkan data peminjam."; } } $books = getAllBooks(); $members = getAllAnggota(); $staffs = getAllStaffs(); ?><!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjam - Perpustakaan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../config/style.css">
</head>

<body>

    <div class="container">

        <div class="form-card">

            <div class="text-center mb-4">
                <div class="page-icon">📚</div>
                <h2>Tambah Peminjam</h2>
                <p class="text-muted">
                    Tambahkan data peminjaman buku baru
                </p>
            </div>

            <form method="POST">

                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="date"
                           class="form-control"
                           name="tanggal_pinjam"
                           required>
                </div>

                <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="date"
                           class="form-control"
                           name="tanggal_kembali"
                           required>
                </div>

                <div class="form-group">
                    <label>Buku</label>
                    <select class="form-control"
                            name="id_buku"
                            required>

                        <option value="">-- Pilih Buku --</option>

                        <?php foreach ($books as $book) : ?>
                            <option value="<?php echo $book['id_buku']; ?>">
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

                        <option value="">-- Pilih Anggota --</option>

                        <?php foreach ($members as $member) : ?>
                            <option value="<?php echo $member['id_anggota']; ?>">
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

                        <option value="">-- Pilih Petugas --</option>

                        <?php foreach ($staffs as $staff) : ?>
                            <option value="<?php echo $staff['id_petugas']; ?>">
                                <?php echo htmlspecialchars($staff['nama_petugas']); ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="bottom-actions">
                    <button type="submit" class="btn btn-primary">
                        + Tambah Peminjam
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