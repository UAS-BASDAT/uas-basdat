<?php
require_once 'functions.php';
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
    <?php include 'includes/navbar.php' ?>
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
                                    <button class="btn btn-primary p-1" style="font-size:10px;" id="minus" onclick="minus(this)"><i class="fa-solid fa-minus"></i></button>
                                    <div id="number"></div>
                                    <button class="btn btn-primary p-1" style="font-size:10px;" id="plus" onclick="plus(this)"><i class="fa-solid fa-plus"></i></button>
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
        let quantity = 1;

        const st = document.getElementById('stock');

        const stval = st.getAttribute('value');
        var stocks = parseInt(stval);
        let minbutton = document.getElementById('minus')
        let plusbutton = document.getElementById('plus')

        if (stocks != 0) {
            document.getElementById('number').innerHTML = quantity;
            st.innerHTML = stval;
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
                // st.innerHTML = stocks - quantity;
                // st.setAttribute('value', stocks - quantity);
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
                // st.innerHTML = stocks - quantity;
                // st.setAttribute('value', stocks - quantity);
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
                // let stock = stocks - quantity;

                // let params = "id=" + id_product + "&price=" + price + "&quantity=" + quantity + "&stock=" + stock;
                let params = "id=" + id_product + "&price=" + price + "&quantity=" + quantity;

                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", "postData.php");
                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

                xhttp.onload = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        console.log(xhttp.responseText);
                        let message = xhttp.responseText;
                        console.log(message);
                        if (message == 'success') {
                            alert('data berhasil ditambahkan');
                        } else if (message == 'error') {
                            alert('data gagal ditambahkan')
                        } else if (message == 'full') {
                            alert('Permintaan anda melebihi stock')
                        }
                    }
                }
                xhttp.send(params);
            };
            location.reload();
        }
    </script>
</body>

</html>