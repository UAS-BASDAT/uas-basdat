<?php 
  require 'functions.php';
  $product = get_product_detail($_GET['id']);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
    <title>Warunk Ilkomp</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand ms-5" href="#">Warunk Ilkomp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active mt-1 ms-2" aria-current="page" href="#product">Kategori</a>
                    </li>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Cari barang" aria-label="Search"
                            style="width: 800px;">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <li class="nav-item dropdown ms-5 my-auto">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="fa-stack" data-count="2">
                                <i class="fa-solid fa-cart-shopping fa-stack-1x fa-inverse"
                                    style="font-size: 25px; color: black;"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu container" aria-labelledby="navbarDropdown"
                            style="right:0; left: auto; width: 500px;">
                            <li class="container">
                                <div class="row mx-auto">
                                    <div class="col align-self-center text-start h5">Keranjang(0)</div>
                                    <div class="col align-self-center text-end"><a href="">Lihat Sekarang</a></div>
                                </div>
                            </li>

                            <li class="container">
                                <hr class="dropdown-divider">
                            </li>

                            <li class="container">
                                <a class="dropdown-item row d-flex mx-auto" href="#">
                                    <img src="assets/image/Picture.png" class="cart-img rounded col-3 float-start"
                                        alt="">
                                    <div class="ms-1 overflow-hidden col-7 align-content-center">
                                        <p class="my-auto cart-text">Meja Gaming Meja Komputer GG Gemink FLOTH FL120 -
                                            Merah</p>
                                        <p class="my-1">2 Barang</p>
                                    </div>
                                    <div class="col-2 p text-end">Rp.500.000</div>
                                </a>
                            </li>
                            <!-- divider -->
                            <li class="container">
                                <hr class="dropdown-divider">
                            </li>

                            <li class="container">
                                <a class="dropdown-item row d-flex mx-auto" href="#">
                                    <img src="assets/image/meja.png" class="cart-img rounded col-3 float-start" alt="">
                                    <div class="ms-1 overflow-hidden col-7 align-content-center">
                                        <p class="my-auto cart-text">Meja Gaming Meja Komputer GG Gemink FLOTH FL120 -
                                            Merah</p>
                                        <p class="my-1">2 Barang</p>
                                    </div>
                                    <div class="col-2 p text-end">Rp.500.000</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown ms-1 my-auto">
                        <a class="nav-link d-flex" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-sharp fa-solid fa-circle-user"></i>
                            <div class="p ps-2">Profil</div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                            style="right: auto;; left: auto;width: 500px;">

                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <div class="container-fluid content justify-content-center">
        <div class="row">
            <div class="col">
                <img src="<?= $product['image'] ?>" alt="" class="img-desc">
            </div>
            <div class="col-4">
                <div class="h5 fw-bold"><?= $product['name'] ?></div>
                <div class="h2 fw-bolder my-4">Rp<?= number_format($product['price'], 0, ',', '.') ?></div>
                <hr class="dropdown-divider mt-2">
                <div class="h6 mt-4">
                    <?= $product['description'] ?>
                </div>
            </div>
            <div class="col ">
                <div class="card mx-auto w-75" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Atur Jumlah dan Catatan</h5>
                        <h4 class="card-subtitle mb-2 text-muted text-uppercase mt-2">Counter</h4>
                        <div class="row">
                            <div class="col-6">
                                <h5 class="text-muted mt-5 my-auto">Subtotal</h5>
                            </div>
                            <div class="col-6 mt-5">
                                <div class="h5 text-end ">Rp 500.000</div>
                            </div>
                        </div>
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="btn btn-success w-100 mt-3 fw-bold">+ Keranjang</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Font Awesome Script -->
    <script src="https://kit.fontawesome.com/0958c69058.js" crossorigin="anonymous"></script>
</body>

</html>