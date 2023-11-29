<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap -->
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" />

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- BoxIcons -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style/main.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    #productImage {
      max-width: 50%;
      /* or whatever width you desire */
      margin: 0 auto;
      display: block;
    }
  </style>
  <title>HYDROSCAPE</title>
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
          <input class="px-4 search" type="search" placeholder="What are you looking for?" aria-label="Search">
          <button class="btn0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <form class="d-flex me-lg-0 my-4 my-lg-0">
          <a href="/"><span style="margin-right: 10px; margin-left: 10px;"><i class="fa-solid fa-house"
                style="margin-right: 5px;"></i></span></a>
          
          @if($id != null)
            <a href="/cart"><span style="margin-right: 10px;"><i class="fa-solid fa-cart-shopping"
                  style="margin-right: 5px;"></i></span></a>
          @endif
          
          <a href="/login"><span><i class="fa-solid fa-user" style="margin-right: 5px;"></i></span></a>
        </form>
      </div>

    </div>


  </nav>

  <!-- Header Start -->
  <section class="header mt-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Swiper -->
          <div class="swiper mySwiperHeader position-relative">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <a href="#">
                  <img src="img/1carousel.png" class="img-fluid" alt="" style="border-radius: 20px;" />
                </a>
                <div class="carousel-caption" style="text-align: left;">
                  <br><a href="/products"><button>Shop Now</button></a>
                </div>
              </div>
              <div class="swiper-slide">
                <a href="#">
                  <img src="img/2carousel.png" class="img-fluid" alt="" style="border-radius: 20px;" />
                </a>
                <div class="carousel-caption" style="text-align: left;">
                  <br><a href="/products"><button>Shop Now</button></a>
                </div>
              </div>
              <div class="swiper-slide">
                <a href="#">
                  <img src="img/3carousel.png" class="img-fluid" alt="" style="border-radius: 20px;" />
                </a>
                <div class="carousel-caption" style="text-align: left;">
                  <br><a href="/products"><button>Shop Now</button></a>
                </div>
              </div>
            </div>
            <div class="d-inline position-absolute btn-slider d-none d-sm-block">
              <span class="me-1"><i class="bx bx-chevron-left-circle btn-slide1"></i></span>
              <span><i class="bx bx-chevron-right-circle btn-slide2"></i></span>
            </div>

            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Header End -->

  <!-- Banner Start -->
  <section class="banner mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 position-relative">
            <div class="card-body">
              <img src="img/fruit-vegetable.png" class="img-fluid" alt="" style="border-radius: 10px;" />
              <div class="detail position-absolute px-4">
                <h1 class="mb-3" style="font-size: 20px;">Vegetables <br>& Fruits</h1>
                <a href="/sayur" class="btn-first py-2 px-3">Lihat Produk</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 position-relative">
            <div class="card-body">
              <img src="img/recipe.png" class="img-fluid" alt="" style="border-radius: 8px;" />
              <div class="detail position-absolute px-4">
                <h1 class="mb-3">Recipes</h1>
                <a href="/recipe" class="btn-first py-2 px-3">Lihat Resep</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 position-relative">
            <div class="card-body">
              <img src="img/tour.png" class="img-fluid" alt="" style="border-radius: 10px;" />
              <div class="detail position-absolute px-4">
                <h1 class="mb-3">Video Tour</h1>
                <a href="/videotour" class="btn-first py-2 px-3">Lihat Tour</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner End -->

  <!-- Product Start -->
  <section class="product">
    <div class="container">
      <div class="row row-title">
        <div class="col-12">
          <h1 id="produk">Beberapa Produk Kami</h1>
        </div>
      </div>
      <div class="row row-card mt-5">
        <?php 
        if (count($result) > 0):
            // Loop through products and display them
            foreach($result as $row):
        ?>
        <div class="col-lg-3 col-12 mt-3">
          <div class="card card-product border-0 p-3 p-sm-4 h-100">
            <?php if(isset($row['discount'])) { ?>
            <div class="ribbon text-center px-1 py-3 py-sm-4 px-sm-2">
              <p class="m-0 text-white"><?php echo $row['discount']; ?>% Off</p>
            </div>
            <?php } ?>
            <img src="<?php echo isset($row['image']) ? $row['image'] : ''; ?>" class="img-fluid mx-auto" alt="Foto Product" />
            <div class="detail mt-3 mt-sm-5">
              <input type="hidden" id="product_id" value="<?= $row['_id'] ?>">
              
              <input type="hidden" id="berat_produk" value="<?= $row['berat'] ?>">
              <input type="hidden" id="email_produk" value="<?= $email ?>">
              <input type="hidden" id="harga_produk" value="<?= $row['harga_produk'] ?>">

              <a href="#" class="name-product"><?php echo $row['nama_produk']; ?></a>
              <p id="unit"><?php echo $row['unit']; ?></p>
              <p class="price m-0 mt-3 mt-sm-0" id="price">Rp <?php echo number_format($row['harga_produk'], 2, ',', '.'); ?>
              </p>
              <div class="d-sm-flex align-items-center justify-content-sm-between mt-3">

                <a href="/products/<?php echo $row['_id']; ?>" class="tag btn-first-detail">Detail</a>
                <a href="javascript:void(0);" class="tag btn-first-keranjang"><i class="fa-solid fa-cart-shopping"
                    style="margin-right: 5px;"></i>Keranjang</a>
              </div>
            </div>
          </div>
        </div>
        <?php 
            endforeach; // end while loop
          else:
            echo "No products found.";
          endif;
        ?>
      </div>
    </div>
  </section>
  <!-- Product End -->

  <!--Recipe start-->
  <div class="container container-resep" style="margin-top: 100px;">
    <h1 style="font-size: 30px;">Most Favorite Recipes</h1>
    <section id="fda_product_tile" class="col-12">
      <div class="row fda_food_row">
        <div class="col-lg-6 col-md-6 my-lg-0 my-3">
          <div class="food_tile">
            <img src="img/bg pattern.png" alt="" class="fda_product_img">
            <span class="food_name">Salad Tuna ala Prancis</span>
            <span class="food_detail">Pilihan salad lezat yang menampilkan tuna sebagai protein utamanya. Hidangan ini
              dilengkapi saus zesty ala Prancis yang meningkatkan cita rasa tuna dan sayuran yang menyertainya. Biasanya
              berisi berbagai sayuran segar, seperti selada, tomat, mentimun, dan zaitun yang memberikan cita rasa
              segar.</span>
            <a href="/tunaprancis"><button type="button" class="btn btn-sm btn-default">Read More</button></a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 my-lg-0 my-3">
          <div class="food_tile">
            <img src="img/bg pattern (1).png" alt="" class="fda_product_img">
            <span class="food_name">Sup Ayam Ketumbar</span>
            <span class="food_detail">Sup beraroma yang dibuat dengan potongan ayam empuk dan infus ketumbar, ramuan
              harum yang menambahkan sentuhan unik dan aromatik pada hidangan. Ini adalah makanan klasik yang
              menenangkan yang menawarkan kombinasi nikmat antara ayam dan rasa ketumbar yang segar dan bersahaja</span>
            <a href="/supayam"><button type="button" class="btn btn-sm btn-default">Read More</button></a>
          </div>
        </div>


      </div>
    </section>
  </div>
  <!--Recipe End-->

  <!--Video-->

  <div class="col-12 judul-video">
    <h1>Virtual Tour</h1>
  </div>

  <div class="row">
    <div class="col-lg-8 m-auto">
      <div class="about-video">
        <div class="about-video-img" style="background-image: url(img/thumbnail.jpg);">
        </div>
        <div class="play-btn-wp">
          <a href="https://drive.google.com/file/d/1mE4a7L3qQ1KJCMnTEfPfRsS7P3vEUMQ3/view?usp=share_link"
            data-fancybox="video" class="play-btn">
            <i class="fa-solid fa-play" style="color: #4E7302;"></i>

          </a>
          <span>Watch The Tour</span>
        </div>
      </div>
    </div>
  </div>

  <!-- modal -->
  <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productTitle"></h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body">
          <form id="cartForm" action="/insert_cart" method="post">
            @csrf
            <input id="modal-product_id" name="product_id" hidden>

            <input id="modal-name" name="nama_produk" hidden>
            <input id="modal-berat" name="berat" hidden>
            <input id="modal-email" name="email" hidden>
            <input id="modal-harga" name="harga_produk" hidden>

            <img id="productImage" src="" alt="Product Image" class="img-fluid">
            <label for="modal-price">Harga:</label>
            <input id="modal-price" class="form-control" readonly>
            <label for="modal-unit">Unit:</label>
            <input id="modal-unit" class="form-control" readonly name="unit">
            <label for="quantity">Jumlah:</label>
            <input type="number" id="quantity" name="quantity" class="form-control" min="1" value="1" required>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" style="background-color: #A72122"
          data-dismiss="modal">Close</button>
          @if($id != null)
            <button type="button" class="btn btn-secondary" style="background-color: #4E7302" id="addToCartButton">Add to
              Cart</button>
          @else
            <button type="button" class="btn btn-secondary" style="background-color: #4E7302; opacity:0.5;">Add to
              Cart</button>
          @endif
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Start -->
  <footer class="footer" style="background-color: #f5f5f5;">
    <br>
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-md-2">
          <img src="img/logo-footer.png" alt="" />

          <div class="sosmed mt-5">
            <a href="#"><i class="bx bxl-instagram"></i></a>
            <a href="https://wa.me//6287873504007/?text=urlencodetext" target="_blank"><i
                class="bx bxl-whatsapp mx-3"></i></a>
            <a href="#"><i class="bx bxl-facebook-circle"></i></a>
          </div>

        </div>
        <div class="col-md-9">
          <div class="row justify-content-lg-end">
            <div class="col-md-4 me-lg-5 mt-4 mt-sm-0">
              <h3>About Us</h3>
              <p style="text-align: justify;margin-top: 20px;"><span style="font-weight: bold;">HydroScape adalah</span>
                aplikasi e-commerce inovatif dengan pengetahuan mendalam tentang hidroponik yang menciptakan pengalaman
                unik bagi pengguna.</p>
            </div>
            <div class="col-md-3 me-lg-5 mt-4 mt-sm-0">
              <h3>Quick Links</h3>
              <ul class="p-0">
                <li><a href="#" class="text-dark">Beranda</a></li>
                <li><a href="#" class="text-dark">Track Pesanan</a></li>
                <li><a href="#" class="text-dark">Keranjang</a></li>
                <li><a href="#" class="text-dark">Profile</a></li>
              </ul>
            </div>
            <div class="col-md-4 mt-4 mt-sm-0 contact-us">
              <h3>Contact Us</h3>
              <ul class="p-0">
                <li><i class="fa-solid fa-school"></i> SV IPB University</li>
                <li><i class="fa-solid fa-phone"></i> +123456789</li>
                <li><i class="fa-solid fa-envelope"></i> nocturnalteam.tplb@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5 text-center">
        <p>
          &copy; Copyright 2023 all right reserved | Built by Nocturnal

        </p>
      </div>
    </div>
  </footer>
  <!-- Footer End -->

  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Bootstrap Script -->
  <!-- <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


  <!-- JS Custom -->
  <script src="script/script.js"></script>

  <script>
    $(document).ready(function () {
      $('.btn-first-keranjang').on('click', function () {
        var productCard = $(this).closest('.card-product');
        var productId = productCard.find('#product_id').val();
        var productBerat = productCard.find('#berat_produk').val();
        var productEmail = productCard.find('#email_produk').val();
        var productHarga = productCard.find('#harga_produk').val();
        var productName = productCard.find('.name-product').text();
        var productImage = productCard.find('img').attr('src');
        var productUnit = productCard.find('#unit').text();
        var productPrice = productCard.find('#price').text();

        $('#productTitle').text(productName);
        $('#productImage').attr('src', productImage);
        $('#modal-price').val(productPrice);
        $('#modal-unit').val(productUnit);

        $('#modal-name').val(productName);
        $('#modal-berat').val(productBerat);
        $('#modal-email').val(productEmail);
        $('#modal-harga').val(productHarga);

        $('#modal-product_id').val(productId);

        $('#cartModal').modal('show');
      });

      $('#addToCartButton').on('click', function () {
        // Trigger form submission
        $('#cartForm').submit();

        $('#cartModal').modal('hide');
      });
    });
  </script>
</body>

</html>