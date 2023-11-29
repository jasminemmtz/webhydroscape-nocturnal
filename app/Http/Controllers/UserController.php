<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use mysqli;

class UserController extends Controller
{
    public function index(){
        session_start();
        
        if(!isset($_SESSION['id'])){
            $id = null;
            $email = null;
        } else {
            $id = $_SESSION['id'];
            $email = $_SESSION['email'];
        }

        $response = Http::get('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getAllProducts');
        if ($response->failed()) {

            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai

        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return view ('index', ['result' => $response->json(), "id" => $id, "email" => $email]);
        }

    }

    public function login(Request $request){
        session_start();

        $username = $_GET['username'];
        $password = md5($_GET['password']);

        $response = Http::get('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getUserByUsernamePassword?username='.urlencode($username).'&password='.urlencode($password));

        if ($response->failed()) {

            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai

        } else {
            $data = json_decode($response);

            if (isset($data)) {

                // terdaftar
                $_SESSION['username'] = $_GET['username'];
                $_SESSION['id'] = $response->json()[0]['_id'];
                $_SESSION['email'] = $response->json()[0]['email'];

                if ($response->json()[0]['username'] === 'admin') {
                    return redirect('/admin');
                } else {
                    return redirect('/profile');
                }

            } else {
                // tidak terdaftar
                echo '<script>alert("Pengguna tidak dapat ditemukan");</script>';
                echo '<script>window.location.href = "/login";</script>';
                exit(); 
            }
        }
    }

    public function register(Request $request){
        session_start();

        // if(empty($_SESSION['email'])) {
        //     return redirect('/login');
        // }
    
        $username = $_GET['username'];
        $email = $_GET['email'];
        $telepon = $_GET['telepon'];
        $password = md5($_GET['password']);

        // Insert operation
        $response = Http::post('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/insertUser?username='.urlencode($username).'&email='.urlencode($email).'&telepon='.urlencode($telepon).'&password='.urlencode($password));

        if ($response->failed()) {

            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai

        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/login');
        }
    }

    public function editProfile(Request $request)
    {

        session_start();
        
        $id = $request->input('id');
        $username = $request->input('username');
        $email = $request->input('email');
        $telepon = $request->input('telepon');

        // Insert operation
        $response = Http::put('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/updateUserById?id=' . $id . '&username=' . urlencode($username) . '&email=' . urlencode($email) . '&telepon=' . urlencode($telepon));


        if ($response->failed()) {  
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            session_write_close();
            return redirect('/profile');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }

    public function detail_alamat (Request $request){
        session_start();
        $id = $_SESSION['id'];
        $response = Http::get('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getAlamatById?id='.urlencode($id));

        if ($response->failed()) {

            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai

        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            $status = false;
            $data = [
                'alamat' => $response->json(), 
                'status' => $status
            ];

            if(isset($_GET['id'])){
                $data['status'] = true;
            }

            return view ('alamat', $data);
        }
    }

    public function save_alamat(Request $request){
        session_start();
        $id = $_SESSION['id'];
        $nama = $request->input('nama');
        $telp = $request->input('telp');
        $alamat = $request->input('alamat');

        // Insert operation
        $response = Http::post('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/insertAlamat?id='.urlencode($id).'&nama='.urlencode($nama).'&telp='.urlencode($telp).'&alamat='.urlencode($alamat));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage;
        } else {
            echo "<script> alert('Tambah alamat berhasil')</script>";
            return redirect('/profile');
        }
    }

    public function update_alamat(Request $request){
        $id = $request->input('id');
        $nama = $request->input('nama');
        $telp = $request->input('telp');
        $alamat = $request->input('alamat');
        // Insert operation
        $response = Http::post('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/updateAlamat?id='.urlencode($id).'&nama='.urlencode($nama).'&telp='.urlencode($telp).'&alamat='.urlencode($alamat));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage;
        } else {
            echo "<script> alert('Ubah alamat berhasil')</script>";
            return redirect('/profile');
        }
    }

    public function jadikan_alamat_utama(Request $request){
        $id = $request->input('selectedAddress');
        $value = 1;

        // Insert operation
        $response = Http::post('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/updateAlamatToUtama?value='.urlencode($value).'&id='.urlencode($id));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage;
        } else {
            echo "<script> alert('Ubah alamat berhasil')</script>";
            return redirect('/profile');
        }
    }
}
