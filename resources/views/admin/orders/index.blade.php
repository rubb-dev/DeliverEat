@extends('layouts.landing')

@section('title',"Pedidos")


@section('content')

    <section class=" ml-44 flex flex-col p-14">
        <div class="flex flex-row items-center justify-between">
            <h1 class="text-4xl font-bold overflow-hidden">Pedidos</h1>
        </div>
        
        <div class=" flex flex-col w-full gap-10   mt-20 items-start ">
            @foreach ($orders as $order)
                <div class="flex flex-row w-full justify-between pt-8 border-t border-black">
                    <h3 class=" text-xl font-bold">Pedido {{$order->id}}</h3>
                    <a class=" bg-black text-white font-bold rounded-md p-4" href="{{route("order.cart",$order->id)}}">Ver pedido</a>
                </div>
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
            @endforeach
            
        </div>
    </section>

@endsection

