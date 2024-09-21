<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        /* Atur lebar form maksimal menjadi 600px */
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        .form-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #007bff;
        }
        .form-label {
            font-weight: bold;
        }
        .form-check-label {
            margin-left: 10px;
        }
        .btn-primary, .btn-success {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-primary:hover, .btn-success:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h1 class="form-title">Form Pemesanan Hotel</h1>

            <?php
            // Koneksi ke database
            include 'koneksi.php';

            $errorMessage = '';
            $totalBayar = 0;

            // Inisialisasi variabel untuk value agar tidak undefined
            $nama = '';
            $jenis_kelamin = '';
            $nomor_identitas = '';
            $tipe_kamar = '';
            $tanggal_pesan = '';
            $durasi_menginap = '';
            $breakfast = false;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Ambil input form
                $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
                $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
                $nomor_identitas = isset($_POST['nomor_identitas']) ? $_POST['nomor_identitas'] : '';
                $tipe_kamar = isset($_POST['tipe_kamar']) ? $_POST['tipe_kamar'] : '';
                $tanggal_pesan = isset($_POST['tanggal_pesan']) ? $_POST['tanggal_pesan'] : '';
                $durasi_menginap = isset($_POST['durasi_menginap']) ? $_POST['durasi_menginap'] : '';
                $breakfast = isset($_POST['breakfast']) ? true : false;

                // Validasi input
                if (!is_numeric($nomor_identitas) || strlen($nomor_identitas) != 16) {
                    $errorMessage = "nomor identitas salah..data harus 16 digit";
                } elseif (!is_numeric($durasi_menginap)) {
                    $errorMessage = "Durasi Menginap harus diisi dengan angka";
                } else {
                    // Hitung harga kamar
                    $harga_per_malam = 0;
                    if ($tipe_kamar == "Standar") {
                        $harga_per_malam = 300000;
                    } elseif ($tipe_kamar == "Deluxe") {
                        $harga_per_malam = 500000;
                    } elseif ($tipe_kamar == "Family") {
                        $harga_per_malam = 700000;
                    }
                    
                    // Hitung total sebelum diskon
                    $totalBayar = $harga_per_malam * $durasi_menginap;

                    // Diskon 10% jika menginap lebih dari 3 malam
                    if ($durasi_menginap > 3) {
                        $totalBayar *= 0.9;
                    }

                    // Tambahan 80.000 jika termasuk sarapan
                    if ($breakfast) {
                        $totalBayar += 80000;
                    }
                }
            }

            // Simpan ke database hanya jika total bayar sudah dihitung
            if (isset($_POST['pesan'])) {
                $totalBayar = $harga_per_malam * $durasi_menginap;

                // Diskon 10% jika menginap lebih dari 3 malam
                if ($durasi_menginap > 3) {
                    $totalBayar *= 0.9;
                }

                // Tambahan 80.000 jika termasuk sarapan
                if ($breakfast) {
                    $totalBayar += 80000;
                }

                // Query untuk memasukkan data ke database
                $sql = "INSERT INTO pesanan (nama, jenis_kelamin, NIK, tipe, tanggal_pesanan, durasi_menginap, harga) 
                        VALUES ('$nama', '$jenis_kelamin', '$nomor_identitas', '$tipe_kamar', '$tanggal_pesan', '$durasi_menginap', '$totalBayar')";

                if ($conn->query($sql) === TRUE) {
                    // Jika berhasil, arahkan ke index.php
                    header("Location: index.php");
                    exit(); // Pastikan untuk menghentikan eksekusi script setelah redirect
                } else {
                    // Jika ada error saat menyimpan data
                    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                }
            }
            ?>

            <!-- Tampilkan pesan error jika ada -->
            <?php if ($errorMessage): ?>
                <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
            <?php endif; ?>

            <!-- Tampilkan form -->
            <form method="post" action="pesanan.php">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($nama) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label><br>
                    <input class="form-check-input" type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" <?= $jenis_kelamin == 'Laki-laki' ? 'checked' : '' ?> required>
                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                    <input class="form-check-input" type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" <?= $jenis_kelamin == 'Perempuan' ? 'checked' : '' ?> required>
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>

                <div class="mb-3">
                    <label for="nomor_identitas" class="form-label">Nomor Identitas / NIK</label>
                    <input type="text" class="form-control" id="nomor_identitas" name="nomor_identitas" value="<?= htmlspecialchars($nomor_identitas) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                    <select class="form-select" id="tipe_kamar" name="tipe_kamar" required>
                        <option value="Standar" <?= $tipe_kamar == "Standar" ? 'selected' : '' ?>>Standar</option>
                        <option value="Deluxe" <?= $tipe_kamar == "Deluxe" ? 'selected' : '' ?>>Deluxe</option>
                        <option value="Family" <?= $tipe_kamar == "Family" ? 'selected' : '' ?>>Family</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
                    <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan" value="<?= htmlspecialchars($tanggal_pesan) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="durasi_menginap" class="form-label">Durasi Menginap (Malam)</label>
                    <input type="text" class="form-control" id="durasi_menginap" name="durasi_menginap" value="<?= htmlspecialchars($durasi_menginap) ?>" required>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="breakfast" name="breakfast" <?= $breakfast ? 'checked' : '' ?>>
                    <label class="form-check-label" for="breakfast">
                        Termasuk Breakfast (Tambah Rp 80.000)
                    </label>
                </div>

                <div class="mb-3">
                    <label for="total_bayar" class="form-label">Total Bayar</label>
                    <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="<?= number_format($totalBayar, 0, ',', '.') ?>" disabled>
                </div>

                <!-- Tombol untuk menghitung dan memesan -->
                <button type="submit" class="btn btn-primary mb-3">Hitung Total Bayar</button>
                <button type="submit" class="btn btn-success" name="pesan">Pesan</button>
            </form>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
