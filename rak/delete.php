<?php
require_once '../config/functions.php';
$id = $_GET['id'] ?? null;

if (deleteRak($id)) {
    $_SESSION['success_message'] = "Data rak berhasil dihapus.";
} else {
    $_SESSION['error_message'] = "Gagal menghapus data rak.";
}

header('Location: list.php');
exit();
?>
