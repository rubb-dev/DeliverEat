<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Models\Cart;
use App\Models\Product;

Route::get('/admin', function () {
    return view('admin.index');
})->name("admin.index");

Route::get('admin/products', [ProductController::class, "index"])->name("admin.products");
Route::post("admin/products/store", [ProductController::class,"store"])->name("products.store");
Route::delete("admin/products/delete/{product}",[ProductController::class, "delete"])->name("product.delete");
Route::get("admin/products/edit/{product}",[ProductController::class, "edit"])->name("product.edit");
Route::put("admin/products/update/{product}",[ProductController::class, "update"])->name("product.update");

Route::get('admin/products/create', [CategoryController::class, "create"])->name("admin.products.create");
Route::post("admin/category/store", [CategoryController::class,"store"])->name("category.store");
Route::delete("admin/category/delete/{category}",[CategoryController::class, "delete"])->name("category.delete");
Route::get('/products', [CategoryController::class, "index"])->name("user.products");

Route::view("/","user.index")->name("user.index");
Route::get("/cart/create", [CartController::class,"create"])->name("cart.create");
Route::get("/cart", [CartController::class,"index"])->name("cart.index");
Route::post("cart/addproduct/{product}", [CartController::class,"addProduct"])->name("cart.addproduct");
Route::delete("cart/addproducts/delete/{product}",[CartController::class, "delete"])->name("addproduct.delete");
Route::get("/cart/pay", [CartController::class,"pay"])->name("cart.pay");

Route::post("cart/checkout", [CartController::class,"checkout"])->name("cart.checkout");
Route::get("cart/checkout/succes", [CartController::class,"success"])->name("checkout.success");
Route::get("cart/checkout/cancel", [CartController::class,"cancel"])->name("checkout.cancel");

Route::get("admin/orders", [OrderController::class,"index"])->name("orders.index");
Route::get("admin/orders/{order}", [OrderController::class,"orderProducts"])->name("order.cart");
Route::delete("admin/orders/delete/{order}",[OrderController::class, "delete"])->name("order.delete");




