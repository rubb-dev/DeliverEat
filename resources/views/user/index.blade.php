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

        .bg-image {
            background-image: url("hamburguer.jpg");
            background-position: center;
            background-size: cover;
            filter: opacity(0.6);
            filter: brightness(0.5)
        }
        .bg-gradiente-t {
            background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(0,0,0,0.7456232492997199) 54%, rgba(255,255,255,0) 100%);
        }
        .bg-gradiente-b {
            background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(0,0,0,0.7456232492997199) 54%, rgba(255,255,255,0) 100%);
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
    <main class=" md:hidden ">   
        <div class="bg-gradiente-b text-white w-screen fixed top-0">
            <h1 class="text-white flex items-center justify-center p-4 font-bold text-2xl">DeliverEat</h1>
        </div>
        <div class=" w-screen h-screen flex justify-center items-center">
            <a class=" bg-white p-4 rounded-md font-bold text-black text-xl" href="{{route("cart.create")}}">Comenzar pedido</a>
        </div>
        <footer class=" fixed bottom-0 text-white flex items-cente bg-gradiente w-screen p-4 justify-center">
            <p>Aplicación creada por Rubén Vicente</p>
        </footer>
        <div class="w-screen h-screen bg-image fixed top-0 -z-10"></div>
    </main>
    <script src="https://kit.fontawesome.com/2c67195166.js" crossorigin="anonymous"></script>
</body>
</html>