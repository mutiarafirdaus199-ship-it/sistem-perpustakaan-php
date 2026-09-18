<?php
require_once '../config/functions.php';
$id = $_GET['id'] ?? null;
$rak = getRakById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_rak = $_POST['nama_rak'];
    $lokasi_rak = $_POST['lokasi_rak'];
    $id_buku = $_POST['id_buku'];

    if (updateRak($id, $nama_rak, $lokasi_rak, $id_buku)) {
        $_SESSION['success_message'] = "Data rak berhasil diperbarui.";
        header('Location: list.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Gagal memperbarui data rak.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Rak - Perpustakaan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../config/style.css">
</head>

<body>

<div class="container">

    <div class="form-card">

        <div class="text-center mb-4">
            <div class="page-icon">✏️</div>
            <h2>Edit Rak</h2>
            <p class="text-muted">
                Perbarui informasi rak perpustakaan
            </p>
        </div>

        <form method="POST">

            <div class="form-group">
                <label>Nama Rak</label>

                <input type="text"
                       class="form-control"
                       name="nama_rak"
                       value="<?php echo htmlspecialchars($rak['nama_rak']); ?>"
                       required>
            </div>

            <div class="form-group">
                <label>Lokasi Rak</label>

                <input type="text"
                       class="form-control"
                       name="lokasi_rak"
                       value="<?php echo htmlspecialchars($rak['lokasi_rak']); ?>"
                       required>
            </div>

            <div class="form-group">
                <label>ID Buku</label>

                <input type="number"
                       class="form-control"
                       name="id_buku"
                       value="<?php echo $rak['id_buku']; ?>"
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