<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChartController extends Controller
{
    public function index(){
        session_start();
        $id = $_SESSION['id'];

        $response = Http::get('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getProductCart?id='.urlencode($id));
        
        if ($response->failed()) {

            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai

        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return view ('cart', ['result' => $response->json(), "id" => $id]);
        }

    }

    public function product_detail(Request $request){
        $id = $request->id;
        $response = Http::get('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getProducById?id='.urlencode($id));
        if ($response->failed()) {

            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai

        } else {
            session_start();
            $id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

            // Redirect ke halaman login atau halaman lain yang sesuai
            return view ('products.product-page', [
                'product' => $response->json()[0],
                "id" => $id
            ]);
        }

    }

    public function insert_cart(Request $request){
        session_start();

        $id = $_SESSION['id'];
        $nama_produk = $request->input('nama_produk');
        $harga_produk = $request->input('harga_produk');
        $berat = $request->input('berat');
        $email = $request->input('email');
        $quantity = $request->input('quantity');
        $unit = $request->input('unit');

        // Insert operation
        $response = Http::post('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/insertCart?id='.urlencode($id).'&nama_produk='.urlencode($nama_produk).'&harga_produk='.urlencode($harga_produk).'&berat='.urlencode($berat).'&email='.urlencode($email).'&quantity='.urlencode($quantity).'&unit='.urlencode($unit));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage;
        } else {
            echo "<script> alert('Tambah Cart berhasil')</script>";
            return redirect('/cart');
        }
    }

    public function transaksi_page(Request $request){
        session_start();
        $harga_produk = $_GET["harga_produk"];

        return view('pembayaran', [
            'harga_produk' => $harga_produk,
            'email' => $_SESSION["email"]
        ]);

    }

    public function transaksi(Request $request){

        $alamat_lengkap = $request->input('alamat_lengkap');
        $provinsi = $request->input('provinsi');
        $kota = $request->input('kota');
        $kodepos = $request->input('kodepos');
        $kurir = $request->input('kurir');
        $metode_pembayaran = $request->input('metode_pembayaran');
        $email = $request->input('email');

        $subtotal = $request->input('subtotal');
        $ongkos_kirim = 10000;
        $total = $request->input('total');

        // Insert operation
        $response = Http::post('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/insertTransaksi?alamat_lengkap='.urlencode($alamat_lengkap).'&kota='.urlencode($kota).'&kodepos='.urlencode($kodepos).'&kurir='.urlencode($kurir).'&metode_pembayaran='.urlencode($metode_pembayaran).'&subtotal='.urlencode($subtotal).'&ongkos_kirim='.urlencode($ongkos_kirim).'&total='.urlencode($total).'&email='.urlencode($email).'&provinsi='.urlencode($provinsi));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage;
        } else {
            echo "<script> alert('Transaksi berhasil')</script>";
            return redirect('/');
        }
    }

    public function deleteCart(Request $request){
        $response = Http::delete('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/deleteCart?id='.urlencode($request->id));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/cart');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }

}
