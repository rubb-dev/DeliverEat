<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\VarDumper\VarDumper;

class CartController extends Controller
{
    public function create()
    {
        $sessionId = session()->getId();

        $cart = Cart::where('session_id', $sessionId)->first();

        if(!$cart){
            Cart::create([
                "session_id"=>$sessionId,
            ]);
        }
        return redirect()->route("user.products");
    }

    public function index()
    {
        $sessionId = session()->getId();

        $cart = Cart::where('session_id', $sessionId)->first();
        
        if(!$cart){
            return redirect()->route("user.index");
        }
        
        $totalPrice = 0;
        
        foreach ($cart->products as $product) {
            $orderPrice = $product->price * $product->pivot->amount;
            $totalPrice = $totalPrice + $orderPrice;
        }
        
        

        return view("user.cart", compact("cart","totalPrice"));
    }

    public function addProduct(Request $request, Product $product)
    {
        $sessionId = session()->getId();

        $cart = Cart::where('session_id', $sessionId)->first();

        DB::table('cart_product')->insert([
            'cart_id' => $cart->id, 
            'product_id' => $product->id,
            "amount" => $request->amount,
        ]);

        return redirect()->route(("cart.index"));
    }
    public function delete($id)
    {
        DB::table('cart_product')->delete($id);

        return redirect()->route(("cart.index"));
    }

    public function pay ()
    {
        $sessionId = session()->getId();

        $cart = Cart::where('session_id', $sessionId)->first();
        
        if(!$cart){
            return redirect()->route("user.index");
        }

        return view("user.pay");
    }
    public function checkout (OrderRequest $request)
    {

        \Stripe\Stripe::setApiKey(env("STRIPE_SECRET_KEY"));

        $sessionId = session()->getId();

        $cart = Cart::where('session_id', $sessionId)->first();

        if(!$cart){
            return redirect()->route("user.index");
        }

        $lineItems = [];
        $totalPrice = 0;
        foreach ($cart->products as $product) {
            $lineItems[] = [
                "price_data" => [
                    "currency" => "eur",
                    "unit_amount" => $product->price * 100,
                    "product_data" => [ // Optional, if needed
                        "name" => $product->name,
                    ],
                ],
                // Add this line:
                "quantity" => $product->pivot->amount,
            ];
            $totalPrice += $product->price * $product->pivot->amount;
        }

        if(count($lineItems) != 0)
        {
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route("checkout.success")."?checkout_session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route("checkout.cancel"),
            ]);

            $order = new Order();
            $order->status = "unpaid";
            $order->total_price = $totalPrice;
            $order->cart_id = $cart->id;
            $order->checkout_session_id = $checkout_session->id;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->city = $request->city;
            $order->direction = $request->direction;
            $order->direction_extra_info = $request->direction_extra;
            $order->save();



            return redirect($checkout_session->url);
        }
        else
        {
            return redirect()->route("cart.index")->with("danger", "El pedido está vacio");
        }
    }

    public function success(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET_KEY"));
        $sessionId = $request->get("checkout_session_id");

        try {
            $session = $stripe->checkout->sessions->retrieve($sessionId);
            if(!$session)
            {
                throw new NotFoundHttpException;
            }

            $order = Order::where("checkout_session_id", $session->id)->where("status","unpaid")->first();
            
            if(!$order){
                throw new NotFoundHttpException();
            }
            $order->status = "paid";
            $order->save();

            session()->regenerate();

        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }

        return view("user.success", compact("order"));
    }

    public function cancel()
    {
        return view("user.cancel");
    }
}
