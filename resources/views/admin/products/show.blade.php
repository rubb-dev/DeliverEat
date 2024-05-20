@extends('layouts.landing')

@section('title',"Productos")


@section('content')

    <section class=" ml-44 flex flex-col p-14">
        <div class="flex flex-row items-center justify-between">
            <h1 class="text-4xl font-bold overflow-hidden">Productos</h1>
            <a class=" bg-black text-white p-4 w-fit rounded-md font-bold" href="{{route("admin.products.create")}}">Añadir nuevo producto</a>
        </div>
        
        <div class=" flex flex-col  border-t border-black mt-20 items-center ">
            @forelse ($products as $product)
                <div class=" border-b border-black flex flex-row gap-4  justify-between py-6 w-full">
                    <div class="flex flex-row gap-6 items-start">
                        <img class=" min-w-56 max-w-56 h-auto border border-black rounded-md" src="{{asset("storage/images/".$product->img_uri)}}" alt="{{$product->name}}">
                        <div class=" flex flex-col justify-between h-full">
                            <p class=" flex flex-row gap-2"><span class="font-bold">Nombre: </span>{{$product->name}}</p>
                            <p  class=" flex flex-wrap overflow-hidden flex-row gap-2"><span class="font-bold">Descripción: </span>{{$product->description}} </p>
                            <p class=" flex flex-row gap-2"><span class="font-bold">Precio: </span>{{$product->price}}<span>€</span></p>
                            <p class=" flex flex-row gap-2"><span class="font-bold">Categoría: </span>{{$product->category->name}}</p>
                        </div>
                    </div>
                    <div class=" min-w-fit flex flex-col gap-4 items-center">
                        <a class=" bg-black text-white p-2 rounded-md cursor-pointer font-bold" href="{{route("product.edit", $product->id)}}" >
                            Editar
                        </a>
                        <form class="w-fit bg-red-500 text-white p-2 rounded-md cursor-pointer" method="POST" action="{{route("product.delete", $product->id)}}">
                            @csrf
                            @method("Delete")
                            <input class="font-bold cursor-pointer "  type="submit" value="Eliminar">
                        </form>
                    </div>
                </div>
            @empty
                <p class=" m-auto mt-40">No hay ningun producto actualmente creado.</p>
            @endforelse
        </div>
    </section>

@endsection

