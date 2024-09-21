<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1 0 auto; /* Ensures content grows and pushes footer down */
        }
        footer {
            flex-shrink: 0;
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }
        .table-hover tbody tr:hover {
            background-color: #f2f2f2;
        }
        .btn-danger {
            transition: background-color 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #ff6666;
        }
    </style>
  </head>
  <header>
    <?php include 'layout/header.php';?>
  </header>
  <body>
    <div class="content">
      <div class="container mt-5">
        <h1 class="text-center mb-4">Riwayat Pesanan</h1>

        <!-- Tabel Riwayat Pesanan -->
        <table class="table table-hover table-bordered">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>NIK</th>
              <th>Tipe Kamar</th>
              <th>Durasi Menginap</th>
              <th>Tanggal Pesanan</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'koneksi.php'; // Koneksi ke database

            // Query untuk menampilkan data dari tabel 'riwayat_pesanan'
            $sql = "SELECT * FROM pesanan";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $no = 1;
              // Loop untuk menampilkan setiap data di tabel
              while ($row = $result->fetch_assoc()) {
                echo '
                <tr>
                  <td>' . $no++ . '</td>
                  <td>' . $row['nama'] . '</td>
                  <td>' . $row['jenis_kelamin'] . '</td>
                  <td>' . $row['NIK'] . '</td>
                  <td>' . $row['tipe'] . '</td>
                  <td>' . $row['durasi_menginap'] . ' malam</td>
                  <td>' . $row['tanggal_pesanan'] . '</td>
                  <td>Rp. ' . number_format($row['harga'], 0, ',', '.') . '</td>
                  <td>
                    <form action="hapus_pesanan.php" method="POST">
                      <input type="hidden" name="id" value="' . $row['id'] . '">
                      <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                  </td>
                </tr>';
              }
            } else {
              echo '<tr><td colspan="9" class="text-center">Tidak ada riwayat pesanan.</td></tr>';
            }

            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Footer selalu berada di bawah -->
    <footer>
      <?php include 'layout/footer.php';?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
