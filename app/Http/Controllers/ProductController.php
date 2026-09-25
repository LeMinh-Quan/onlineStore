<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; 

class ProductController extends Controller
{
    //  public function index()  
    // { 
    //     $viewData = [];
    //     $viewData["title"] = "Products - Online Store"; 
    //     $viewData["subtitle"] = "Danh sách sản phẩm.";  
    //     $viewData["products"] = Product::all();  
    //     return view('product.index')->with("viewData", $viewData); 
    // }

    // public function index()
    // {
    //     $products = Product::latest()->paginate(10);

    //     return view('product.index', compact('products'));
    // }
    public function index()
{
    // TỐI ƯU HÓA: Sử dụng with('category') để Eager Loading
    $products = Product::with('category')->latest()->paginate(10);

    return view('product.index', compact('products'));
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
    public function create()
    {
        Gate::authorize('create', Product::class);

        $categories = Category::orderBy('name')->get();

        return view('product.create', compact('categories'));
    }

    // Xử lý khi submit form
    // public function store(Request $request)
    // {
    //     // Lấy dữ liệu từ form
    //     $name = $request->input('product_name');
    //     $price = $request->input('product_price');

    //     // Biến chứa đường dẫn ảnh
    //     $imagePath = '';

    //     // Kiểm tra có upload ảnh hay không
    //     if ($request->hasFile('product_image')) {
    //         $file = $request->file('product_image');

    //         // Lưu ảnh vào storage/app/public/products
    //         $imagePath = $file->store('products', 'public');
    //     }

        // TODO: Lưu dữ liệu vào Database
        // Product::create([
        //     'name' => $name,
        //     'price' => $price,
        //     'image' => $imagePath,
        // ]);

    //     // Quay lại form và gửi thông báo
    //     return redirect()
    //         ->route('products.create')
    //         ->with('success', "Đã thêm sản phẩm: $name với giá $price VNĐ")
    //         ->with('image_path', $imagePath);
    // }


    public function store(Request $request)
    {
        Gate::authorize('create', Product::class);

        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'price'          => 'required|numeric',
            'category_id'    => 'required|integer|exists:categories,id',
            'stock_quantity' => 'nullable|integer|min:0',
            'description'    => 'nullable|string',
        ]);

        Product::create($validated + [
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('products.index')
                         ->with('success', 'Đã thêm sản phẩm thành công!');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('update', $product);
        //0306241143-Lê Minh Quân
        $categories = Category::orderBy('name')->get();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(StoreProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('update', $product);
        //0306241143-Lê Minh Quân
        $product->update($request->validated());

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy(string $id)
    {
        //0306241143-Lê Minh Quân
        $product = Product::findOrFail($id);
        Gate::authorize('delete', $product);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Đã chuyển sản phẩm vào thùng rác');
    }

    public function trash()
    {
        Gate::authorize('viewTrash', Product::class);
        //0306241143-Lê Minh Quân
        $products = Product::onlyTrashed()
            ->when(auth()->user()->role !== 'admin', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->latest()
            ->paginate(10);

        return view('product.trash', compact('products'));
    }

    public function restore(string $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        Gate::authorize('restore', $product);
        //0306241143-Lê Minh Quân
        $product->restore();
        return redirect()->route('products.trash')->with('success', 'Khôi phục sản phẩm thành công!');
    }

    public function forceDelete(string $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        Gate::authorize('forceDelete', $product);
        //0306241143-Lê Minh Quân
        $product->forceDelete();
        return redirect()->route('products.trash')->with('success', 'Đã xóa vĩnh viễn sản phẩm khỏi hệ thống!');
    }

   
}