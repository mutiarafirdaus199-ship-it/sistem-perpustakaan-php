<?php
require_once '../config/functions.php';

$id = $_GET['id'];
$anggota = getAnggotaById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_anggota'];
    $jurusan = $_POST['jurusan_anggota'];
    $notelp = $_POST['notelp_anggota'];

    if (updateAnggota($id, $nama, $jurusan, $notelp)) {
        $_SESSION['success_message'] = "Anggota berhasil diupdate.";
        header('Location: list.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Gagal mengupdate anggota.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Anggota - Sistem Informasi Perpustakaan</title>

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

            max-width: 850px;

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
           KEMBALI
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
           FORM CARD
        ========================= */

        .form-card {

            background:
                rgba(255, 255, 255, 0.90);

            border:
                1px solid #f8d4df;

            border-radius: 22px;

            padding: 35px;

            box-shadow:
                0 8px 25px rgba(164, 75, 104, 0.08);
        }


        /* =========================
           FORM TITLE
        ========================= */

        .form-title {

            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 30px;
        }


        .title-icon {

            width: 48px;

            height: 48px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #ffe1eb;

            color: #d94f7a;

            border-radius: 14px;

            font-size: 22px;
        }


        .form-title h2 {

            margin: 0;

            font-size: 21px;

            font-weight: 700;

            color: #542c3a;
        }


        .form-title p {

            margin: 3px 0 0;

            color: #987783;

            font-size: 13px;
        }


        /* =========================
           FORM GROUP
        ========================= */

        .form-group-custom {

            margin-bottom: 22px;
        }


        .form-group-custom label {

            display: block;

            font-size: 14px;

            font-weight: 600;

            color: #633344;

            margin-bottom: 8px;
        }


        .form-group-custom label i {

            color: #d94f7a;

            margin-right: 5px;
        }


        /* =========================
           INPUT
        ========================= */

        .form-control-custom {

            width: 100%;

            box-sizing: border-box;

            border:
                1px solid #ecced9;

            background: #fffafd;

            color: #542c3a;

            padding: 12px 15px;

            border-radius: 12px;

            font-size: 14px;

            outline: none;

            transition: 0.3s;
        }


        .form-control-custom:focus {

            border-color: #e75480;

            background: white;

            box-shadow:
                0 0 0 4px rgba(231, 84, 128, 0.10);
        }


        /* =========================
           BUTTON AREA
        ========================= */

        .button-area {

            display: flex;

            gap: 10px;

            margin-top: 30px;

            padding-top: 25px;

            border-top:
                1px solid #f5dce4;
        }


        /* =========================
           SIMPAN
        ========================= */

        .btn-save {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            border: none;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #e75480,
                    #ed7095
                );

            padding: 11px 20px;

            border-radius: 12px;

            font-size: 14px;

            font-weight: 600;

            box-shadow:
                0 5px 12px rgba(231, 84, 128, 0.20);

            transition: 0.3s;
        }


        .btn-save:hover {

            transform: translateY(-2px);

            color: white;

            box-shadow:
                0 8px 18px rgba(231, 84, 128, 0.30);
        }


        /* =========================
           BATAL
        ========================= */

        .btn-cancel {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            color: #8b6875;

            background: #f8eef2;

            border:
                1px solid #ecd9e0;

            padding: 11px 20px;

            border-radius: 12px;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            transition: 0.3s;
        }


        .btn-cancel:hover {

            background: #f2e2e8;

            color: #684c58;
        }


        /* =========================
           ERROR
        ========================= */

        .custom-alert {

            border: none;

            border-radius: 15px;

            padding: 15px 20px;

            margin-bottom: 25px;
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


            .form-card {

                padding: 25px 20px;
            }


            .button-area {

                flex-direction: column;
            }


            .btn-save,
            .btn-cancel {

                width: 100%;
            }

        }

    </style>

</head>


<body>


<div class="page-container">


    <!-- HEADER -->

    <div class="page-header">

        <div class="header-content">


            <div class="header-left">

                <div class="header-icon">

                    <i class="bi bi-pencil-square"></i>

                </div>


                <div>

                    <h1>Edit Anggota</h1>

                    <p>
                        Mengubah informasi data anggota
                    </p>

                </div>

            </div>


            <a href="list.php" class="btn-back">

                <i class="bi bi-arrow-left"></i>

                Kembali

            </a>


        </div>

    </div>


    <!-- ERROR MESSAGE -->

    <?php if (isset($_SESSION['error_message'])) : ?>

        <div class="alert alert-danger custom-alert">

            <i class="bi bi-exclamation-circle-fill"></i>

            <?php echo $_SESSION['error_message']; ?>

        </div>

        <?php unset($_SESSION['error_message']); ?>

    <?php endif; ?>


    <!-- FORM CARD -->

    <div class="form-card">


        <div class="form-title">

            <div class="title-icon">

                <i class="bi bi-pencil-square"></i>

            </div>


            <div>

                <h2>Form Edit Anggota</h2>

                <p>
                    Perbarui informasi anggota yang diperlukan
                </p>

            </div>

        </div>


        <form method="post">


            <!-- NAMA -->

            <div class="form-group-custom">

                <label>

                    <i class="bi bi-person-fill"></i>

                    Nama Anggota

                </label>


                <input
                    type="text"
                    name="nama_anggota"
                    class="form-control-custom"
                    value="<?php echo $anggota['nama_anggota']; ?>"
                    required>

            </div>


            <!-- JURUSAN -->

            <div class="form-group-custom">

                <label>

                    <i class="bi bi-mortarboard-fill"></i>

                    Jurusan

                </label>


                <input
                    type="text"
                    name="jurusan_anggota"
                    class="form-control-custom"
                    value="<?php echo $anggota['jurusan_anggota']; ?>"
                    required>

            </div>


            <!-- TELEPON -->

            <div class="form-group-custom">

                <label>

                    <i class="bi bi-telephone-fill"></i>

                    No. Telepon

                </label>


                <input
                    type="text"
                    name="notelp_anggota"
                    class="form-control-custom"
                    value="<?php echo $anggota['notelp_anggota']; ?>"
                    required>

            </div>


            <!-- BUTTON -->

            <div class="button-area">


                <button
                    type="submit"
                    class="btn-save">

                    <i class="bi bi-check-lg"></i>

                    Simpan Perubahan

                </button>


                <a
                    href="list.php"
                    class="btn-cancel">

                    <i class="bi bi-x-lg"></i>

                    Batal

                </a>


            </div>


        </form>


    </div>


    <!-- FOOTER -->

    <div class="footer">

        <p>
            © 2026 Sistem Informasi Perpustakaan
        </p>

    </div>


</div>


</body>

</html>