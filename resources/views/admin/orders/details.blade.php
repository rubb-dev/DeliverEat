@extends('layouts.landing')

@section('styles')
    <style>
        .img{
            background-size: cover;
            background-position: 50% 50%;
        }

    </style>
@endsection

@section('title',"Productos")


@section('content')

    <section class=" ml-44 flex flex-col p-14">
        <div class="flex flex-row items-center justify-between">
            <h1 class="text-4xl font-bold overflow-hidden">Pedido {{$order->id}}</h1>
            <a class=" flex flex-row gap-2 items-center" href="{{route("orders.index")}}"><i class="fa-solid fa-arrow-left" style="color: #000000;"></i>Volver atrás</a>
        </div>
        
        <div class=" flex flex-col w-full gap-10 mt-20 items-start ">
            <div class=" flex flex-row gap-10 items-center border rounded-md p-4 border-black">
                <div>
                    <p><b>Nombre :</b> {{$order->name}}</p>
                    <p><b>Teléfono :</b> {{$order->phone}}</p>
                    <p><b>Ciudad :</b> {{$order->city}}</p>
                </div>
                <div>
                    <p><b>Dirección :</b> {{$order->direction}}</p>
                    <p><b>Info extra :</b> {{$order->direction_extra_info}}</p>
                    <p><b>Precio total :</b> {{$order->total_price}}</p>
                </div>
            </div>
            <div class=" flex flex-wrap justify-center gap-4 w-full border-t border-black pt-14">
                @foreach ($cart->products as $product)
                    <div class=" border border-black rounded-md p-4 flex flex-row gap-4 items-center">
                        <img class=" rounded-md h-20" src="{{asset("storage/images/".$product->img_uri)}}" alt="{{$product->name}}">
                        <div class=" flex flex-col h-full justify-between">
                            <p>{{$product->name}}</p>
                            <p><b>Cantidad :</b> {{$product->pivot->amount}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            
            
        </div>
    </section>

@endsection

