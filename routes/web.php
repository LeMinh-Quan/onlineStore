<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
$viewData = [];
$viewData["title"] = "Trang chu - Online Store";
return view('home.index')->with("viewData", $viewData);
});

Route::get('/home', function () {
    return view('home');
})->name('home');
