<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
    <title>Warunk Ilkomp</title>
</head>

<body>
    <?php include 'includes/navbar.php'?>

    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <div class="col-8">
                <div class="h3 fw-bold">Keranjang</div>
                <div class="form-check mt-3 mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="checkAll" onclick="check(this)">
                    <label class="form-check-label mt-1 ms-3" for="flexCheckDefault">
                        <div class="h5 fw-normal">Pilih Semua</div>
                    </label>
                </div>
                <hr class="dropdown-divider">

                <div class="item" id="item" style="width: 100%">


                </div>


            </div>
            <div class="col">
                <div class="card-body border-1 border-dark mb-0">
                    <div class="card-title fw-bold h4">Ringkasan Belanja</div>
                    <div class="row" id="detail">



                    </div>
                    <hr class="dropdown-divider">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-muted mt-3 my-auto" id="total_barang"></h5>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="h5 text-end" id="total_harga"></div>
                        </div>
                    </div>
                    <div class="container-fluid d-flex justify-content-center">
                        <div class="btn btn-success w-100 mt-3 fw-bold" onclick="save()">Beli</div>
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
        window.onload = function() {
            showData();
        }

        const arrcheck = [];


        function showData() {


            let xhttp = new XMLHttpRequest();
            xhttp.open("GET", "getData.php");

            xhttp.onload = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    let message = xhttp.responseText;
                    if (message == "error") {
                        document.getElementById('item').innerHTML = "No Data";
                    } else {
                        let dataProduct = JSON.parse(xhttp.responseText);
                        // console.log(dataProduct);

                        let item = '';

                        for (index in dataProduct) {
                            let xhr = new XMLHttpRequest();
                            xhr.open("GET", "getDatabyId.php?id=" + dataProduct[index].id_product);
                            // console.log(index, dataProduct[index]);

                            var dp = '';
                            var quantity = dataProduct[index].quantity;
                            // console.log()

                            item +=
                                "<div class='form-check mt-3 mb-4' id='" + dataProduct[index].id_product + "' >" +
                                "<input class='form-check-input' type='checkbox' value='' id='Check" + dataProduct[index].id_product + "' onclick='checkdetail(this)' checked>" +
                                "<label class='form-check-label mt-1 ms-3' for='flexCheckDefault'>" +
                                "<div class='row'>" +
                                "<div class='col-3'>" +
                                "<img src='assets/image/batre.png' id='img_" + dataProduct[index].id_product + "' class='cart-img-checkbox rounded col-3 float-start' alt=''>" +
                                "</div>" +
                                "<div class='col d-flex flex-column overflow-hidden'>" +
                                "<div class='h6 fw-normal product' id='product_" + dataProduct[index].id_product + "'></div>" +
                                "<div class='h4 mt-2 fw-bold price' id='product_price_" + dataProduct[index].id_product + "'></div>" +
                                "<div class='h4 pt-5 align-self-end d-flex'>" +
                                "<button class='btn btn-primary py-1' style='font-size:12px;' id='" + dataProduct[index].id_product + "' onclick='remove(this)'><i class='fa-solid fa-trash'></i></button>" +
                                "<div class='counter ms-4'>" +
                                "<div class='vr'></div>" +
                                "<div class='col-4 d-flex justify-content-between align-items-center'>" +
                                "<button class='btn btn-primary p-1 mr-3 plus' style='font-size:10px;' id='plus_" + dataProduct[index].id_product + "' onclick='plus(this)'><i class='fa-solid fa-plus'></i></button>" +
                                "<div class='quantity' id='number_" + dataProduct[index].id_product + "'  value='" + dataProduct[index].quantity + "'>" + dataProduct[index].quantity + "</div>" +
                                "<button class='btn btn-primary p-1 minus' style='font-size:10px;' id='minus_" + dataProduct[index].id_product + "' onclick='minus(this)'><i class='fa-solid fa-minus'></i></button>" +
                                "<div class='stock' id='stock_" + dataProduct[index].id_product + "'> </div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</label>" +

                                "</div>";


                            console.log(item);

                            xhr.onload = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    let dp = JSON.parse(xhr.responseText);
                                    // console.log(dp);
                                    document.getElementById("product_" + dp.id).innerHTML = dp.name;
                                    // document.getElementById("name_" + dp.id).innerHTML = dp.name;
                                    document.getElementById("product_" + dp.id).setAttribute('value', dp.name);
                                    document.getElementById("product_price_" + dp.id).innerHTML = "Rp. " + new Intl.NumberFormat().format(dp.price);
                                    document.getElementById("product_price_" + dp.id).setAttribute('value', dp.price);
                                    document.getElementById("stock_" + dp.id).setAttribute('value', dp.stock);
                                    document.getElementById("img_" + dp.id).setAttribute('src', dp.image);


                                    document.getElementById("stock_" + dp.id).innerHTML = "<h6> stock: " + dp.stock + "</h6>";

                                    itemdetail = "";
                                    checkall();
                                }
                            }
                            xhr.send();
                            document.getElementById('item').innerHTML = item;
                            // document.getElementById('detail').innerHTML = itemdetail;

                        }
                    }
                }

            }
            xhttp.send();

            // var checkedboxes = document.querySelectorAll('input[type="checkbox"]');
            // checkvar = document.getElementById('checkAll');
            // checkvar.checked == true;
            // check(checkvar);
        }

        function checkall() {
            checkvar = document.getElementById('checkAll');
            check(checkvar);
        }


        function check(e) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != e) {
                    checkboxes[i].checked = e.checked;
                    checkdetail(checkboxes[i]);
                    itemdetail = "";
                }
            }
        }


        itemdetail = "";

        function checkdetail(e) {
            itemdetail = "";
            // console.log(e);


            w = e.getAttribute('id');
            y = e.parentNode.querySelector('.product');
            v = e.parentNode.querySelector('.price');

            let name = y.getAttribute('value');
            let price = v.getAttribute('value');

            // console.log(w)
            if (e.checked == true) {
                arrcheck.push(w)

            } else if (e.checked == false) {

                var index = arrcheck.indexOf(w);
                if (index !== -1) {
                    arrcheck.splice(index, 1);
                }
            }

            showdetail();
        }




        function showdetail() {
            quantityCount = 0;
            priceCount = 0;
            // itemdetail ="";
            for (let i = 0; i < arrcheck.length; i++) {
                const element = arrcheck[i];

                let data = document.getElementById(element);

                w = data.getAttribute('id');
                y = data.parentNode.querySelector('.product');
                z = data.parentNode.querySelector('.quantity');
                v = data.parentNode.querySelector('.price');

                let quantity = parseInt(z.getAttribute('value'));
                let name = y.getAttribute('value');
                let price = parseInt(v.getAttribute('value')) * quantity;
                quantityCount += quantity;
                priceCount += price;


                itemdetail +=
                    "<div class='d-flex' id='" + w + "'>" +
                    "<div class='col'>" +
                    "<div class='h6 overflow-hidden fw-normal max-width'>" + name + "</div>" +
                    "<div class='h6 overflow-hidden fw-normal max-width' id='quantity_product' value='" + quantity + "'> (" + quantity + ") </div>" +
                    "</div>" +
                    "<div class='col itemdDetail' id='" + w + "'>" +
                    "<div class='h6 overflow-hidden fw-normal max-width text-end price'> Rp" + new Intl.NumberFormat().format(price) + "</div></div>" +
                    "</div>";

                document.getElementById('detail').innerHTML = itemdetail;


            }
            if (arrcheck.length == 0) {
                document.getElementById('detail').innerHTML = "";
            }
            // console.log(arrcheck);

            document.getElementById('total_barang').innerHTML = "Total Harga (" + quantityCount + " Barang)";
            document.getElementById('total_harga').innerHTML = "Rp." + new Intl.NumberFormat().format(priceCount);
        }



        function plus(e) {
            let quantity = parseInt(e.parentNode.querySelector('.quantity').getAttribute('value'));
            let stocks = parseInt(e.parentNode.querySelector('.stock').getAttribute('value'));
            const minbutton = e.parentNode.querySelector('.minus');
            // console.log(quantity)

            minbutton.disabled = false;
            if (quantity > 0 && quantity < stocks) {
                if (quantity + 1 == stocks) {
                    e.disabled = true
                }
                quantity += 1;
                e.parentNode.querySelector('.quantity').setAttribute('value', quantity)
                e.parentNode.querySelector('.quantity').innerHTML = quantity;
                // let datadetail = document.getElementById('detail').querySelector('#quantity_product');
                // datadetail.setAttribute('value', quantity);
                // datadetail.innerHTML = "(" + quantity + ")";
                // console.log(datadetail);
                //     // st.innerHTML = stocks - quantity;
                //     // st.setAttribute('value', stocks - quantity);
                //     price.setAttribute('value', priceval * quantity);
                //     price.innerHTML = new Intl.NumberFormat().format(priceval * quantity);

            }
            location.reload();
        }




        function minus(e) {
            let quantity = parseInt(e.parentNode.querySelector('.quantity').getAttribute('value'));
            let stocks = parseInt(e.parentNode.querySelector('.stock').getAttribute('value'));
            const plusbutton = e.parentNode.querySelector('.plus');


            plusbutton.disabled = false;
            if (quantity > 1) {
                if (quantity <= 2) {
                    e.disabled = true
                }
                quantity -= 1;
                e.parentNode.querySelector('.quantity').setAttribute('value', quantity)
                e.parentNode.querySelector('.quantity').innerHTML = quantity;
                // let datadetail = document.getElementById('detail').querySelector('#quantity_product');
                // datadetail.setAttribute('value', quantity);
                // datadetail.innerHTML = "(" + quantity + ")";
                // st.innerHTML = stocks - quantity;
                // st.setAttribute('value', stocks - quantity);
                // price.setAttribute('value', priceval * quantity);
                // price.innerHTML = new Intl.NumberFormat().format(priceval * quantity);
            }
        }



        function remove(e) {
            let id = e.getAttribute('id');

            let xhttp = new XMLHttpRequest();
            xhttp.open("GET", "removeData.php?id=" + id);
            xhttp.onload = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    let message = xhttp.responseText;
                    if (message == 'success') {
                        alert('data berhasil dihapus');
                    } else if (message == 'error') {
                        alert('data gagal dihapus')
                    }
                }
            }
            xhttp.send();
        }


        function save() {
            var cbsave = document.querySelectorAll('input[type=checkbox]:checked');
            var message = '';
            for (var i = 0; i < cbsave.length; i++) {
                if (cbsave[i].getAttribute('id') != "checkAll") {
                    let idproductsave = parseInt(cbsave[i].parentNode.getAttribute('id'));
                    let quantitysave = parseInt(cbsave[i].parentNode.querySelector('.quantity').getAttribute('value'));
                    // console.log(idproductsave);

                    let params = "id=" + idproductsave + "&quantity=" + quantitysave;

                    let xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "UpdateCartData.php");
                    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

                    xhttp.onload = function() {
                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                            // console.log(xhttp.responseText);
                            message = xhttp.responseText;
                            // console.log(message);

                        }
           
                    }
                    xhttp.send(params);
                }
            }
            window.location.href = "checkout.php";

            // console.log(checkedBoxes);
        }
    </script>





</body>

</html>