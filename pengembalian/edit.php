<?php
require_once '../config/functions.php';

// Ambil ID dari parameter GET atau null jika tidak ada
$id = $_GET['id'] ?? null;

// Ambil data pengembalian berdasarkan ID
$pengembalian = getReturnById($id);

// Proses form jika method POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $denda = $_POST['denda'];
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_POST['id_anggota'];
    $id_petugas = $_POST['id_petugas'];

    // Panggil fungsi updateReturn untuk memperbarui data pengembalian
    if (updateReturn($id, $tanggal_pengembalian, $denda, $id_buku, $id_anggota, $id_petugas)) {
        $_SESSION['success_message'] = "Data pengembalian berhasil diperbarui.";
        header('Location: list.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Gagal memperbarui data pengembalian.";
    }
}

// Ambil semua buku, anggota, dan staff untuk dropdown
$books = getAllBooks();
$members = getAllAnggota();
$staffs = getAllStaffs();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Pengembalian - Perpustakaan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../config/style.css">
</head>

<body>

<div class="container">

    <div class="form-card">

        <div class="text-center mb-4">
            <div class="page-icon">✏️</div>
            <h2>Edit Pengembalian</h2>
            <p class="text-muted">
                Perbarui data pengembalian buku
            </p>
        </div>

        <form method="POST">

            <div class="form-group">
                <label>Tanggal Pengembalian</label>

                <input type="date"
                       class="form-control"
                       name="tanggal_pengembalian"
                       value="<?php echo $pengembalian['tanggal_pengembalian']; ?>"
                       required>
            </div>

            <div class="form-group">
                <label>Denda</label>

                <input type="number"
                       class="form-control"
                       name="denda"
                       value="<?php echo $pengembalian['denda']; ?>"
                       required>
            </div>

            <div class="form-group">
                <label>Buku</label>

                <select class="form-control"
                        name="id_buku"
                        required>

                    <?php foreach ($books as $book) : ?>

                        <option value="<?php echo $book['id_buku']; ?>"
                            <?php echo ($book['id_buku'] == $pengembalian['id_buku']) ? 'selected' : ''; ?>>

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
                            <?php echo ($member['id_anggota'] == $pengembalian['id_anggota']) ? 'selected' : ''; ?>>

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
                            <?php echo ($staff['id_petugas'] == $pengembalian['id_petugas']) ? 'selected' : ''; ?>>

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