<?php
require_once('functions.php');
$cart_items = get_all_cart();
$order_counter = 1;
$product_counter = 0;
$total_price = 0;
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand ms-5" href="">Warunk Ilkomp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <div class="col-8">
                <div class="h3 fw-bold mb-4">Checkout</div>
                <hr class="dropdown-divider">
                <?php foreach ($cart_items as $i) : ?>
                    <div class="h5 mt-3">Pesanan <?php echo $order_counter ?></div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <img src="<?php echo $i['image'] ?>" class="cart-img-checkbox rounded col-3 float-start" alt="">
                        </div>
                        <div class="col d-flex flex-column overflow-hidden">
                            <div class="h6 fw-normal"><?php echo $i['name'] ?></div>
                            <div class="h7 text-muted"><?php echo $i['quantity'] ?> Barang</div>
                            <div class="h5 mt-2 fw-bold">Rp<?php echo number_format($i['price'], 0, ',', '.') ?></div>
                        </div>
                    </div>

                    <hr class="dropdown-divider mt-4">

                    <div class="row">
                        <div class="col h4 mt-2">Subtotal</div>
                        <div class="col h4 fw-bold text-end">Rp <?php echo number_format($i['total_price'], 0, ',', '.') ?></div>
                    </div>
                    <?php $order_counter++;
                    $product_counter += $i['quantity'];
                    $total_price += $i['total_price'] ?>
                <?php endforeach ?>
            </div>
            <div class="col">
                <div class="card-body border-1 border-dark">
                    <div class="card-title fw-bold h4">Ringkasan Belanja</div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="h6 overflow-hidden fw-normal max-width">Total Harga (<?php echo $product_counter ?> Produk)</div>
                        </div>
                        <div class="col">
                            <div class="h6 overflow-hidden fw-normal max-width text-end">Rp<?php echo number_format($total_price, 0, ',', '.') ?></div>
                        </div>
                    </div>

                    <hr class="dropdown-divider mt-4">

                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-muted mt-5 my-auto">Total Tagihan</h5>
                        </div>
                        <div class="col-6 mt-5">
                            <div class="h5 text-end ">Rp<?php echo number_format($total_price, 0, ',', '.') ?></div>
                        </div>
                    </div>
                    <div class="container-fluid d-flex justify-content-center">
                        <div class="btn btn-success w-100 mt-3 fw-bold">Beli</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>

<script>
    function submit() {


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
</script>