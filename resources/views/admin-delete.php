<?php
    $id = $_GET['id'];

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-nuzti/endpoint/deleteDosenById?id='.$id,
        CURLOPT_CUSTOMREQUEST => 'DELETE'
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    curl_close($cUrl);

    // if ($response) {
    //     echo 'Berhasil';
    // } else {
    //     echo 'Gagal';
    // }

    header('Location: index.php');
?>