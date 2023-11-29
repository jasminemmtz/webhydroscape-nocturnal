<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ========== User Page ==========

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'App\Http\Controllers\UserController@index');

Route::prefix('products')->group(function () {
    Route::get("", function () {
        return view('products.index');
    });

    // Route::get("{id}", function (string $id) {
    //     return view('products.product-page', ['id' => $id]);
    // });
    Route::get('{id}', 'App\Http\Controllers\ChartController@product_detail');
});

Route::post('/cart/store', function () {
    return view('cart.store');
});



// Route::get('/ordertracking', function () {
//     return view('ordertracking');
// });

// Route::get('/cart', function () {
//     return view('cart');
// });

Route::get('/cart', 'App\Http\Controllers\ChartController@index');
Route::get('/transaksi_page', 'App\Http\Controllers\ChartController@transaksi_page');
Route::post('/insert_cart', 'App\Http\Controllers\ChartController@insert_cart');
Route::post('/transaksi', 'App\Http\Controllers\ChartController@transaksi');
Route::get('/delete_cart/{id}', 'App\Http\Controllers\ChartController@deleteCart');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/sayur', function () {
    return view('sayur');
});

Route::get('/buah', function () {
    return view('buah');
});

Route::get('/sayur', function () {
    return view('sayur');
});

// Route::get('/pembayaran/{value}', function () {
//     return view('pembayaran');
// });

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/riwayat', function () {
    return view('riwayat');
});

// Route::get('/alamat', function () {
//     return view('alamat');
// });

Route::get('/alamat', 'App\Http\Controllers\UserController@detail_alamat');

Route::post('/jadikan_alamat_utama', 'App\Http\Controllers\UserController@jadikan_alamat_utama');
Route::post('/save_alamat', 'App\Http\Controllers\UserController@save_alamat');
Route::post('/update_alamat', 'App\Http\Controllers\UserController@update_alamat');

Route::get('/services', function () {
    return view('services');
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
});

Route::get('/riwayat', function () {
    return view('riwayat');
});

// Route::get('/datasave', function () {
//     return view('datasave');
// });

Route::get('/datasave', 'App\Http\Controllers\UserController@register');

Route::get('/chat', function () {
    return view('chat');
});

// Route::get('/riwayat', function () {
//     return view('riwayat');
// });

// Recipe

Route::get('/recipe', function () {
    return view('recipe');
});

Route::get('/jusjeruk', function () {
    return view('jusjeruk');
});

Route::get('/tunaprancis', function () {
    return view('tunaprancis');
});

Route::get('/supayam', function () {
    return view('supayam');
});

Route::get('/tumisbayam', function () {
    return view('tumisbayam');
});

Route::get('/tumiskangkung', function () {
    return view('tumiskangkung');
});

Route::get('/osengsapi', function () {
    return view('osengsapi');
});

Route::get('/videotour', function () {
    return view('videotour');
});

// Route::get('/signin', function () {
//     return view('signin');
// });

Route::get('/signin', 'App\Http\Controllers\UserController@login');

Route::get('/signout', function () {
    return view('signout');
});

Route::get('/signout-admin', function () {
    return view('signout-admin');
});



// ========== Admin Page ==========

Route::get('/admin', function () {
    return view('admin-index');
});

Route::get('/admin-tabel-buah', function () {
    return view('admin-tabel-buah');
});

Route::get('/admin-tabel-resep', function () {
    return view('admin-tabel-resep');
});

Route::get('/admin-tabel-sayur', function () {
    return view('admin-tabel-sayur');
});

Route::get('/admin-tabel-video', function () {
    return view('admin-tabel-video');
});

Route::get('/pesanan', function () {
    return view('pesanan');
});

Route::get('/admin-profile', function () {
    return view('admin-profile');
});

Route::get('/admin-pesanan', function () {
    return view('admin-pesanan');
});

// ========== Sayur & Buah ==========

Route::get('/anggur-merah', function () {
    return view('anggur-merah');
});

Route::get('/blackberry', function () {
    return view('blackberry');
});

Route::get('/baby-pokcoy', function () {
    return view('baby-pokcoy');
});

Route::get('/bayam-hijau', function () {
    return view('bayam-hijau');
});

Route::get('/cabai-merah', function () {
    return view('cabai-merah');
});

Route::get('/caisim', function () {
    return view('caisim');
});

Route::get('/daun-kemangi', function () {
    return view('daun-kemangi');
});

Route::get('/daun-ketumbar', function () {
    return view('daun-ketumbar');
});

Route::get('/curly-kale', function () {
    return view('curly-kale');
});

Route::get('/kembang-kol', function () {
    return view('kembang-kol');
});

Route::get('/kangkung', function () {
    return view('kangkung');
});

Route::get('/melon-greeniegal', function () {
    return view('melon-greeniegal');
});

Route::get('/mizuna', function () {
    return view('mizuna');
});

Route::get('/selada-keriting', function () {
    return view('selada-keriting');
});

Route::get('/selada-romaine', function () {
    return view('selada-romaine');
});

Route::get('/semangka-merah', function () {
    return view('semangka-merah');
});

Route::get('/strawberry-celeb', function () {
    return view('strawberry-celeb');
});

Route::get('/strawberry', function () {
    return view('strawberry');
});

Route::get('/timun', function () {
    return view('timun');
});

Route::get('/tomat-cherry', function () {
    return view('tomat-cherry');
});

// ========== User Control ==========
Route::post('/editprofile', 'App\Http\Controllers\UserController@editProfile');

// ========== Admin Control ==========
Route::post('/simpan-buah', 'App\Http\Controllers\AdminController@simpanBuah');
Route::post('/update-buah', 'App\Http\Controllers\AdminController@updateBuah');
Route::get('/delete-buah/{id}', 'App\Http\Controllers\AdminController@deleteBuah')->name('delete-buah');

Route::post('/simpan-sayur', 'App\Http\Controllers\AdminController@simpanSayur');
Route::post('/update-sayur', 'App\Http\Controllers\AdminController@updateSayur');
Route::get('/delete-sayur/{id}', 'App\Http\Controllers\AdminController@deleteSayur')->name('delete-sayur');
