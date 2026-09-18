<?php
require_once '../config/functions.php';

$id = $_GET['id'];

if (deleteAnggota($id)) {
    $_SESSION['success_message'] = "Anggota berhasil dihapus.";
} else {
    $_SESSION['error_message'] = "Gagal menghapus anggota.";
}

header('Location: list.php');
exit();
?>
