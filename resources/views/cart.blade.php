<?php

    if(!isset($_SESSION['username'])){
        header('Location: /login');
        exit();
    }
    unset($_SESSION['gagal'], $_SESSION['berhasil'], $_SESSION['gagalp'], $_SESSION['berhasilp']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/css-cart-pembayaran/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/css-cart-pembayaran/style.css">
    <link rel="stylesheet" type="text/css" href="style/css-cart-pembayaran/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>E-Commerce Hydroponics Cart</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex ms-lg-0 my-0 my-lg-0" href="/">
                <div class="logo">
                    <img src="img/logo.png">
                    <div>
                        <span class="hydro">HYDRO</span>
                        <span class="scape">SCAPE</span>
                        <p class="sub-logo">HYDROPONIC STORE</p>
                    </div>
                </div>
            </a>

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse centered-navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex m-auto m-lg-auto my-0 my-lg-0">
                    <input class="px-4 search" type="search" placeholder="What are you looking for?"
                        aria-label="Search">
                    <button class="btn0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <form class="d-flex me-lg-0 my-4 my-lg-0">
                    <a href="/"><span style="margin-right: 10px; margin-left: 10px;"><i class="fa-solid fa-house"
                                style="margin-right: 5px;"></i></span></a>
                    
                    <a href="/cart"><span style="margin-right: 10px;"><i class="fa-solid fa-cart-shopping"
                                style="margin-right: 5px;"></i></span></a>
                    <a href="/login"><span><i class="fa-solid fa-user" style="margin-right: 5px;"></i></span></a>
                </form>
            </div>

        </div>


    </nav>

    <div class="container" style="margin-top: 110px;">
        <section class="bg-light my-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card border shadow-0">
                            <div class="m-4">
                                <h4 class="card-title mb-4">Your shopping cart</h4>
                                <?php $total = 0; ?>

                                <?php foreach($result as $row): ?>
                                <!-- Product -->
                                <div class="row gy-3 mb-4">
                                    <div class="col-lg-5">
                                        <div class="me-lg-5">
                                            <div class="d-flex">
                                                <img src="<?php echo isset($row['image']) ? $row['image'] : ''; ?>" alt="Image" class="border rounded me-3"
                                                    style="width: 96px; height: 96px;" />
                                                <div class="">
                                                    <a href="#" class="nav-link"><?php echo $row['nama_produk']; ?></a>
                                                    <p class="text-muted"><?php echo $row['unit']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                        <div class="">
                                            <input type="number" class="form-control me-4"
                                                value="<?php echo $row['quantity']; ?>" onchange="calculateTotal()" min="1"
                                                style="width: 100px;" />
                                        </div>
                                        <div class="">
                                            <text class="h6">Rp.
                                                <?php echo number_format($row['harga_produk'] * $row['quantity']); ?></text>
                                            <br />
                                            <small
                                                class="text-muted text-nowrap"><?php echo number_format($row['harga_produk'], '0', '', '.'); ?>
                                                /
                                                <?php echo $row['unit']; ?>
                                            </small>
                                        </div>
                                    </div>

                                    <div
                                        class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                        <div class="float-md-end">
                                            <a href="/delete_cart/<?= $row['_id'] ?>"
                                                class="btn btn-light border text-danger icon-hover-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    $total += $row['harga_produk'] * $row['quantity'];
                                endforeach; 
                                ?>
                            </div>

                            <div class="border-top pt-4 mx-4 mb-4">
                                <p><i class="far fa-clock fa-lg text-muted"></i>
                                    </i>Pembayaran harus dilakukan dalam waktu 24 jam.</p>
                                <p class="text-muted">
                                    Jika tidak diselesaikan dalam waktu 24 jam, maka pesanan anda akan dibatalkan secara
                                    otomatis.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card mb-3 border shadow-0">
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label class="form-label">Masukan kode voucher(optional)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control border" name=""
                                                placeholder="Coupon code" />
                                            <button class="btn btn-light border">Apply</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow-0 border">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total Harga:</p>
                                    <p class="mb-2" id="total_harga">
                                        <?= number_format($total, 0, '', '.') ?>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Diskon:</p>
                                    <p class="mb-2 text-success">-Rp. 0</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Pajak:</p>
                                    <p class="mb-2">Rp. 2.000</p>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total price:</p>
                                    <p class="mb-2 fw-bold" id="total_price">Rp.
                                        <?= number_format($total + 2000, 0, '', '.') ?>
                                    </p>
                                </div>

                                <div class="mt-3">
                                    @if($id != null)
                                    <a href="/transaksi_page?harga_produk=<?= number_format($total + 2000, 0, '', '.') ?>" class="btn btn-custom w-100 shadow-0 mb-2">Selesaikan
                                        Pembayaran</a>
                                    @else
                                    <button onclick="alert('Mohon Untuk login terlebih dahulu')" style="opacity: 0.5;" class="btn btn-custom w-100 shadow-0 mb-2">Selesaikan
                                        Pembayaran</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
    </div>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function calculateTotal() {
            var total = 0;

            // For each quantity input
            $("input[type='number']").each(function () {
                var qty = parseInt($(this).val());

                // Remove any formatting (commas, dots) and get the price per item
                var pricePerItem = parseFloat($(this).closest(".col-lg-2").find(".text-muted").text().split(
                    '/')[0].trim().replace(/\./g, ''));

                var rowTotal = qty * pricePerItem;
                total += rowTotal;

                // Format the row total to include thousands separator
                var formattedRowTotal = rowTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                // Updating the row's total
                $(this).closest(".col-lg-2").find(".h6").text("Rp. " + formattedRowTotal);
            });

            // Update the #total_harga and #total_price elements
            var formattedTotal = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $("#total_harga").text(formattedTotal);

            var formattedTotalPrice = (total + 2000).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $("#total_price").text("Rp. " + formattedTotalPrice);
        }
    </script>
</body>

</html>