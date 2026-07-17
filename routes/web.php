<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
$viewData = [];
$viewData["title"] = "Trang chu - Online Store";
return view('home.index')->with("viewData", $viewData);
});

Route::get('/about', function () {


$viewData = [];
$viewData["title"] = "Trang chu - Online Store";
$viewData["subtitle"] = "About";
$viewData["description"] = "Day la trang ve chung toi";
$viewData["author"] = "yeu vo ban";
return view('home.about')->with("viewData", $viewData);

})->name('home.about');



Route::get('/home', function () {
    return view('home');
})->name('home');
