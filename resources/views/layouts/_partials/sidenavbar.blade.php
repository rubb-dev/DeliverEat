<header class="fixed w-44 h-screen px-8 py-10 bg-black text-white flex flex-col justify-between items-center">
    <a href="{{ route("admin.index")}}"><h1>DeliverEat</h1></a>
    <nav class=" flex flex-col gap-7">
        <a class="flex flex-row gap-2 items-center" href="{{route("orders.index")}}"><i class="fa-solid fa-motorcycle" style="color: #ffffff;"></i>Pedidos</a>
        <a class="flex flex-row gap-2 items-center" href="{{ route("admin.products")}}"><i class="fa-solid fa-utensils" style="color: #ffffff;"></i>Productos</a>
    </nav>
    <div>
        <a class="flex flex-row gap-2 items-center" href=""><i class="fa-solid fa-gear" style="color: #ffffff;"></i>Configuración</a>
    </div>
</header>
