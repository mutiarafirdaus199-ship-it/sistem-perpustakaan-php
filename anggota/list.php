<?php
require_once '../config/functions.php';

$anggota = getAllAnggota();

if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']);
} elseif (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Anggota - Sistem Informasi Perpustakaan</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>

        /* =========================
           DASAR
        ========================= */

        body {
            margin: 0;
            min-height: 100vh;

            font-family: "Segoe UI", Arial, sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #fff5f8 0%,
                    #ffe6ef 50%,
                    #fff8fa 100%
                );

            color: #4a2634;
        }


        /* =========================
           CONTAINER
        ========================= */

        .page-container {
            max-width: 1100px;

            margin: auto;

            padding: 40px 25px;
        }


        /* =========================
           HEADER
        ========================= */

        .page-header {

            background:
                linear-gradient(
                    135deg,
                    #e75480,
                    #f78fb3
                );

            color: white;

            padding: 30px 35px;

            border-radius: 25px;

            box-shadow:
                0 15px 35px rgba(231, 84, 128, 0.20);

            margin-bottom: 30px;
        }


        .header-content {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;
        }


        .header-left {

            display: flex;

            align-items: center;

            gap: 20px;
        }


        .header-icon {

            width: 65px;
            height: 65px;

            background:
                rgba(255, 255, 255, 0.20);

            border-radius: 18px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 30px;
        }


        .page-header h1 {

            font-size: 28px;

            font-weight: 700;

            margin: 0 0 5px 0;
        }


        .page-header p {

            margin: 0;

            font-size: 14px;

            opacity: 0.9;
        }


        /* =========================
           TOMBOL KEMBALI
        ========================= */

        .btn-back {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            color: white;

            text-decoration: none;

            background:
                rgba(255, 255, 255, 0.18);

            border:
                1px solid rgba(255, 255, 255, 0.30);

            padding: 10px 16px;

            border-radius: 12px;

            font-size: 14px;

            transition: 0.3s;
        }


        .btn-back:hover {

            background:
                rgba(255, 255, 255, 0.30);

            color: white;

            transform: translateX(-3px);
        }


        /* =========================
           ALERT
        ========================= */

        .custom-alert {

            border: none;

            border-radius: 15px;

            padding: 15px 20px;

            margin-bottom: 25px;

            box-shadow:
                0 5px 15px rgba(0, 0, 0, 0.05);
        }


        /* =========================
           CONTENT CARD
        ========================= */

        .content-card {

            background:
                rgba(255, 255, 255, 0.90);

            border:
                1px solid #f8d4df;

            border-radius: 22px;

            padding: 28px;

            box-shadow:
                0 8px 25px rgba(164, 75, 104, 0.08);
        }


        /* =========================
           CARD HEADER
        ========================= */

        .content-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;

            gap: 15px;
        }


        .content-title {

            display: flex;

            align-items: center;

            gap: 12px;
        }


        .title-icon {

            width: 45px;

            height: 45px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #ffe1eb;

            color: #d94f7a;

            border-radius: 13px;

            font-size: 21px;
        }


        .content-title h2 {

            margin: 0;

            font-size: 21px;

            font-weight: 700;

            color: #542c3a;
        }


        .content-title p {

            margin: 3px 0 0;

            color: #987783;

            font-size: 13px;
        }


        /* =========================
           TOMBOL TAMBAH
        ========================= */

        .btn-add {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            text-decoration: none;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #e75480,
                    #ed7095
                );

            padding: 11px 17px;

            border-radius: 12px;

            font-size: 14px;

            font-weight: 600;

            border: none;

            box-shadow:
                0 5px 12px rgba(231, 84, 128, 0.20);

            transition: 0.3s;
        }


        .btn-add:hover {

            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 8px 18px rgba(231, 84, 128, 0.30);
        }


        /* =========================
           TABLE
        ========================= */

        .table-container {

            overflow-x: auto;

            border-radius: 15px;

            border: 1px solid #f7dce5;
        }


        .custom-table {

            margin: 0;

            min-width: 700px;
        }


        .custom-table thead th {

            background:
                #ffe6ef;

            color: #633344;

            font-size: 13px;

            font-weight: 700;

            padding: 15px;

            border: none;

            white-space: nowrap;
        }


        .custom-table tbody td {

            padding: 15px;

            vertical-align: middle;

            font-size: 14px;

            color: #654653;

            border-color: #f7e4ea;
        }


        .custom-table tbody tr {

            transition: 0.2s;
        }


        .custom-table tbody tr:hover {

            background:
                #fff5f8;
        }


        /* =========================
           ID ANGGOTA
        ========================= */

        .id-badge {

            display: inline-block;

            background: #ffe1eb;

            color: #c7436d;

            padding: 5px 10px;

            border-radius: 8px;

            font-size: 12px;

            font-weight: 600;
        }


        /* =========================
           NAMA
        ========================= */

        .member-name {

            font-weight: 600;

            color: #542c3a;
        }


        /* =========================
           TOMBOL AKSI
        ========================= */

        .action-buttons {

            display: flex;

            gap: 7px;

            white-space: nowrap;
        }


        .btn-edit {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            text-decoration: none;

            background: #fff0c7;

            color: #9b7016;

            border: 1px solid #f5dda0;

            padding: 7px 11px;

            border-radius: 9px;

            font-size: 12px;

            font-weight: 600;

            transition: 0.2s;
        }


        .btn-edit:hover {

            background: #ffe6a7;

            color: #805d0e;
        }


        .btn-delete {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            text-decoration: none;

            background: #ffe1e5;

            color: #c7435c;

            border: 1px solid #f6c7cf;

            padding: 7px 11px;

            border-radius: 9px;

            font-size: 12px;

            font-weight: 600;

            transition: 0.2s;
        }


        .btn-delete:hover {

            background: #ffd1d9;

            color: #a83249;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {

            text-align: center;

            margin-top: 30px;

            color: #a47d89;

            font-size: 13px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .page-container {

                padding: 25px 15px;
            }


            .page-header {

                padding: 25px 20px;
            }


            .header-content {

                flex-direction: column;

                align-items: flex-start;
            }


            .content-header {

                flex-direction: column;

                align-items: flex-start;
            }


            .btn-add {

                width: 100%;

                justify-content: center;
            }


            .content-card {

                padding: 20px 15px;
            }

        }

    </style>

