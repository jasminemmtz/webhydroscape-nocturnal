<?php
    session_start();

    if(empty($_SESSION['username'])){
        header('Location: /login');
    }
    unset($_SESSION['gagal'], $_SESSION['berhasil'], $_SESSION['gagalp'], $_SESSION['berhasilp']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="style/profile.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" />
		<link
			  rel="stylesheet"
			  href="https://unpkg.com/swiper/swiper-bundle.min.css"
			/>
		<link
			href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
			rel="stylesheet"
		  />
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
				<a href="/"><span style="margin-right: 10px; margin-left: 10px;"><i class="fa-solid fa-house" style="margin-right: 5px;"></i></span></a>
				<a href="/cart"><span style="margin-right: 10px;"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;"></i></span></a>
				<a href="/profile"><span><i class="fa-solid fa-user" style="margin-right: 5px;"></i></span></a>
            </form>
          </div>
          
        </div>
        
      
    </nav>
    
    
<div class="container d-flex justify-content-center" style="margin-top: 70px;" >
	<div class="card mt-5 pb-3">
    <?php
// Ambil username dari session
$username = $_SESSION['username'];

// URL endpoint HTTP
$endpoint_url = 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getUserByUsername?username=' . urlencode($username);

// Mendapatkan data dari endpoint menggunakan cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response_json = curl_exec($ch);
curl_close($ch);

// Menangani respons JSON
$response_data = json_decode($response_json, true);

// Menampilkan data jika respons sukses
if ($response_data && isset($response_data['email']) && isset($response_data['telepon'])) {
    $email = $response_data['email'];
    $telepon = $response_data['telepon'];

    echo '<div class="media">';
    echo '<img src="img/foto_profile.jpg" class="mr-3 rounded-circle" height="80">';
    echo '<div class="media-body">';
    echo '<h5 class="mt-1 mb-0">' . $_SESSION['username'] . '</h5>';
    echo '<span class="text-muted">' . $email . '</span><br>';
    echo '<span class="text-muted">' . $telepon . '</span><br>';
    echo '<p class="pt-1"><a href="javascript:void(0);" class="pt-1" id="edit_profile" title="Edit Profile">Edit Profile</a></p>';
    echo '</div>';
    echo '</div>';
} else {
    // Handle error ketika tidak dapat mendapatkan data dari endpoint
    echo 'Error: Tidak dapat mengambil data pengguna.';
}
?>

            <!-- <a href="/riwayat"><div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3">
                <div class="d-flex flex-row align-items-center"><i class="fas fa-calendar-o"></i>
                    <div class="d-flex flex-row align-items-start ml-3" style="color: black;" ><span>Riwayat Pesanan</span></div>
                </div>
                <div class="d-flex flex-row align-items-center mt-2"><i class="fas fa-angle-right"></i></div>
            </div></a> -->

            <a href="/alamat"><div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3">
                <div class="d-flex flex-row align-items-center"><i class="fas fa-location-arrow"></i>
                    <div class="d-flex flex-row align-items-start ml-3" style="color: black;"><span>Alamat Tersimpan</span></div>
                </div>
                <div class="d-flex flex-row align-items-center mt-2"><i class="fas fa-angle-right preview"></i></div>
            </div></a>

             <a href="https://wa.me//6281347831200/?text=Halo Admin, saya perlu bantuan"><div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3">
                <div class="d-flex flex-row align-items-center"><i class="fas fa-phone"></i>
                    <div class="d-flex flex-row align-items-start ml-3" style="color: black;"><span>Customer Service</span></div>
                </div>
                <div class="d-flex flex-row align-items-center mt-2"><i class="fas fa-angle-right"></i></div>
            </div></a>
            <a href="/signout"><div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3 sample">
                <div class="d-flex flex-row align-items-center"><i class="fa fa-sign-out"></i>
                    <div class="d-flex flex-row align-items-start ml-3"><span>Log Out</span></div>
                </div>
            </div></a>
	</div>
</div>
<div class="col-lg-12 d-none d-lg-block image-container" style="background: url('img/bg\ profile.png') center no-repeat;
    height: 600px;width: 1500px; margin-left: 0px; margin-right: 0px; margin-top: -560px;z-index: -1;"></div>  

    <!-- modal -->
    <div class="modal fade" id="modalAkun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAkun" action="/editprofile" method="post">
                @csrf
                <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['username'] ?>">
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="number" class="form-control" id="telepon" name="telepon"  placeholder="Telepon" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success" form="formAkun">Simpan</button>
            </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            $('#edit_profile').click(function(){
                console.log('Edit button clicked');
                var username = $('#username').val();
                console.log('Username:', username);  // This line gets the value of an input with id 'username'
                $('#modalAkun').modal('show');
            
                $.ajax({
                    url: 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getUserByUsername?username=' + username,  // Here, you need to fix the URL
                    type: 'GET',
                    success: function(res) {
                        console.log('Response from server:', res);

                        if (res.email && res.telepon) {
                            $('#id').val(res._id);
                            $('#username').val(res.username);
                            $('#email').val(res.email);
                            $('#telepon').val(res.telepon);
                        } else {
                            console.error('Invalid server response:', res);
                            // Handle the case where the server response is not as expected
                        }
                    },

                    error: function (err){
                        console.log(err);
                    }
                })
            });

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>