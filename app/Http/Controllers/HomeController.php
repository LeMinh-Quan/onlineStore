<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Trang chu - Online Store";
        return view('home.index') -> with("viewData", $viewData);
    }

    public function about()
    {
        // $data1 = "Gioi thieu - Online Store";
        // $data2 = "Gioi thieu";
        // $description = "Day la trang about gioi thieu!";
        // $author = "Phat trien boi: OnlyU.";
        // return view('home.about')
        //     -> with('title', $data1)
        //     -> with ('subtitle', $data2)
        //     -> with('description', $description)
        //     -> with('author', $author);

        $viewData = [];
        $viewData["title"] = "Gioi thieu - Online Store";
        $viewData["subtitle"] = "Gioi thieu";
        $viewData["description"] = "Day la trang gioi thieu!";
        $viewData["author"] = "Phat trien boi: OnlyU";
        return view('home.about')->with("viewData", $viewData);
    }
}
