<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Models\Cart;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $sessionId = session()->getId();

        $cart = Cart::where('session_id', $sessionId)->first();
        
        $totalPrice = 0;
        if(!$cart){
            return redirect()->route("user.index");
        }

        foreach ($cart->products as $product) {
            $orderPrice = $product->price * $product->pivot->amount;
            $totalPrice = $totalPrice + $orderPrice;
        }
        return view("user.products", compact("categories", "totalPrice"));
    }

    public function create()
    {
        $categories = Category::all();
        return view("admin.products.create", compact("categories"));
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            "name"=>$request->name
        ]);
        return redirect()->route("admin.products.create")->with("success", "Categoría creada");
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route("admin.products.create")->with("danger", "Categoría eliminada");
    }
}
