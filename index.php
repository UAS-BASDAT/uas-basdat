<?php 
  require_once 'functions.php';
  $products = get_products();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
    <title>Warunk Ilkomp</title>
</head>

<body>
    <?php include "includes/navbar.php" ?>

    <div id="carouselExampleDark" class="carousel carousel-dark slide slide-custom-body rounded-3" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
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
            <?php foreach ($products as $product) : ?>
                <a href="deskripsi.php?id=<?= $product['id'] ?>" class="px-3">
                    <div class="card" style="width: 18rem; border-radius: 18px;">
                        <img src="<?= $product['image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="my-auto card-title h-50 fw-normal"><?= $product['name'] ?></h5>
                            <p class="card-title fw-bold fs-4">Rp<?= number_format($product['price'], 0, ',', '.') ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach ?>
        </div>

    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Font Awesome Script -->
    <script src="https://kit.fontawesome.com/0958c69058.js" crossorigin="anonymous"></script>
</body>

</html>