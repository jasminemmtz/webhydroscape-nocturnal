<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" href="/style/css-pageproduk/style.css" type="text/css">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex ms-lg-0 my-0 my-lg-0" href="#">
                <div class="logo">
                    <img src="/img/logo.png">
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
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo isset($row['image']) ? $row['image'] : ''; ?>" alt="gambar" class="img-fluid" alt="Gambar Produk"
                    style="border-radius: 15px;width: 100%;">
            </div>
            <div class="col-md-6 product-container">
                <h2 style="font-weight: bold;">{{ $product['nama_produk'] }}</h2>
                <!-- <p class="mb-1">{{ $product['unit'] }}</p> -->
                {{-- <p class="mb-1">Lama Tahannya: 3-4 hari</p>
                <p class="mb-1">Cara Menyimpan: Simpan di dalam kulkas untuk menjaga kesegarannya.</p> --}}

                <div class="d-flex align-items-center flex-row">
                    <img src="/img/img-buah/safety.png" width="20">
                    <span class="guarantee" style="color: green; font-weight: bold;">Fresh and Safety Guarantee</span>
                </div>
                
                @if($id != null)
                    <div class="mt-3">
                        <form action="/cart/store" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quantity">Jumlah:</label>
                                        <input type="number" class="form-control" id="quantity" value="1" min="0"
                                            name="quantity">
                                        <input type="hidden" name="id" value="{{$product['_id']}}">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <button class="btn-custom" style="margin-top: 20px;" type="submit"
                                        name="submit">Tambahkan ke
                                        Keranjang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif

                <div class="product-description mt-3">
                    <h4 class="text-dark">Deskripsi Produk</h4>
                    <p class="text-justify text-muted">
                        {{ $product['deskripsi_produk'] }}
                    </p>
                </div>
                <div class="mt-3">
                    <h4 class="text-dark">Petunjuk Penyimpanan</h4>
                    <ol class="text-muted pl-1">
                        @php
                        $petunjukArray = explode('|', $product['cara_menyimpan']);
                        @endphp

                        @foreach($petunjukArray as $petunjuk)
                        <li>
                            <i class="fas fa-check"></i>
                            <span>{{ trim($petunjuk) }}</span>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
			$('.navbar-toggler').on('click', function(){
				$('#navbarSupportedContent').toggleClass('show');
			});
		});
    </script>
    <!-- Sertakan Bootstrap JS (JQuery dan Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>