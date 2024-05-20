@extends('layouts.landing')

@section('title',"Crear Productos")


@section('content')

    <section class=" ml-44 flex flex-col p-14 gap-8">
        <h1 class="text-4xl font-bold overflow-hidden">Crea un nuevo producto</h1>
        <div class="border border-black flex flex-col gap-8 p-4">
            <h3 class="font-bold text-xl">Crear nueva categoría</h3>
            <form class=" flex flex-row gap-4  items-center" method="POST" action="{{route("category.store")}}">
                @csrf
                <label for="">Nombre de la categoría:</label>
                <input class=" border border-black p-2" type="text" name="name" id="" placeholder="Introduce el nombre de la categoría">
                <input class=" bg-black text-white p-2 rounded-md w-fit" type="submit" value="Crear categoría">
            </form>
            <div class="flex flex-wrap gap-4 ">
                @forelse ($categories as $category)
                    <div class="bg-black text-white flex flex-row gap-4 w-fit p-4 rounded-md ">
                        <p>{{$category->name}}</p>
                        <form method="POST" action="{{route("category.delete", $category->id)}}">
                            @csrf
                            @method("Delete")
                            <input class="font-bold "  type="submit" value="X">
                        </form>
                    </div>
                @empty
                    <div class="bg-black text-white flex flex-row gap-4 w-fit p-4 rounded-md ">
                        <p>No data</p>
                    </div>
                @endforelse
            </div>
        </div>
        <h3 class="font-bold text-xl">Crear nuevo producto</h3>
        <form class=" flex flex-col gap-4 p-4 border border-black w-[60%]" method="POST" action="{{route("products.store")}}" enctype="multipart/form-data">
            @csrf
            <label for="">Nombre del producto</label>
            <input class="border border-black p-2 w-[80%]" type="text" name="name" id="" placeholder="Nombre del producto">
            <label for="">Descripción del producto</label>
            <textarea class="border border-black p-2" name="description" id="" cols="20" rows="4"></textarea>
            <label for="">Precio en euros</label>
            <input class="border border-black p-2 w-[40%]" type="text" name="price" id="" placeholder="0.00">
            <label for="">Selecciona una imagen para el producto</label>
            <input class="border border-black p-2 w-[80%]" type="file" name="file" id="">
            <label for="">Elige una categoría</label>
            <select class="border border-black w-fit p-2"  name="category" id="">
                @forelse ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @empty
                    <option value="">No Data.</option>
                @endforelse
            </select>
            <input class=" mx-auto bg-black text-white p-2 rounded-md w-fit" type="submit" value="Crear producto">
        </form>
    </section>

@endsection

