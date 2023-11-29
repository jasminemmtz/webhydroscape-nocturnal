<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="style/css-cart-pembayaran/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/css-cart-pembayaran/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

	<title>E-Commerce Hydroponics Cart</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-white fixed-top">
      
    
        <div class="container">
          
          <a class="navbar-brand d-flex ms-lg-0 my-0 my-lg-0" href="#">
            <div class="logo">
                <img src="img/logo.png">
                <div>
                    <span class="hydro">HYDRO</span>
                    <span class="scape" >SCAPE</span>
                    <p class="sub-logo" style="color: black;">HYDROPONIC STORE</p>
                </div>
            </div>
          </a>

          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse centered-navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex m-auto m-lg-auto my-0 my-lg-0">
              <input class="px-4 search" type="search" placeholder="What are you looking for?" aria-label="Search"> 
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
		

		<!-- JUDUL HALAMAN -->
		<div class="row">
			<div class="col-12">
				<h4 class="text-judul-halaman" style="text-align: center; margin-bottom: 20px;color: black;">&nbsp;&nbsp;&nbsp;PEMBAYARAN</h4>
			</div>
		</div>

		<div class="row">
			<!-- KOLOM 1 -->
			<div class="col-md-7">
				<form action="/transaksi" method="post" id="subtmi_form">
					@csrf
					<h3 class="text-judul">Alamat Pengiriman</h3>

					<input type="hidden" class="form-control" name="email" value="{{$email}}">
					<input type="hidden" class="form-control" name="subtotal" value="{{(int) str_replace (['Rp. ', '.'], '', $harga_produk)}}">
					<input type="hidden" class="form-control" name="total" value="{{(int) str_replace (['Rp. ', '.'], '', $harga_produk) + 10000}}">

					<label class="w-100 mb-3">
						Alamat lengkap <br>
						<input type="text" class="form-control" name="alamat_lengkap">
					</label>
					<!-- <label class="w-100 mb-3">
						Provinsi <br>
						<input type="text" class="form-control" name="provinsi">
					</label>
					<label class="w-100 mb-3">
						Kabupaten / Kota <br>
						<input type="text" class="form-control" name="kota">
					</label>
					<label class="w-100 mb-3">
						Kode POS <br>
						<input type="number" class="form-control" name="kode_pos">
					</label> -->

					<h3 class="text-judul mt-3">Kurir Pengiriman</h3>
					<label class="w-100 mb-3 border rounded p-2">
						<input type="radio" name="kurir" value="10000">
						<img src="img/img-cart-pembayaran/kurir-1.png">
						<span class="float-end">+ IDR 10.000</span>
					</label>
					<label class="w-100 mb-3 border rounded p-2">
						<input type="radio" name="kurir" value="12000">
						<img src="img/img-cart-pembayaran/kurir-2.png">
						<span class="float-end">+ IDR 10.000</span>
					</label>


					<h3 class="text-judul mt-3">Metode Pembayaran</h3>
					<label class="w-100 mb-3 border rounded p-2">
						<input type="radio" name="metode_pembayaran">
						Transfer Bank
					</label>
					<!-- <label class="w-100 mb-3 border rounded p-2">
						<input type="radio" name="metode_pembayaran">
						Cash on Delivery (COD)
					</label> -->
					<label class="w-100 mb-3 border rounded p-2">
						<input type="radio" name="metode_pembayaran">
						<img src="img/img-cart-pembayaran/bayar-1.png">
					</label>
					<label class="w-100 mb-3 border rounded p-2">
						<input type="radio" name="metode_pembayaran">
						<img src="img/img-cart-pembayaran/bayar-2.png">
					</label>
					<label class="w-100 mb-3 border rounded p-2">
						<input type="radio" name="metode_pembayaran">
						<img src="img/img-cart-pembayaran/bayar-3.png">
					</label>

					
					

				</form>
			</div>

			<!-- KOLOM 2 -->
			<div class="col-md-4 offset-md-1">
				<div class="card sticky-top">
				  <div class="card-header bg-white">
				    <h3 class="text-judul">Detail Pembayaran</h3>
				  </div>
				  <div class="card-body">
				    <div class="row mt-2 mb-2">
				    	<div class="col-md"><small>Sub Total</small></div>
				    	<div class="col-md">IDR {{$harga_produk}}</div>
				    </div>
				    <div class="row mt-2 mb-2">
				    	<div class="col-md"><small>Biaya pengiriman</small></div>
				    	<div class="col-md">IDR 10.000</div>
				    </div>
				    <div class="row mt-2 mb-2">
				    	<div class="col-md"><small>Total</small></div>
				    	<div class="col-md">IDR {{ number_format ((int) str_replace (['Rp. ', '.'], '', $harga_produk) + 10000, 0, '', '.') }}</div>
				    </div>
				  </div>
				  <div class="card-footer">
				    <button type="submit" class="btn btn-lg btn-custom btn-sm w-100" id="bayar" onclick="bayar()">Bayar</button>
				  </div>
				</div>
			</div>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
			integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
			crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<script>
			function tampilkanAlert() {
				alert('Berhasil');
			}

			function bayar(){
				$('#bayar').on('click', function () {
					$("#subtmi_form").submit();
				});

			}

			</script>
		
	</div> <!-- PENUTUP CONTAINER -->
</body>
</html>	