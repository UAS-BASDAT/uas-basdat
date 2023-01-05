<?php
require_once('functions.php');
$cart_items = get_cart_checked();
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
            <a class="navbar-brand ms-5" href="index.php">Warunk Ilkomp</a>
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
                    <div class="row mt-3 id_product" value="<?= $i['id_product'] ?>">
                        <div class="col-3">
                            <img src="<?php echo $i['image'] ?>" class="cart-img-checkbox rounded col-3 float-start" alt="">
                        </div>
                        <div class="col d-flex flex-column overflow-hidden">
                            <div class="h6 fw-normal"><?php echo $i['name'] ?></div>
                            <div class="h7 text-muted" id="<?php echo "quantity" . ((string)$i['id_product']) ?>" value="<?= $i['quantity'] ?>"><?php echo $i['quantity'] ?> Barang</div>
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
                        <div class="btn btn-success w-100 mt-3 fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">Beli</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembelian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach($cart_items as $i) :?>
                    <div class="row px-1">
                        <div class="col h8 hidden" style="white-space: no-wrap;"><?php echo $i['name']?><br>
                            <span class="h7 text-muted"><?php echo $i['quantity']?></span>
                        </div>
                        <div class="col h6 text-end">Rp<?php echo number_format($i['total_price'], 0, ',', '.')?></div>
                    </div>
                    <?php endforeach?>
                    <hr class="dropdown-divider mt-3">
                    <div class="row px-1">
                        <div class="col h4">Total Pembayaran</div>
                        <div class="col h4 text-end">Rp<?php echo number_format($total_price, 0, ',', '.')?></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success" onclick="submit()">Bayar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>

<script>
    function submit() {
       

        var elements = document.getElementsByClassName("id_product");
        for (var i = 0, len = elements.length; i < len; i++) {

            let id_product = elements[i].getAttribute('value');
            let quantity = elements[i].parentNode.querySelector('#quantity' + id_product).getAttribute('value');
            // console.log(id_product);

            let params = "id=" + id_product + "&quantity=" + quantity;

            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "transactionPost.php");
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

            xhttp.onload = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    console.log(xhttp.responseText);
                    let message = xhttp.responseText;
                    console.log(message);
                }
            }
            xhttp.send(params);

        }
        alert('pembayaran berhasil');
        window.location.href = "index.php";

    };
</script>