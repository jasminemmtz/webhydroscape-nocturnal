<?php
session_start();

if (empty($_SESSION['username'])) {
    header('Location: /login');
}

// Periksa apakah permintaan adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $id = $_POST['id'];
    $username = $_POST['username'];
    $usernamebaru = $_POST['usernamebaru'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    if ($username == $usernamebaru) {
        // Update data pengguna dengan username yang sama
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/updateUserById',
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'id' => $id,
                'username' => $usernamebaru,
                'email' => $email,
                'telepon' => $telepon
            )),
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        if ($response === false) {
            // Gagal mengirim permintaan
            die(curl_error($cUrl));
        }

        curl_close($cUrl);

        // Perbarui data sesi
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['telepon'] = $telepon;
        $_SESSION['username'] = $usernamebaru;
        $_SESSION['berhasil'] = 'Berhasil edit akun';
        unset($_SESSION['gagal']);
        header('Location: profile.php');
    } else {
        // Periksa apakah username baru sudah ada atau tidak
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getUserByUsername?username=' . $usernamebaru,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        if ($response === false) {
            // Gagal mengirim permintaan
            die(curl_error($cUrl));
        }

        $data = json_decode($response, true);

        curl_close($cUrl);

        if (isset($data['id'])) {
            // Username sudah tersedia
            $_SESSION['gagal'] = 'Gagal edit profile! Username sudah tersedia!';
            unset($_SESSION['berhasil']);
            header('Location: profile.php');
        } else {
            // Username belum tersedia, edit data
            $cUrl = curl_init();

            $options = array(
                CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/updateUserById',
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => http_build_query(array(
                    'id' => $id,
                    'username' => $usernamebaru,
                    'email' => $email,
                    'telepon' => $telepon
                )),
                CURLOPT_RETURNTRANSFER => true
            );

            curl_setopt_array($cUrl, $options);

            $response = curl_exec($cUrl);

            if ($response === false) {
                // Gagal mengirim permintaan
                die(curl_error($cUrl));
            }

            curl_close($cUrl);

            // Perbarui data sesi
            $_SESSION['username'] = $usernamebaru;
            $_SESSION['berhasil'] = 'Berhasil edit akun';
            unset($_SESSION['gagal']);
            header('Location: profile.php');
        }
    }
} else {
    // Redirect jika permintaan bukan POST
    header('Location: profile.php');
}
?>
