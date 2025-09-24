<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Auth
Route::namespace('App\Http\Controllers\Auth')->name('auth.')->group(function() {
    
    // Login
    Route::get('/login', 'LoginController@index')->name('login.index');
    Route::post('/login', 'LoginController@authenticate')->name('login.authenticate');
    
    // Register
    Route::get('/register', 'RegisterController@index')->name('register.index');
    Route::post('/register', 'RegisterController@request')->name('register.request');
    
    // Logout
    Route::post('/logout', 'LogoutController@logout')->name('logout');
});

Route::middleware('auth')->namespace('App\Http\Controllers\Dashboard')->prefix('dashboard')->name('dashboard.')->group(function() {
    
    // SPMI
    Route::middleware(['role:admin,auditor'])->namespace('Spmi')->prefix('spmi/{upps}')->name('spmi.')->group(function() {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/profil-upps', 'ProfilUppsController@index')->name('profil-upps');
        
        // Evaluasi
        Route::namespace('Evaluasi')->prefix('evaluasi')->name('evaluasi.')->group(function() {
            Route::get('/evaluasi-lain', 'EvaluasiLainController@index')->name('evaluasi-lain');
            Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa');
            Route::get('/dosen', 'DosenController@index')->name('dosen');
        });
        
        Route::get('/pelaksanaan', 'PelaksanaanController@index')->name('pelaksanaan');
        
        // Penetapan
        Route::namespace('Penetapan')->prefix('penetapan')->name('penetapan.')->group(function() {
            Route::get('/kebijakan-spmi', 'KebijakanSpmiController@index')->name('kebijakan-spmi');
            Route::get('/standar-perguruan-tinggi', 'StandarPerguruanTinggiController@index')->name('standar-perguruan-tinggi');
            Route::get('/standar-yang-ditetapkan-institusi', 'StandarYangDitetapkanInstitusiController@index')->name('standar-yang-ditetapkan-institusi');
            Route::get('/standar-lain', 'StandarLainController@index')->name('standar-lain');
        });
        
        Route::get('/pengendalian', 'PengendalianController@index')->name('pengendalian');
        Route::get('/peningkatan', 'PeningkatanController@index')->name('peningkatan');
    });
    
    // MONEV
    Route::middleware(['role:admin,auditor'])->namespace('Monev')->prefix('monev/{upps}')->name('monev.')->group(function() {
        Route::get('/', 'IndexController@index')->name('index');
        Route::get('/{slug}/test', 'IndexController@show')->name('show');
    });
    
    // AMI
    Route::namespace('Ami')->prefix('ami')->name('ami.')->group(function() {
        Route::get('/', 'IndexController@index')->name('index');
    });
    
    // Akreditas
    Route::namespace('Akreditasi')->prefix('akreditasi')->name('akreditasi.')->group(function() {
        Route::get('/', 'IndexController@index')->name('index');
    });
    
    // Perengkingan
    Route::namespace('Perengkingan')->prefix('perengkingan')->name('perengkingan.')->group(function() {
        Route::get('/', 'IndexController@index')->name('index');
    });
    
    // Admin
    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
        
        // Register
        Route::prefix('register')->name('register.')->group(function() {
            Route::get('/', 'RegisterController@index')->name('index');
            Route::get('/role', 'RegisterController@role')->name('role');
            Route::get('/upps', 'RegisterController@upps')->name('upps');
            Route::get('/jenjang', 'RegisterController@jenjang')->name('jenjang');
            Route::get('/program-studi', 'RegisterController@programStudi')->name('program-studi');
            Route::get('/user', 'RegisterController@user')->name('user');
        });
        
        // SPMI
        Route::prefix('spmi')->name('spmi.')->group(function() {
            Route::get('/standar-yang-ditetapkan-institusi', 'SpmiController@standarYangDitetapakanInstitusi')->name('standar-yang-ditetapkan-institusi');
            Route::get('/standar-lain', 'SpmiController@standarLain')->name('standar-lain');
            Route::get('/pelaksanaan', 'SpmiController@pelaksanaan')->name('pelaksanaan');
            Route::get('/evaluasi', 'SpmiController@evaluasi')->name('evaluasi');
            Route::get('/peningkatan', 'SpmiController@peningkatan')->name('peningkatan');
            Route::get('/pengendalian', 'SpmiController@pengendalian')->name('pengendalian');
        });
    });
});
