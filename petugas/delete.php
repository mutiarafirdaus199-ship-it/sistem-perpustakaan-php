<?php
require_once '../config/functions.php';
$id = $_GET['id'] ?? null;

if (deleteStaff($id)) {
    $_SESSION['success_message'] = "Data petugas berhasil dihapus.";
} else {
    $_SESSION['error_message'] = "Gagal menghapus data petugas.";
}

header('Location: list.php');
exit();
?>
