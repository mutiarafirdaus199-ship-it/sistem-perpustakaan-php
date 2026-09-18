<?php
session_start();
require_once 'koneksi.php';

function setNotification($type, $message) {
    if (!isset($_SESSION['notifications'])) {
        $_SESSION['notifications'] = [];
    }
    $_SESSION['notifications'][] = ['type' => $type, 'message' => $message];
}

// Fungsi untuk anggota
function getAllAnggota() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM anggota');
    return $stmt->fetchAll();
}

function getAnggotaById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM anggota WHERE id_anggota = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

function addAnggota($nama, $jurusan, $notelp) {
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO anggota (nama_anggota, jurusan_anggota, notelp_anggota) VALUES (:nama, :jurusan, :notelp)');
    $success = $stmt->execute([
        'nama' => $nama,
        'jurusan' => $jurusan,
        'notelp' => $notelp
    ]);
    if ($success) {
        setNotification('success', 'Anggota berhasil ditambahkan.');
    } else {
        setNotification('error', 'Gagal menambahkan anggota.');
    }
    
    return $success;
}

function updateAnggota($id, $nama, $jurusan, $notelp) {
    global $pdo;
    $stmt = $pdo->prepare('UPDATE anggota SET nama_anggota = :nama, jurusan_anggota = :jurusan, notelp_anggota = :notelp WHERE id_anggota = :id');
    $success = $stmt->execute([
        'id' => $id,
        'nama' => $nama,
        'jurusan' => $jurusan,
        'notelp' => $notelp
    ]);
    if ($success) {
        setNotification('success', 'Anggota berhasil diupdate.');
    } else {
        setNotification('error', 'Gagal mengupdate anggota.');
    }
    
    return $success;
}

function deleteAnggota($id) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM anggota WHERE id_anggota = :id');
    $success = $stmt->execute(['id' => $id]);
    if ($success) {
        setNotification('success', 'Anggota berhasil dihapus.');
    } else {
        setNotification('error', 'Gagal menghapus anggota.');
    }
    
    return $success;
}

// Fungsi untuk buku
function getAllBooks() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM buku');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBookById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM buku WHERE id_buku = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addBook($judul, $penulis, $penerbit, $tahun, $stok) {
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO buku (judul_buku, penulis_buku, penerbit_buku, tahun_penerbit, stok) VALUES (?, ?, ?, ?, ?)');
    $success = $stmt->execute([$judul, $penulis, $penerbit, $tahun, $stok]);
    if ($success) {
        setNotification('success', 'Buku berhasil ditambahkan.');
    } else {
        setNotification('error', 'Gagal menambahkan buku.');
    }
    return $success;
}

function updateBook($id, $judul, $penulis, $penerbit, $tahun, $stok) {
    global $pdo;
    $stmt = $pdo->prepare('UPDATE buku SET judul_buku = ?, penulis_buku = ?, penerbit_buku = ?, tahun_penerbit = ?, stok = ? WHERE id_buku = ?');
    $success = $stmt->execute([$judul, $penulis, $penerbit, $tahun, $stok, $id]);
    if ($success) {
        setNotification('success', 'Buku berhasil diupdate.');
    } else {
        setNotification('error', 'Gagal mengupdate buku.');
    }
    return $success;
}

function deleteBook($id) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM buku WHERE id_buku = ?');
    $success = $stmt->execute([$id]);
    if ($success) {
        setNotification('success', 'Buku berhasil dihapus.');
    } else {
        setNotification('error', 'Gagal menghapus buku.');
    }
    return $success;
}

