<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Informasi Perpustakaan</title>

    <!-- Bootstrap CSS -->
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
           CONTAINER UTAMA
        ========================= */

        .dashboard {
            max-width: 1100px;
            margin: auto;
            padding: 50px 25px;
        }


        /* =========================
           HEADER
        ========================= */

        .header {
            background: linear-gradient(
                135deg,
                #e75480,
                #f78fb3
            );

            color: white;
            padding: 40px;
            border-radius: 25px;

            box-shadow:
                0 15px 35px rgba(231, 84, 128, 0.20);

            margin-bottom: 35px;
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .header-icon {
            width: 75px;
            height: 75px;

            background: rgba(255, 255, 255, 0.20);

            border-radius: 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 38px;
        }

        .header h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .header p {
            margin: 0;
            opacity: 0.9;
            font-size: 15px;
        }


        /* =========================
           JUDUL MENU
        ========================= */

        .menu-title {
            text-align: center;
            margin-bottom: 25px;
        }

        .menu-title h2 {
            font-size: 25px;
            font-weight: 700;
            color: #633344;
        }

        .menu-title p {
            color: #96707d;
            margin-top: 5px;
        }


        /* =========================
           CARD MENU
        ========================= */

        .menu-card {
            display: block;

            text-decoration: none;

            background: rgba(255, 255, 255, 0.85);

            border: 1px solid #f8d4df;

            border-radius: 20px;

            padding: 25px 20px;

            height: 100%;

            box-shadow:
                0 8px 20px rgba(164, 75, 104, 0.08);

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                background 0.3s ease;
        }

        .menu-card:hover {
            transform: translateY(-7px);

            background: #ffffff;

            box-shadow:
                0 15px 30px rgba(164, 75, 104, 0.15);
        }


        /* =========================
           ICON MENU
        ========================= */

        .menu-icon {
            width: 60px;
            height: 60px;

            border-radius: 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 18px;

            background: #ffe1eb;

            color: #d94f7a;

            font-size: 27px;
        }


        /* =========================
           TEXT MENU
        ========================= */

        .menu-card h3 {
            font-size: 18px;

            font-weight: 700;

            color: #542c3a;

            margin-bottom: 7px;
        }

        .menu-card p {
            font-size: 13px;

            color: #987783;

            margin: 0;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;

            margin-top: 40px;

            color: #a47d89;

            font-size: 13px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .dashboard {
                padding: 30px 18px;
            }

            .header {
                padding: 30px 25px;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
            }

            .header h1 {
                font-size: 25px;
            }

        }

    </style>
</head>


<body>

    <div class="dashboard">

        <!-- HEADER -->
        <div class="header">

            <div class="header-content">

                <div class="header-icon">
                    <i class="bi bi-book-half"></i>
                </div>

                <div>
                    <h1>Sistem Informasi Perpustakaan</h1>

                    <p>
                        Selamat datang di dashboard pengelolaan perpustakaan
                    </p>
                </div>

            </div>

        </div>


        <!-- JUDUL MENU -->

        <div class="menu-title">

            <h2>Menu Pengelolaan</h2>

            <p>
                Silakan pilih menu yang ingin dikelola
            </p>

        </div>


        <!-- MENU -->

        <div class="row g-4">


            <!-- ANGGOTA -->

            <div class="col-md-6 col-lg-4">

                <a href="anggota/list.php" class="menu-card">

                    <div class="menu-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h3>Anggota</h3>

                    <p>
                        Mengelola data anggota perpustakaan.
                    </p>

                </a>

            </div>


            <!-- PETUGAS -->

            <div class="col-md-6 col-lg-4">

                <a href="petugas/list.php" class="menu-card">

                    <div class="menu-icon">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>

                    <h3>Petugas</h3>

                    <p>
                        Mengelola data petugas perpustakaan.
                    </p>

                </a>

            </div>


            <!-- BUKU -->

            <div class="col-md-6 col-lg-4">

                <a href="buku/list.php" class="menu-card">

                    <div class="menu-icon">
                        <i class="bi bi-book-fill"></i>
                    </div>

                    <h3>Buku</h3>

                    <p>
                        Mengelola koleksi dan data buku.
                    </p>

                </a>

            </div>


            <!-- PEMINJAM -->

            <div class="col-md-6 col-lg-4">

                <a href="peminjam/list.php" class="menu-card">

                    <div class="menu-icon">
                        <i class="bi bi-journal-arrow-up"></i>
                    </div>

                    <h3>Peminjaman</h3>

                    <p>
                        Mengelola transaksi peminjaman buku.
                    </p>

                </a>

            </div>


            <!-- PENGEMBALIAN -->

            <div class="col-md-6 col-lg-4">

                <a href="pengembalian/list.php" class="menu-card">

                    <div class="menu-icon">
                        <i class="bi bi-journal-check"></i>
                    </div>

                    <h3>Pengembalian</h3>

                    <p>
                        Mengelola transaksi pengembalian buku.
                    </p>

                </a>

            </div>


            <!-- RAK -->

            <div class="col-md-6 col-lg-4">

                <a href="rak/list.php" class="menu-card">

                    <div class="menu-icon">
                        <i class="bi bi-bookshelf"></i>
                    </div>

                    <h3>Rak</h3>

                    <p>
                        Mengelola data dan lokasi rak buku.
                    </p>

                </a>

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