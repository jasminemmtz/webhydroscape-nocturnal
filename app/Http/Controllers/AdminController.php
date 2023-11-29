<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    // ============= BUAH =============
    public function simpanBuah(Request $request)
    {

        $nama = $request->input('nama');
        $harga = $request->input('harga');
        $kategori = $request->input('kategori');
        $berat = $request->input('berat');
        $daya_tahan = $request->input('daya_tahan');
        $gizi = $request->input('gizi');
        $cara_menyimpan = $request->input('cara_menyimpan');

        // Insert operation
        $response = Http::post('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/insertBuah?nama='.urlencode($nama).'&harga='.urlencode($harga).'&kategori='.urlencode($kategori).'&berat='.urlencode($berat).'&daya_tahan='.urlencode($daya_tahan).'&gizi='.urlencode($gizi).'&cara_menyimpan='.urlencode($cara_menyimpan));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/admin-tabel-buah');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }

    public function updateBuah(Request $request)
    {
        $id = $request->input('id');
        $edit_nama = $request->input('edit_nama');
        $edit_harga = $request->input('edit_harga');
        $edit_kategori = $request->input('edit_kategori');
        $edit_berat = $request->input('edit_berat');
        $edit_daya_tahan = $request->input('edit_daya_tahan');
        $edit_gizi = $request->input('edit_gizi');
        $edit_cara_menyimpan = $request->input('edit_cara_menyimpan');

        // Insert operation
        $response = Http::put('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/updateBuahById?id='.urlencode($id).'&nama='.urlencode($edit_nama).'&harga='.urlencode($edit_harga).'&kategori='.urlencode($edit_kategori).'&berat='.urlencode($edit_berat).'&daya_tahan='.urlencode($edit_daya_tahan).'&gizi='.urlencode($edit_gizi).'&cara_menyimpan='.urlencode($edit_cara_menyimpan));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/admin-tabel-buah');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }

    public function deleteBuah($id){
        $response = Http::delete('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/deleteBuahById?id='.urlencode($id));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/admin-tabel-buah');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }


    // ============= SAYUR =============
    public function simpanSayur(Request $request)
    {

        $nama = $request->input('nama');
        $harga = $request->input('harga');
        $kategori = $request->input('kategori');
        $berat = $request->input('berat');
        $gizi = $request->input('gizi');
        $cara_menyimpan = $request->input('cara_menyimpan');

        // Insert operation
        $response = Http::post('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/insertSayur?nama='.urlencode($nama).'&harga='.urlencode($harga).'&kategori='.urlencode($kategori).'&berat='.urlencode($berat).'&gizi='.urlencode($gizi).'&cara_menyimpan='.urlencode($cara_menyimpan));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/admin-tabel-sayur');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }

    public function updateSayur(Request $request)
    {
        $id = $request->input('id');
        $edit_nama = $request->input('edit_nama');
        $edit_harga = $request->input('edit_harga');
        $edit_kategori = $request->input('edit_kategori');
        $edit_berat = $request->input('edit_berat');
        $edit_gizi = $request->input('edit_gizi');
        $edit_cara_menyimpan = $request->input('edit_cara_menyimpan');

        // Insert operation
        $response = Http::put('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/updateSayurById?id='.urlencode($id).'&nama='.urlencode($edit_nama).'&harga='.urlencode($edit_harga).'&kategori='.urlencode($edit_kategori).'&berat='.urlencode($edit_berat).'&gizi='.urlencode($edit_gizi).'&cara_menyimpan='.urlencode($edit_cara_menyimpan));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/admin-tabel-sayur');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }

    public function deleteSayur($id){
        $response = Http::delete('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/deleteSayurById?id='.urlencode($id));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/admin-tabel-sayur');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }
}