// Fungsi untuk peminjam
function getAllBorrowers() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM peminjam');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBorrowerById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM peminjam WHERE id_peminjam = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addBorrower($tanggal_pinjam, $tanggal_kembali, $id_buku, $id_anggota, $id_petugas) {
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO peminjam (tanggal_pinjam, tanggal_kembali, id_buku, id_anggota, id_petugas) VALUES (?, ?, ?, ?, ?)');
    $success = $stmt->execute([$tanggal_pinjam, $tanggal_kembali, $id_buku, $id_anggota, $id_petugas]);
    if ($success) {
        setNotification('success', 'Peminjam berhasil ditambahkan.');
    } else {
        setNotification('error', 'Gagal menambahkan peminjam.');
    }
    return $success;
}

function updateBorrower($id, $tanggal_pinjam, $tanggal_kembali, $id_buku, $id_anggota, $id_petugas) {
    global $pdo;
    $stmt = $pdo->prepare('UPDATE peminjam SET tanggal_pinjam = ?, tanggal_kembali = ?, id_buku = ?, id_anggota = ?, id_petugas = ? WHERE id_peminjam = ?');
    $success = $stmt->execute([$tanggal_pinjam, $tanggal_kembali, $id_buku, $id_anggota, $id_petugas, $id]);
    if ($success) {
        setNotification('success', 'Peminjam berhasil diupdate.');
    } else {
        setNotification('error', 'Gagal mengupdate peminjam.');
    }
    return $success;
}

function deleteBorrower($id) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM peminjam WHERE id_peminjam = ?');
    $success = $stmt->execute([$id]);
    if ($success) {
        setNotification('success', 'Peminjam berhasil dihapus.');
    } else {
        setNotification('error', 'Gagal menghapus peminjam.');
    }
    return $success;
}

// Fungsi untuk pengembalian
function addReturn($tanggal_pengembalian, $denda, $id_buku, $id_anggota, $id_petugas) {
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO pengembalian (tanggal_pengembalian, denda, id_buku, id_anggota, id_petugas) VALUES (:tanggal_pengembalian, :denda, :id_buku, :id_anggota, :id_petugas)');
    $success = $stmt->execute([
        'tanggal_pengembalian' => $tanggal_pengembalian,
        'denda' => $denda,
        'id_buku' => $id_buku,
        'id_anggota' => $id_anggota,
        'id_petugas' => $id_petugas,
    ]);
    if ($success) {
        setNotification('success', 'Pengembalian berhasil ditambahkan.');
    } else {
        setNotification('error', 'Gagal menambahkan pengembalian.');
    }
    return $success;
}

function getAllReturns() {
    global $pdo;
    $stmt = $pdo->query('SELECT pengembalian.*, buku.judul_buku, anggota.nama_anggota, petugas.nama_petugas FROM pengembalian JOIN buku ON pengembalian.id_buku = buku.id_buku JOIN anggota ON pengembalian.id_anggota = anggota.id_anggota JOIN petugas ON pengembalian.id_petugas = petugas.id_petugas');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getReturnById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT pengembalian.*, buku.judul_buku, anggota.nama_anggota, petugas.nama_petugas FROM pengembalian JOIN buku ON pengembalian.id_buku = buku.id_buku JOIN anggota ON pengembalian.id_anggota = anggota.id_anggota JOIN petugas ON pengembalian.id_petugas = petugas.id_petugas WHERE id_pengembalian = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateReturn($id, $tanggal_pengembalian, $denda, $id_buku, $id_anggota, $id_petugas) {
    global $pdo;
    $stmt = $pdo->prepare('UPDATE pengembalian SET tanggal_pengembalian = :tanggal_pengembalian, denda = :denda, id_buku = :id_buku, id_anggota = :id_anggota, id_petugas = :id_petugas WHERE id_pengembalian = :id');
    $success = $stmt->execute([
        'id' => $id,
        'tanggal_pengembalian' => $tanggal_pengembalian,
        'denda' => $denda,
        'id_buku' => $id_buku,
        'id_anggota' => $id_anggota,
        'id_petugas' => $id_petugas,
    ]);
    if ($success) {
        setNotification('success', 'Pengembalian berhasil diupdate.');
    } else {
        setNotification('error', 'Gagal mengupdate pengembalian.');
    }
    return $success;
}

function deleteReturn($id) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM pengembalian WHERE id_pengembalian = :id');
    $success = $stmt->execute(['id' => $id]);
    if ($success) {
        setNotification('success', 'Pengembalian berhasil dihapus.');
    } else {
        setNotification('error', 'Gagal menghapus pengembalian.');
    }
    return $success;
}

