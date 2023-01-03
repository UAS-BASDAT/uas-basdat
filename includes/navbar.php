<?php
    require_once('functions.php');
    $cart_items = get_all_cart();
    $total_quantity = 0;
    foreach($cart_items as $i) {
        $total_quantity += $i['quantity'];
    }
?>

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid justify-content-center">
        <a class="navbar-brand ms-5" href="#">Warunk Ilkomp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mt-2">
                    <a class="nav-link active mt-1 ms-2" aria-current="page" href="#product">Kategori</a>
                </li>
                <form class="d-flex mt-3">
                    <input class="form-control me-2" type="search" placeholder="Cari barang" aria-label="Search" style="width: 800px;">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <li class="nav-item dropdown ms-5 my-auto">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fa-stack" data-count="2">
                            <i class="fa-solid fa-cart-shopping fa-stack-1x fa-inverse" style="font-size: 25px; color: black;"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu container" aria-labelledby="navbarDropdown" style="right:0; left: auto; width: 500px;">
                        <li class="container">
                            <div class="row mx-auto">
                                <div class="col align-self-center text-start h5">Keranjang(<?= $total_quantity ?>)</div>
                                <div class="col align-self-center text-end"><a href="keranjang.php">Lihat Sekarang</a></div>
                            </div>
                        </li>

                        <li class="container">
                            <hr class="dropdown-divider">
                        </li>

                        <li class="container">
                            <?php foreach ($cart_items as $item) : ?>
                                <a class="dropdown-item row d-flex mx-auto" href="keranjang.php">
                                    <img src="<?= $item['image'] ?>" class="cart-img rounded col-3 float-start" alt="">
                                    <div class="ms-1 overflow-hidden col-7 align-content-center">
                                        <p class="my-auto cart-text"><?= $item['name'] ?></p>
                                        <p class="my-1"><?= $item['quantity']?> Barang</p>
                                    </div>
                                    <div class="col-2 p text-end">Rp<?= number_format($item['price'], 0, ',', '.') ?></div>
                                </a>
                            <?php endforeach ?>
                        </li>
                        <!-- divider -->
                        <li class="container">
                            <hr class="dropdown-divider">
                        </li>

                    </ul>
                </li>
                <li class="nav-item dropdown ms-1 my-auto">
                    <a class="nav-link d-flex" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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