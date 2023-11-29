<?php
session_start();

    $username = $_GET['username'];
    $password = md5($_GET['password']);

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getUserByUsernamePassword?username=' . $username . '&password=' . $password,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => TRUE,
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);
 
    if ($response === false) {
        // Handle cURL error
        die('cURL Error: ' . curl_error($cUrl));
    }

    $data = json_decode($response);

    curl_close($cUrl);

    if (isset($data)) {
       // terdaftar
       $_SESSION['username'] = $_GET['username'];
       if ($data->username === 'admin') {
            header('Location: /admin');
            exit(); 
        } else {
            header('Location: /profile');
            exit(); 
        }

   } else {
       // tidak terdaftar
       echo '<script>alert("Pengguna tidak dapat ditemukan");</script>';
       echo '<script>window.location.href = "/login";</script>';
       exit(); 
   }

?>
