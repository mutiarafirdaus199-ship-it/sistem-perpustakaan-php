<?php
require_once '../config/functions.php';
$id = $_GET['id'] ?? null;
$staff = getStaffById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_petugas = $_POST['nama_petugas'];
    $jabatan_petugas = $_POST['jabatan_petugas'];
    $notelp_petugas = $_POST['notelp_petugas'];

    if (updateStaff($id, $nama_petugas, $jabatan_petugas, $notelp_petugas)) {
        $_SESSION['success_message'] = "Data petugas berhasil diperbarui.";
        header('Location: list.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Gagal memperbarui data petugas.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Petugas - Perpustakaan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../config/style.css">
</head>

<body>

<div class="container">

    <div class="form-card">

        <div class="text-center mb-4">
            <div class="page-icon">✏️</div>
            <h2>Edit Petugas</h2>
            <p class="text-muted">
                Perbarui data petugas perpustakaan
            </p>
        </div>

        <form method="POST">

            <div class="form-group">
                <label>Nama Petugas</label>

                <input type="text"
                       class="form-control"
                       name="nama_petugas"
                       value="<?php echo htmlspecialchars($staff['nama_petugas']); ?>"
                       required>
            </div>

            <div class="form-group">
                <label>Jabatan Petugas</label>

                <input type="text"
                       class="form-control"
                       name="jabatan_petugas"
                       value="<?php echo htmlspecialchars($staff['jabatan_petugas']); ?>"
                       required>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>

                <input type="text"
                       class="form-control"
                       name="notelp_petugas"
                       value="<?php echo htmlspecialchars($staff['notelp_petugas']); ?>"
                       required>
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