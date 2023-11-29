<?php
    $id = $_GET['id'];
    $nama = $_GET['nama'];
    $harga = $_GET['harga'];
    $gizi = $_GET['gizi'];
    $kategori = $_GET['buah'];

    if (empty($id)) {
        // Insert
        $url = 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/InsertProduct';
        $customrequest = 'POST';
    } else {
        // Update
        $url = 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-nuzti/endpoint/updateDosenById';
        $customrequest = 'PUT';
    }

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_POSTFIELDS => http_build_query(array(
            'id' => $id,
            'nama' => $nama,
            'harga' => $harga,
            'kategori' => $kategori,
            'gizi' => $gizi
        ))
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    curl_close($cUrl);

    header('Location: tabel-buah.php');
?>