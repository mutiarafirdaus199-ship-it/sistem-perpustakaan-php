<?php
require_once '../config/functions.php';
$id = $_GET['id'] ?? null;

if (deleteReturn($id)) {
    $_SESSION['success_message'] = "Data pengembalian berhasil dihapus.";
} else {
    $_SESSION['error_message'] = "Gagal menghapus data pengembalian.";
}

header('Location: list.php');
exit();
?>
