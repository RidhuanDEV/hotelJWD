<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .hotel-card {
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .hotel-card:hover {
                transform: scale(1.05);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
        </style>
    </head>
    <header>
        <?php include 'layout/header.php';?>
    </header>
    <body>
        <!-- daftar hotel -->
        <div class="col-sm-12">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <h1 class="text-center mt-5">Hotel Ridhuan Rangga Kusuma</h1>
                    </div>
                </div>
                <div class="row">
                    <?php
                    include 'koneksi.php';
                    $sql = "SELECT * FROM daftar_hotel";
                    $result = $conn->query($sql);

                    // Loop untuk menampilkan semua hotel
                    while ($row = $result->fetch_assoc()) {
                        $nama = $row['nama'];
                        $deskripsi = $row['deskripsi'];
                        $foto = $row['foto'];
                        $harga = $row['harga'];                

                        echo '
                            <div class="col-sm-12 col-md-4 mb-4">
                                <div class="card h-100 shadow-sm hotel-card">
                                    <img src="assets/' . $foto . '" class="img-fluid" style="object-fit: cover;height: 240px;" alt="' . $nama . '">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h5 class="card-title">' . $nama . '</h5>
                                        <p class="card-text">' . $deskripsi . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text"><strong>Rp. ' . number_format($harga, 0, ',', '.') . '</strong></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center">
                <a href="pesanan.php" class="btn btn-primary p-3">Pesan Hotel</a>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    <footer>
        <?php include 'layout/footer.php';?>
    </footer>   
</html>