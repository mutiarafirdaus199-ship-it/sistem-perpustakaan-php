<?php
require_once '../config/functions.php';

$id = $_GET['id'];

if (deleteBook($id)) {
    $_SESSION['success_message'] = "Data buku berhasil dihapus.";
} else {
    $_SESSION['error_message'] = "Gagal menghapus data buku.";
}

header('Location: list.php');
exit();
?>
