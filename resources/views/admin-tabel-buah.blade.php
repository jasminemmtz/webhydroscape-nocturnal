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
                <a href="/admin-tabel-video" class="nav-link text-white"> <span class="d-none d-sm-inline">Video</span></a>
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
          <h1>TABEL BUAH</h1>
        </div>
        <a href="javascript:void(0);" class="btn btn-primary btn-m rounded-pill my-3" id="add">Tambah</a>

        <table class="table table-striped">
          <thead>
            <tr class="table-dark">
              <th>Aksi</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Kategori</th>
              <th>Berat</th>
              <th>Daya Tahan</th>
              <th>Gizi</th>
              <th>Cara Menyimpan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $cUrl = curl_init();

            $options = array(
                CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getAllBuah',
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_RETURNTRANSFER => true
            );

            curl_setopt_array($cUrl, $options);
            
            $response = curl_exec($cUrl);

            $data = json_decode($response);
            
            curl_close($cUrl);

            foreach ($data as $row) :
              echo '<tr>
              <td>
              <a href="javascript:void(0);" class="btn btn-warning btn-sm edit" data-id="'.$row->_id.'">Ubah</a>
              <a href="'.route('delete-buah', ['id' => $row->_id]).'" class="btn btn-danger mt-1 delete-btn btn-sm" onclick="return confirm(\'Apakah anda yakin akan menghapus data?\');">Hapus</a>
              </td>
              <td>' . (empty($row->nama) ? '' : $row->nama) . '</td>
              <td>' . (empty($row->harga) ? '' : $row->harga) . '</td>
              <td>' . (empty($row->kategori) ? '' : $row->kategori) . '</td>
              <td>' . (empty($row->berat) ? '' : $row->berat) . '</td>
              <td>' . (empty($row->daya_tahan) ? '' : $row->daya_tahan) . '</td>
              <td>' . (empty($row->gizi) ? '' : $row->gizi) . '</td>
              <td>' . (empty($row->cara_menyimpan) ? '' : $row->cara_menyimpan) . '</td>
              </tr>';
            endforeach;

            if (empty($data)) {
              echo '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>';
            }
            ?>
          </tbody>
          
        </table>
        <!-- =========== MODAL FORM TAMBAH BUAH =========== -->

        <div class="modal fade" id="modalBuahTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Buah</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="formBuahTambah" action="/simpan-buah" method="post">
                          @csrf
                          <div class="mb-3">
                              <label for="nama" class="form-label">Nama Buah</label>
                              <input type="text" class="form-control" id="nama" name="nama"
                                  placeholder="nama" required>
                          </div>
                          <div class="mb-3">
                              <label for="harga" class="form-label">Harga Buah</label>
                              <input type="number" class="form-control" id="harga" name="harga"
                                  placeholder="harga" required>
                          </div>
                          <div class="mb-3">
                            <label for="kategori" class="form-label">kategori Buah</label>
                            <input type="text" class="form-control" id="kategori" name="kategori"
                                placeholder="kategori" required>
                          </div>
                          <div class="mb-3">
                            <label for="berat" class="form-label">berat Buah</label>
                            <input type="text" class="form-control" id="berat" name="berat"
                                placeholder="berat" required>
                          </div>
                          <div class="mb-3">
                            <label for="daya_tahan" class="form-label">daya_tahan Buah</label>
                            <input type="text" class="form-control" id="daya_tahan" name="daya_tahan"
                                placeholder="daya_tahan" required>
                          </div>
                          <div class="mb-3">
                            <label for="gizi" class="form-label">gizi Buah</label>
                            <input type="text" class="form-control" id="gizi" name="gizi"
                                placeholder="gizi" required>
                          </div>
                          <div class="mb-3">
                            <label for="cara_menyimpan" class="form-label">cara menyimpan Buah</label>
                            <input type="text" class="form-control" id="cara_menyimpan" name="cara_menyimpan"
                                placeholder="cara_menyimpan" required>
                          </div>
                          
                      </form>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button id="save" type="submit" class="btn btn-success" form="formBuahTambah">Simpan</button>
                      </div>
                  </div>
              </div>
          </div>
        </div>

        <!-- =========== MODAL EDIT =========== -->

        <div class="modal fade" id="modalBuahEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Buah</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="formBuahEdit" action="/update-buah" method="post">
                          @csrf
                          <div class="mb-3">
                              <label for="nama" class="form-label">Nama Buah</label>
                              <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                  placeholder="edit_nama" required>
                              <input type="hidden" id="id" name="id">
                          </div>
                          <div class="mb-3">
                              <label for="harga" class="form-label">Harga Buah</label>
                              <input type="number" class="form-control" id="edit_harga" name="edit_harga"
                                  placeholder="edit_harga" required>
                          </div>
                          <div class="mb-3">
                            <label for="kategori" class="form-label">kategori Buah</label>
                            <input type="text" class="form-control" id="edit_kategori" name="edit_kategori"
                                placeholder="edit_kategori" required>
                          </div>
                          <div class="mb-3">
                            <label for="berat" class="form-label">berat Buah</label>
                            <input type="text" class="form-control" id="edit_berat" name="edit_berat"
                                placeholder="edit_berat" required>
                          </div>
                          <div class="mb-3">
                            <label for="daya_tahan" class="form-label">daya_tahan Buah</label>
                            <input type="text" class="form-control" id="edit_daya_tahan" name="edit_daya_tahan"
                                placeholder="edit_daya_tahan" required>
                          </div>
                          <div class="mb-3">
                            <label for="gizi" class="form-label">gizi Buah</label>
                            <input type="text" class="form-control" id="edit_gizi" name="edit_gizi"
                                placeholder="edit_gizi" required>
                          </div>
                          <div class="mb-3">
                            <label for="cara_menyimpan" class="form-label">cara menyimpan Buah</label>
                            <input type="text" class="form-control" id="edit_cara_menyimpan" name="edit_cara_menyimpan"
                                placeholder="edit_cara_menyimpan" required>
                          </div>
                          
                      </form>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button id="save" type="submit" class="btn btn-success" form="formBuahEdit">Simpan</button>
                      </div>
                  </div>
              </div>
          </div>
        </div>

      </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#add').click(function () {
              $('#modalBuahTambah').modal('show');

              $('#id').val('');
              $('#nama').val('');
              $('#harga').val('');
              $('#kategori').val('');
              $('#berat').val('');
              $('#daya_tahan').val('');
              $('#gizi').val('');
              $('#cara_menyimpan').val('');
            });

            // $('#save').click(function () {

            //     var url = 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpointinsertBuah';
            //     var type = 'POST';
              
            //     $.ajax({
            //         url: url,
            //         type: type,
            //         async: false,
            //         data: {
            //             nama: $('#nama').val(),
            //             harga: $('#harga').val(),
            //             kategori: $('#kategori').val(),
            //             berat: $('#berat').val(),
            //             daya_tahan: $('#daya_tahan').val(),
            //             gizi: $('#gizi').val(),
            //             cara_menyimpan: $('#cara_menyimpan').val(),
            //         },
            //         success: function () {
            //             $('#cancel').click();

            //             loadMahasiswa();
            //         },
            //         error: function (err) {
            //             console.log(err);
            //         }
            //     });
            // });

            $('.edit').click(function(){
                console.log('Edit button clicked');
                var id = $(this).data('id');
            
                $.ajax({
                    url: 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getBuahById?id=' + id,
                    type: 'GET',
                    success: function(res){
                        var data = res[0];
                        $('#modalBuahEdit').modal('show');
            
                        $('#id').val(data._id);
                        $('#edit_nama').val(data.nama);
                        $('#edit_harga').val(data.harga);
                        $('#edit_kategori').val(data.kategori);
                        $('#edit_berat').val(data.berat);
                        $('#edit_daya_tahan').val(data.daya_tahan);
                        $('#edit_gizi').val(data.gizi);
                        $('#edit_cara_menyimpan').val(data.cara_menyimpan);
                    },
                    error: function (err){
                        console.log(err);
                    }
                })
            });

        });

    </script>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="form-tambah.js"></script>
  </body>
</html>
