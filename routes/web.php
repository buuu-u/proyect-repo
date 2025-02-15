<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function (){
    return view('login');
});

Route::get('register', function (){
    return view('register');
});

Route::get('register-document', function (){
    return view('registerDocuments');
});

Route::get('/collection', function (){
    return view('collection');
});
