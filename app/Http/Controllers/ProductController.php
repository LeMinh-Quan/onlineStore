<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
     public function index()  
    { 
        $viewData = [];
     $viewData["title"] = "Products - Online Store"; 
        $viewData["subtitle"] = "Danh sách sản phẩm.";  
        $viewData["products"] = Product::all();  
        return view('product.index')->with("viewData", $viewData); 
    }

  public function show($id)
  {
    $viewData = [];
    $product = Product::findOrFail($id);
    $viewData["title"] =   $product->getName()." - Online Store"; 
$viewData["subtitle"] =   $product->getName()." - Thông tin sản phẩm."; 
    $viewData["product"] = $product;
    return view('product.show')->with("viewData", $viewData);
  }

}