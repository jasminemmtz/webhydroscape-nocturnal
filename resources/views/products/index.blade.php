@php
require_once base_path('resources/views/php/conn.php');

$total = 0;
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
$products = $result->fetch_all(MYSQLI_ASSOC);
@endphp

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fruit Catalogue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" href="/style/css-sayur/style.css" type="text/css">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white fixed-top">


        <div class="container">

            <a class="navbar-brand d-flex ms-lg-0 my-0 my-lg-0" href="#">
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
                    <a href="/ordertracking"><span style="margin-right: 10px;"><i class="fa-regular fa-clipboard"
                                style="margin-right: 5px;"></i></span></a>
                    <a href="/cart"><span style="margin-right: 10px;"><i class="fa-solid fa-cart-shopping"
                                style="margin-right: 5px;"></i></span></a>
                    <a href="/login"><span><i class="fa-solid fa-user" style="margin-right: 5px;"></i></span></a>
                </form>
            </div>
        </div>


    </nav>
    <div style="margin-top: 110px;">
        <ul class="nav kategori-menu justify-content-center">
            <li class="nav-item">
                <a href="" class="btn btn-outline w-100 sayur"
                    style="margin-left: 10px; background-color: #4E7302;color: white;"
                    onmouseover="this.style.color='#ffffff'; this.style.backgroundColor='#4E7302';"
                    onmouseout="this.style.color='#000000'; this.style.backgroundColor='transparent';">Sayur</a>
            </li>
            <li class="nav-item">
                <a href="" class="btn btn-outline w-100 buah"
                    style="margin-left: 15px; background-color: #4E7302;color: white;"
                    onmouseover="this.style.color='#ffffff'; this.style.backgroundColor='#4E7302';"
                    onmouseout="this.style.color='#000000'; this.style.backgroundColor='transparent';">Buah</a>
            </li>
        </ul>
    </div>

    <!-- Product Cards -->
    <div class="container-fluid mt-2 mb-5">
        <div class="products">
            <div class="row g-3">
                @foreach ($products as $p)
                <div class="col-lg-3 col-6 mt-3">
                    <div class="card clickable-card">
                        <img src="{{ $p['image'] }}" class="card-img-top">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold"><b>{{ $p['product_name'] }}</b></span>
                                <span class="font-weight-bold">Rp. {{ $p['price'] }}</span>
                            </div>
                            <p class="card-text mb-1 mt-1">{{ $p['unit'] }}</p>
                            <div class="d-flex align-items-center flex-row">
                                <img src="img/img-buah/safety.png" width="20">
                                <span class="guarantee">Fresh and Safety Guarantee</span>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="text-right buttons d-flex flex-wrap justify-content-evenly">
                                <a href="/products/{{ $p['product_id'] }}" class="btn btn-details"><i
                                        class="fas fa-info-circle"></i>
                                    Detail</a>
                                <form action="/cart/store" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="id" value="{{$p['product_id']}}">
                                    <button class="btn btn-cart" type="submit" name="submit"><i
                                            class="fas fa-cart-plus"></i> Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- jQuery and Custom Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".clickable-card").click(function() {
                $(this).toggleClass("active");
            });
        });

        $(document).ready(function() {
            $('.navbar-toggler').on('click', function() {
                $('#navbarSupportedContent').toggleClass('show');
            });
        });
    </script>
</body>

</html>