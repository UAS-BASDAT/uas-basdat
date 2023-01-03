<?php
require 'functions.php';
$product = get_product_detail($_GET['id']);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="custom.css">
    <title>Warunk Ilkomp</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand ms-5" href="#">Warunk Ilkomp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active mt-1 ms-2" aria-current="page" href="#product">Kategori</a>
                    </li>
                    <form class="d-flex">
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
                                    <div class="col align-self-center text-start h5">Keranjang(0)</div>
                                    <div class="col align-self-center text-end"><a href="">Lihat Sekarang</a></div>
                                </div>
                            </li>

                            <li class="container">
                                <hr class="dropdown-divider">
                            </li>

                            <li class="container">
                                <a class="dropdown-item row d-flex mx-auto" href="#">
                                    <img src="assets/image/Picture.png" class="cart-img rounded col-3 float-start" alt="">
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

    <div class="container-fluid content justify-content-center" id="product" value=<?= $product['id'] ?>>
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
                        <h5 class="card-title pb-3">Atur Jumlah dan Catatan</h5>
                        <h4 class="card-subtitle mb-2 text-muted text-uppercase mt-2">
                        </h4>
                        <div class="row">
                            <div class="row px-3">
                                <div class="col-6 d-flex justify-content-between align-items-center">
                                    <button class="btn btn-primary p-1" style="font-size:10px;" id="plus" onclick="plus(this)"><i class="fa-solid fa-plus"></i></button>
                                    <div id="number"></div>
                                    <button class="btn btn-primary p-1" style="font-size:10px;" id="minus" onclick="minus(this)"><i class="fa-solid fa-minus"></i></button>
                                </div>
                                <div class="col-5  d-flex align-items-center">
                                    <h7>Stock : <span id="stock" value="<?= $product['stock'] ?>"></span>
                                    </h7>
                                </div>
                            </div>

                            <div class="col-5">
                                <h5 class="text-muted mt-5 my-auto">Subtotal</h5>
                            </div>
                            <div class="col-7 mt-5">
                                <div class="h5 text-end">Rp <span id="price" value="<?= $product['price'] ?>"></span></div>
                            </div>
                        </div>
                        <div class="container-fluid d-flex justify-content-center" onclick="submit(this)">
                            <div class="btn btn-success w-100 mt-3 fw-bold">+ Keranjang</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Font Awesome Script -->
    <script src="https://kit.fontawesome.com/0958c69058.js" crossorigin="anonymous"></script>
    <script>
        window.onload = getdata();
        let quantity = 1;


        function getdata() {
            let id = document.getElementById('product').getAttribute('value');
            let xhttp = new XMLHttpRequest();
            xhttp.open("GET", "getData.php?id=" + id);
            xhttp.onload = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    let data = JSON.parse(xhttp.responseText)
                    // console.log(data);
                    var pprice = document.getElementById('price');
                    var pstock = document.getElementById('stock');

                    pstock.setAttribute('value', data.stock)

                    pprice.setAttribute('value', data.price)
                }
            }
            xhttp.send();
        }



        const st = document.getElementById('stock');

        const stval = st.getAttribute('value');
        var stocks = parseInt(stval);
        let minbutton = document.getElementById('minus')
        let plusbutton = document.getElementById('plus')

        if (stocks != 0) {
            document.getElementById('number').innerHTML = quantity;
            st.innerHTML = stval - quantity;
        } else if (stocks == 0) {
            document.getElementById('number').innerHTML = 0;
            st.innerHTML = 0;
            minbutton.disabled = true;
            plusbutton.disabled = true;
        }



        let price = document.getElementById('price')
        let priceval = price.getAttribute('value')
        price.innerHTML = new Intl.NumberFormat().format(priceval * quantity);

        function plus(e) {
            minbutton.disabled = false;
            if (quantity > 0 && quantity < stocks) {
                if (quantity + 1 == stocks) {
                    plusbutton.disabled = true
                }
                quantity += 1;
                document.getElementById('number').innerHTML = quantity;
                st.innerHTML = stocks - quantity;
                st.setAttribute('value', stocks - quantity);
                price.setAttribute('value', priceval * quantity);
                price.innerHTML = new Intl.NumberFormat().format(priceval * quantity);

            }
        }

        if (quantity == 1) {
            minbutton.disabled = true
        }

        function minus(e) {
            plusbutton.disabled = false;
            if (quantity > 1) {
                if (quantity <= 2) {
                    minbutton.disabled = true
                }
                quantity -= 1;
                document.getElementById('number').innerHTML = quantity;
                st.innerHTML = stocks - quantity;
                st.setAttribute('value', stocks - quantity);
                price.setAttribute('value', priceval * quantity);
                price.innerHTML = new Intl.NumberFormat().format(priceval * quantity);
            }
        }


        function submit(e) {
            if (stocks == 0) {
                alert('barang sudah sold out')
            } else {

                let price = document.getElementById('price').getAttribute('value');
                let id_product = document.getElementById('product').getAttribute('value');
                let quantity = document.getElementById('number').innerHTML;
                let stock = stocks - quantity;


                let params = "id=" + id_product + "&price=" + price + "&quantity=" + quantity + "&stock=" + stock;

                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", "postData.php");
                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

                xhttp.onload = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        xhttp.responseText = "";
                        console.log(xhttp.responseText);
                        let message = xhttp.responseText;
                        if (message == 'success') {
                            alert('data berhasil ditambahkan');
                            location.reload();
                        } else if (message == 'error') {
                            alert('data gagal ditambahkan')
                        }
                    }
                }
            };

            xhttp.send(params);
        }
    </script>
</body>

</html>