// Fungsi untuk petugas
function addStaff($nama_petugas, $jabatan_petugas, $notelp_petugas) {
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO petugas (nama_petugas, jabatan_petugas, notelp_petugas) VALUES (:nama_petugas, :jabatan_petugas, :notelp_petugas)');
    $success = $stmt->execute([
        'nama_petugas' => $nama_petugas,
        'jabatan_petugas' => $jabatan_petugas,
        'notelp_petugas' => $notelp_petugas,
    ]);
    if ($success) {
        setNotification('success', 'Petugas berhasil ditambahkan.');
    } else {
        setNotification('error', 'Gagal menambahkan petugas.');
    }
    return $success;
}

function getAllStaffs() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM petugas');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getStaffById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM petugas WHERE id_petugas = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateStaff($id, $nama_petugas, $jabatan_petugas, $notelp_petugas) {
    global $pdo;
    $stmt = $pdo->prepare('UPDATE petugas SET nama_petugas = :nama_petugas, jabatan_petugas = :jabatan_petugas, notelp_petugas = :notelp_petugas WHERE id_petugas = :id');
    $success = $stmt->execute([
        'id' => $id,
        'nama_petugas' => $nama_petugas,
        'jabatan_petugas' => $jabatan_petugas,
        'notelp_petugas' => $notelp_petugas,
    ]);
    if ($success) {
        setNotification('success', 'Petugas berhasil diupdate.');
    } else {
        setNotification('error', 'Gagal mengupdate petugas.');
    }
    return $success;
}

function deleteStaff($id) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM petugas WHERE id_petugas = :id');
    $success = $stmt->execute(['id' => $id]);
    if ($success) {
        setNotification('success', 'Petugas berhasil dihapus.');
    } else {
        setNotification('error', 'Gagal menghapus petugas.');
    }
    return $success;
}

// Fungsi untuk rak 
function addRak($nama_rak, $lokasi_rak, $id_buku) {
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO rak (nama_rak, lokasi_rak, id_buku) VALUES (:nama_rak, :lokasi_rak, :id_buku)');
    $success = $stmt->execute([
        'nama_rak' => $nama_rak,
        'lokasi_rak' => $lokasi_rak,
        'id_buku' => $id_buku,
    ]);
    if ($success) {
        setNotification('success', 'Rak berhasil ditambahkan.');
    } else {
        setNotification('error', 'Gagal menambahkan rak.');
    }
    return $success;
}

function getAllRaks() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM rak');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getRakById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM rak WHERE id_rak = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateRak($id, $nama_rak, $lokasi_rak, $id_buku) {
    global $pdo;
    $stmt = $pdo->prepare('UPDATE rak SET nama_rak = :nama_rak, lokasi_rak = :lokasi_rak, id_buku = :id_buku WHERE id_rak = :id');
    $success = $stmt->execute([
        'id' => $id,
        'nama_rak' => $nama_rak,
        'lokasi_rak' => $lokasi_rak,
        'id_buku' => $id_buku,
    ]);
    if ($success) {
        setNotification('success', 'Rak berhasil diupdate.');
    } else {
        setNotification('error', 'Gagal mengupdate rak.');
    }
    return $success;
}

function deleteRak($id) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM rak WHERE id_rak = :id');
    $success = $stmt->execute(['id' => $id]);
    if ($success) {
        setNotification('success', 'Rak berhasil dihapus.');
    } else {
        setNotification('error', 'Gagal menghapus rak.');
    }
    return $success;
}

?>
