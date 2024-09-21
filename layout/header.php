<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Kustomisasi untuk navbar */
        .navbar-brand {
            transition: color 0.3s, background-color 0.3s;
            padding: 10px 15px; /* Menambah padding untuk area klik */
        }

        .navbar-brand:hover {
            background-color: grey; /* Ubah warna latar belakang saat di-hover */
        }

        .navbar {
            padding: 10px; /* Menambah padding di navbar */
        }
    </style>
</head>
<body>
    <!-- Header yang berisi Navigation Bar -->
    <header>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid d-flex justify-content-center">
                <a class="navbar-brand text-white" href="index.php">Tentang Kami</a>
                <a class="navbar-brand text-white" href="riwayat.php">Riwayat Pesanan</a>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