</head>


<body>


<div class="page-container">


    <!-- =========================
         HEADER
    ========================== -->

    <div class="page-header">

        <div class="header-content">

            <div class="header-left">

                <div class="header-icon">

                    <i class="bi bi-people-fill"></i>

                </div>


                <div>

                    <h1>Data Anggota</h1>

                    <p>
                        Kelola data anggota perpustakaan
                    </p>

                </div>

            </div>


            <a href="../" class="btn-back">

                <i class="bi bi-arrow-left"></i>

                Kembali

            </a>

        </div>

    </div>


    <!-- =========================
         PESAN BERHASIL / ERROR
    ========================== -->

    <?php if (isset($_SESSION['success_message'])) : ?>

        <div class="alert alert-success custom-alert">

            <i class="bi bi-check-circle-fill"></i>

            <?php echo $_SESSION['success_message']; ?>

        </div>

        <?php unset($_SESSION['success_message']); ?>

    <?php elseif (isset($_SESSION['error_message'])) : ?>

        <div class="alert alert-danger custom-alert">

            <i class="bi bi-exclamation-circle-fill"></i>

            <?php echo $_SESSION['error_message']; ?>

        </div>

        <?php unset($_SESSION['error_message']); ?>

    <?php endif; ?>


    <!-- =========================
         CONTENT
    ========================== -->

    <div class="content-card">


        <!-- HEADER CONTENT -->

        <div class="content-header">


            <div class="content-title">

                <div class="title-icon">

                    <i class="bi bi-person-lines-fill"></i>

                </div>


                <div>

                    <h2>Daftar Anggota</h2>

                    <p>
                        Informasi anggota yang terdaftar
                    </p>

                </div>

            </div>


            <a href="add.php" class="btn-add">

                <i class="bi bi-plus-lg"></i>

                Tambah Anggota

            </a>


        </div>


        <!-- =========================
             TABLE
        ========================== -->

        <div class="table-container">

            <table class="table custom-table">

                <thead>

                    <tr>

                        <th>ID Anggota</th>

                        <th>Nama Anggota</th>

                        <th>Jurusan</th>

                        <th>No. Telepon</th>

                        <th>Aksi</th>

                    </tr>

                </thead>


                <tbody>

                    <?php foreach ($anggota as $a) : ?>

                        <tr>


                            <td>

                                <span class="id-badge">

                                    <?php echo $a['id_anggota']; ?>

                                </span>

                            </td>


                            <td>

                                <span class="member-name">

                                    <?php echo $a['nama_anggota']; ?>

                                </span>

                            </td>


                            <td>

                                <?php echo $a['jurusan_anggota']; ?>

                            </td>


                            <td>

                                <?php echo $a['notelp_anggota']; ?>

                            </td>


                            <td>

                                <div class="action-buttons">


                                    <a
                                        href="edit.php?id=<?php echo $a['id_anggota']; ?>"
                                        class="btn-edit">

                                        <i class="bi bi-pencil-fill"></i>

                                        Edit

                                    </a>


                                    <a
                                        href="delete.php?id=<?php echo $a['id_anggota']; ?>"
                                        class="btn-delete">

                                        <i class="bi bi-trash3-fill"></i>

                                        Delete

                                    </a>


                                </div>

                            </td>


                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>


    </div>


    <!-- FOOTER -->

    <div class="footer">

        <p>
            © Created by Mutiara Firdaus
        </p>

    </div>


</div>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>
