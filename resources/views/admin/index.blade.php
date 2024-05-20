@extends('layouts.landing')

@section('title',"Home")


@section('Panel de administrador')

    <section class=" ml-44 flex flex-col justify-center p-14 gap-32">
        <div class="flex flex-col gap-1">
            <h1 class=" text-4xl font-bold overflow-hidden">DeliverEat</h1>
            <p>Comienza ahora gestionando tus pedidos y añadiendo productos nuevos.</p>
        </div>
        
        <div class=" flex flex-wrap flex-row gap-10 mx-auto">
            <a href="{{route("orders.index")}}" class=" p-10 w-96 h-96 border border-black rounded-lg flex flex-col gap-14 justify-center items-center">
                <h2 class=" overflow-hidden text-5xl flex flex-row gap-3"><i class="fa-solid fa-motorcycle overflow-hidden" style="color: #000000;"></i>Pedidos</h2>
                <p class=" opacity-60"> Comienza ahora gestionando y viendo todos los pedidos que recibas.</p>
            </a>
            <a class=" p-10 w-96 h-96 border border-black rounded-lg flex flex-col gap-14 justify-center items-center" href="{{ route("admin.products")}}">
                <h2 class="overflow-hidden text-5xl flex flex-row gap-3"><i class="fa-solid fa-utensils overflow-hidden" style="color: #000000;"></i>Productos</h2>
                <p class=" opacity-60"> Crea, edita y elimina todos los productos que ofreces.</p>
            </a>
        </div>
    </section>

@endsection

