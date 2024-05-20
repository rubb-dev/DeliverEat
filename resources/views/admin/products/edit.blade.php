@extends('layouts.landing')

@section('title',"Editar producto")


@section('content')

    <section class=" ml-44 flex flex-col p-14">
        <div class="flex flex-row justify-between">
            <h1 class="text-4xl overflow-hidden font-bold">Editar producto #{{$product->id}}</h1>
            <a class="p-4 font-bold bg-black text-white rounded-md" href="{{route("admin.products")}}">Cancelar edición</a>
        </div>
        <form class=" flex mt-20 flex-col gap-4 p-4 border border-black w-[60%]" method="POST" action="{{ route("product.update", $product->id)}}" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <label for="">Nuevo nombre</label>
            <input class="border border-black p-2 w-[80%]" type="text" name="name" id="" value="{{$product->name}}">
            <label for="">Nueva descripción</label>
            <textarea class="border border-black p-2" name="description" id="" cols="20" rows="4" placeholder="{{$product->description}}"></textarea>
            <label for="">Nuevo precio</label>
            <input class="border border-black p-2 w-[40%]" type="text" name="price" id="" value="{{$product->price}}">
            <label for="">Selecciona una nueva imagen</label>
            <input class="border border-black p-2 w-[80%]" type="file" name="file" value="{{$product->img_uri}}" id="">
            <label for="">Elige una nueva categoría</label>
            <select class="border border-black w-fit p-2" value="{{$product->category->name}}"  name="category" id="">
                @forelse ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @empty
                    <option value="">No Data.</option>
                @endforelse
            </select>
            <p class=" opacity-65">Categoria actual : {{$product->category->name}}</p>
            <input class=" mx-auto bg-black text-white p-2 rounded-md w-fit" type="submit" value="Editar producto">
        </form>
    </section>

@endsection

