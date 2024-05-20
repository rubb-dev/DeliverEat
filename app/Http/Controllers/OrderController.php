<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::where("status","paid")->orderBy("created_at","desc")->get();

        return view("admin.orders.index",compact("orders"));
    }

    public function orderProducts(Order $order)
    {

        $cart = Cart::where("id", $order->cart_id)->first();


        return view("admin.orders.details",compact("cart","order"));
    }

    public function delete(Order $order)
    {
        $order->delete();

        return redirect()->route("orders.index");
    }
}
