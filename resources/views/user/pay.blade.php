<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <main class=" md:flex justify-center items-center h-dvh w-dvw flex-col gap-8 hidden fixed">
        <h1 class=" text-4xl overflow-hidden">
            DeliverEat
        </h1>
        <p> Esta Web solo esta disponible para dispositivos móviles.</p>
    </main>
    <main class=" h-dvh md:hidden flex flex-col">
        <div class=" flex flex-col w-full bg-slate-950 text-white justify-center items-center fixed">
            <h1 class=" text-2xl font-bold py-4">DeliverEat</h1>
        </div>
        <div class="  flex flex-row items-center justify-between p-6 w-full border-b fixed top-16 bg-white">
            <a href="{{route("cart.index")}}"><i class="overflow-hidden fa-solid fa-arrow-left text-2xl"></i></a>
            <h1 class="text-l font-bold flex flex-col gap-2 items-end">Volver atras</h1>
        </div>
        <form class="flex overflow-visible flex-col gap-8 items-center p-8 mt-32 mb-12" method="POST" action="{{route("cart.checkout")}}">
            @csrf
            <h2 class=" text-2xl font-bold overflow-hidden">Datos de envio</h2>
            <div class="flex flex-col gap-2 w-full">
                <label class=" font-bold text-xl" for="">Nombre <span class=" text-red-500">*</span></label>
                <input class=" border border-black p-2 rounded-md" type="text" name="name" id="">
            </div>
            <div class="flex flex-col gap-2 w-full">
                <label class=" font-bold text-xl" for="">Número de telefono <span class=" text-red-500">*</span></label>
                <input class=" border border-black p-2 rounded-md" type="text" name="phone" id="">
            </div>
            <div class="flex flex-col gap-2 w-full">
                <label class=" font-bold text-xl" for="">Ciudad <span class=" text-red-500">*</span></label>
                <input class=" border border-black p-2 rounded-md" type="text" name="city" id="">
            </div>
            <div class="flex flex-col gap-2 w-full">
                <label class=" font-bold text-xl" for="">Dirección de envio <span class=" text-red-500">*</span></label>
                <input class=" border border-black p-2 rounded-md" type="text" name="direction" id="" placeholder="Nombre de la calle, nº">
            </div>
            <div class="flex flex-col gap-2 w-full">
                <label class=" font-bold text-xl" for="">Información extra</label>
                <input class=" border border-black p-2 rounded-md" type="text" name="direction_extra" id="" placeholder="Piso,escalera,puerta...">
            </div>
            <button class="w-full p-6 bg-blue-500 rounded-md text-white text-xl font-bold mt-4">Checkout</button>
        </form>
	</main>
    <script src="https://kit.fontawesome.com/2c67195166.js" crossorigin="anonymous"></script>
</body>
</html>