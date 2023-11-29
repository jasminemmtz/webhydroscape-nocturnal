<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIMAK</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="d-flex">
      <div class="col-xl-2 d-flex flex-column flex-shrink-0 p-3 text-bg-dark">
        <a href="/admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4 fw-bold">Admin Page</span>
        </a>
        <hr />
        <div class="dropdown pb-3">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fs-4 bi bi-person-circle me-2"></i>
            <span class="d-none d-sm-inline fw-bold">Admin</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <!-- <li><a class="dropdown-item" href="#">New project...</a></li> -->
            <li><a class="dropdown-item" href="/">Home</a></li>
            <li><a class="dropdown-item" href="/admin-profile">Profile</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a href="/signout" class="dropdown-item">Sign out</a></li>
          </ul>
        </div>
        <ul class="nav nav-pills flex-column mb-auto mt-2">
          <li>
            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link active text-white" aria-current="page">
              <i class="fs-4 bi-box-seam me-2"></i> <span class="d-none d-sm-inline">Produk</span>
            </a>
            <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
              <li class="w-100">
                <a href="/admin-tabel-buah" class="nav-link text-white"> <span class="d-none d-sm-inline">Buah</span></a>
              </li>
              <li>
                <a href="/admin-tabel-sayur" class="nav-link text-white"> <span class="d-none d-sm-inline">Sayur</span></a>
              </li>
            </ul>
          </li>
          <!-- <li>
            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link text-white"> <i class="fs-4 bi-collection me-2"></i> <span class="d-none d-sm-inline">Media</span> </a>
            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
              <li class="w-100">
                <a href="admin-tabel-video" class="nav-link text-white"> <span class="d-none d-sm-inline">Video</span></a>
              </li>
              <li>
                <a href="/admin-tabel-resep" class="nav-link text-white"> <span class="d-none d-sm-inline">Resep</span></a>
              </li>
            </ul>
          </li> -->
          <li>
            <a href="admin-pesanan" class="nav-link text-white"> <i class="fs-4 bi-table me-2"></i> <span class="d-none d-sm-inline">Grafik</span> </a>
          </li>
        </ul>
      </div>
      <!-- TABEL -->
      <div class="container mb-3">
        <div class="container text-white text-center bg-success my-3 p-4 rounded-3">
          <h1>HYDROSCAPE ADMIN</h1>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="script.js"></script>
  </body>
</html>
