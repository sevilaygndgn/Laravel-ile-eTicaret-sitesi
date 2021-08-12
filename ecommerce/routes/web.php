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


Route::group([ 'prefix' => 'yonetim', 'namespace' => 'Yonetim'], function () {

  Route::get('/oturumac','KullaniciController@getoturumac')->name('yonetim.getoturumac');
	Route::post('/oturumac','KullaniciController@postoturumac')->name('yonetim.postoturumac');
 

  Route::group(['middleware' => 'yonetim'], function () {
    Route::get('/anasayfa', 'AnasayfaController@index')->name('yonetim.anasayfa'); 
    Route::post('/anasayfa', 'AnasayfaController@index')->name('yonetim.anasayfa'); 

    Route::group(['prefix' => 'kullanici'], function () {
      Route::match(['get', 'post'], '/', 'KullaniciController@index')->name('yonetim.kullanici');
    
    });

    Route::group(['prefix' => 'kategori'], function () {
      Route::match(['get', 'post'], '/', 'KategoriController@index')->name('yonetim.kategori');
      Route::get('/yeni', 'KategoriController@form')->name('yonetim.kategori.yeni');
      Route::get('/duzenle/{id}', 'KategoriController@form')->name('yonetim.kategori.duzenle');
      Route::post('/kaydet/{id?}', 'KategoriController@kaydet')->name('yonetim.kategori.kaydet');
      Route::get('/sil/{id}', 'KategoriController@sil')->name('yonetim.kategori.sil');
    });

    Route::group(['prefix' => 'urun'], function () {
      Route::match(['get', 'post'], '/', 'UrunController@index')->name('yonetim.urun');
      Route::get('/yeni', 'UrunController@form')->name('yonetim.urun.yeni');
      Route::get('/duzenle/{id}', 'UrunController@form')->name('yonetim.urun.duzenle');
      Route::post('/kaydet/{id?}', 'UrunController@kaydet')->name('yonetim.urun.kaydet');
      Route::get('/sil/{id}', 'UrunController@sil')->name('yonetim.urun.sil');
    });

  });

});



Route::get('/anasayfa','AnasayfaController@getAnasayfa')->name('anasayfa');

Route::get('/kategori/{slug_kategoriadi}','KategoriController@getKategori')->name('kategori');
Route::get('/urun/{slug_urunadi}','UrunController@getUrun')->name('urun');
Route::get('/sepet','SepetController@getSepet')->name('sepet');
Route::get('/odeme','OdemeController@getOdeme')->name('odeme');
Route::get('/siparisler','SiparisController@getSiparisler')->name('siparisler');
Route::get('/siparisler/{id}','SiparisController@detay')->name('siparis');
Route::post('/ara','UrunController@ara')->name('urun_ara');
Route::get('/ara','UrunController@ara')->name('urun_ara');


Route::get('/kullanici/oturumac','KullaniciController@giris_form')->name('kullanici.oturumac');
Route::get('/kullanici/kaydol','KullaniciController@kaydol_form')->name('kullanici.kaydol');

Route::get('/','SiteController@getIndex')->name('site.getIndex')->middleware('user');



Route::group(['middleware' => ['guest']], function () {
	Route::get('/login','AuthController@getLogin')->name('site.getLogin');
  Route::post('/login','AuthController@postLogin')->name('site.postLogin');
  Route::get('/register','AuthController@getRegister')->name('site.getRegister');
  Route::post('/register','AuthController@postRegister')->name('site.postRegister');
});


Route::group(['middleware' => ['user']], function () {

	Route::get('/kullanici-ozel','ProfileController@getProfile')->name('site.getProfile');
	Route::get('/logout','AuthController@getLogout')->name('site.getLogout');

});



/* Route::get('/admin', 'AdminController@getAdmin')->name('yonetim.getadmin');
Route::post('/admin', 'AdminController@postAdmin')->name('yonetim.postadmin');

Route::group(['middleware' => ['admin']], function () {
Route::get('/admin-panel', 'AdminController@getAdminPanel')->name('yonetim.admin-panel');
});  */

