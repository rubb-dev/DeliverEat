<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view("admin.products.show",compact("products"));
    }

    public function store(ProductRequest $request)
    {
        $fileName = time().".".$request->file->extension();
        
        $request->file->storeAs("public/images", $fileName);

        Product::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "img_uri"=>$fileName,
            "price"=>$request->price,
            "category_id"=>$request->category,

        ]);
        return redirect()->route("admin.products")->with("success", "Producto creado");
    }

    public function delete(Product $product)
    {

        Storage::delete("public/images/".$product->img_uri);

        $product->delete();
        return redirect()->route("admin.products")->with("danger", "Producto eliminado");
    }

    public function edit(Product $product)
    {

        $categories= Category::all();
        return view("admin.products.edit",compact("product","categories"));
    }

    public function update(ProductRequest $request, Product $product)
    {

        Storage::delete("public/images/".$product->img_uri);

        $fileName = time().".".$request->file->extension();
        
        $request->file->storeAs("public/images", $fileName);

        $product->update([
            "name"=>$request->name,
            "description"=>$request->description,
            "img_uri"=>$fileName,
            "price"=>$request->price,
            "category_id"=>$request->category,
        ]);
        return redirect()->route("admin.products")->with("success", "Producto actualizado.");
    }
}
