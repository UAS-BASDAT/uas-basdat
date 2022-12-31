<?php 
  require 'functions.php';
  $products = get_products();
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
                        <a onclick="document.location='keranjang.php'" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="fa-stack" data-count="2">
                                <i class="fa-solid fa-cart-shopping fa-stack-1x fa-inverse"
                                    style="font-size: 25px; color: black;"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu container" aria-labelledby="navbarDropdown" style="right:0; left: auto; width: 500px;">
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
                                    <img src="assets/image/meja.png" class="cart-img rounded col-3 float-start"
                                        alt="">
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
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: auto;; left: auto;width: 500px;">

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

    <div id="carouselExampleDark" class="carousel carousel-dark slide slide-custom-body rounded-3"
        data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5"
                aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner slide-custom">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="assets/image/banner.webp" class="d-block mx-auto carousel-img" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="assets/image/Picture.png" class="d-block mx-auto carousel-img" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="assets/image/meja.png" class="d-block mx-auto carousel-img" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="assets/image/Picture.png" class="d-block mx-auto carousel-img" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="assets/image/Picture.png" class="d-block mx-auto carousel-img" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="assets/image/Picture.png" class="d-block mx-auto carousel-img" alt="">
            </div>
        </div>
    </div>

    <section id="product">
        <div class="container-fluid mt-5 justify-content-center" style="flex-wrap: wrap; display: flex">
          <?php foreach ($products as $product) :?>
            <a href="deskripsi.php?id=<?= $product['id'] ?>" class="px-3">
                <div class="card" style="width: 18rem; border-radius: 18px;">
                    <img src="<?= $product['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="my-auto card-title h-50 fw-normal"><?= $product['name']?></h5>
                        <p class="card-title fw-bold fs-4">Rp<?= number_format($product['price'], 0, ',', '.')?></p>
                      </div>
                </div>
            </a>
          <?php endforeach?>
        </div>

    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Font Awesome Script -->
    <script src="https://kit.fontawesome.com/0958c69058.js" crossorigin="anonymous"></script>
</body>

</html>