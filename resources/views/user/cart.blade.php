<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: poppins;
            overflow-x: hidden;
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body>
    <main class=" md:flex justify-center items-center h-dvh w-dvw flex-col gap-8 hidden">
        <h1 class=" text-4xl overflow-hidden">
            DeliverEat
        </h1>
        <p> Esta Web solo esta disponible para dispositivos móviles.</p>
    </main>
    <main class=" h-dvh md:hidden ">
        <div class=" flex flex-col w-full bg-slate-950 text-white justify-center items-center fixed">
            <h1 class=" text-2xl font-bold py-4">DeliverEat</h1>
        </div>
        <div class="  flex flex-row items-center justify-between p-6 w-full border-b fixed top-16 bg-white">
            <a href="{{route("user.products")}}"><i class="overflow-hidden fa-solid fa-arrow-left text-4xl"></i></a>
            <h1 class="text-3xl font-bold flex flex-col gap-2 items-end">TU PEDIDO <span class=" text-sm text-gray-400">CartRef:{{$cart->id}}</span></h1>
        </div>
        <div class="flex flex-col p-6 gap-4 pb-52 pt-40">
            @forelse ($cart->products as $product)
                <div data-price="{{$product->price}}" data-amount="{{$product->pivot->amount}}" class="flex flex-col justify-between w-full border-b p-6 h-36 ">
                    <div class="flex flex-row w-full items-center justify-between">
                        <h2 class="font-bold">{{$product->name}}</h2>
                        <form method="POST" action="{{route("addproduct.delete",$product->pivot->id)}}">
                            @csrf
                            @method("Delete")
                            <button class="items-center pt-2"><i class="fa-solid fa-trash-can text-xl" style="color: #e14747;"></i></button>
                        </form>
                    </div>
                    <div class="flex flex-row w-full items-center justify-between">
                        <p>Cantidad: {{$product->pivot->amount}}</p>
                        <p>p/u: {{$product->price}} €</p>
                    </div>
                </div>
            @empty
                <p class="mt-24 w-full h-full flex items-center justify-center text-gray-400">No hay productos añadidos.</p>
            @endforelse
        </div>
        <div class="flex flex-col fixed bottom-0 w-full">
            <div class="text-2xl font-bold py-6 px-8 flex flex-row justify-between border-t bg-white -mb-1">
                <h2 class=" overflow-hidden">Precio total:</h2>
                <h2 id="totalPrice" class="overflow-hidden">{{$totalPrice}} €</h2>
            </div>
            <div class="grid grid-cols-3 w-full ">
                <a href="{{route("user.products")}}" class="flex items-center h-20 col-span-2 bg-black text-white font-bold justify-center text-xl">Continuar añadiendo</a>
                <a href="{{route("cart.pay")}}" class="flex items-center col-span-1 font-bold text-black bg-white justify-center text-xl">Pagar</a>
            </div>
        </div>
	</main>
    <script src="https://kit.fontawesome.com/2c67195166.js" crossorigin="anonymous"></script>
</body>
</html>