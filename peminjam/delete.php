<?php
require_once '../config/functions.php';
$id = $_GET['id'];

if (deleteBorrower($id)) {
    $_SESSION['success_message'] = "Data peminjam berhasil dihapus.";
} else {
    $_SESSION['error_message'] = "Gagal menghapus data peminjam.";
}

header('Location: list.php');
exit();
?>
