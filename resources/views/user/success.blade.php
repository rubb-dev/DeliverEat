<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedido completado</title>
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
        <div class=" flex p-8 flex-col gap-10 items-center justify-center h-full w-screen">
            <h1 class="text-xl font-bold overflow-hidden">Pedido completado con éxito</h1>
            <i class="fa-regular fa-circle-check text-8xl font-bold overflow-hidden" style="color: #77ea6a;"></i>
            <p class=" text-center">El identificador de su pedido es : {{$order->id}}</p>
            <a class=" bg-black text-white p-4 rounded-md mt-24" href="{{route("user.index")}}">Comenzar un nuevo pedido</a>
        </div>
	</main>
    <script src="https://kit.fontawesome.com/2c67195166.js" crossorigin="anonymous"></script>
</body>
</html>