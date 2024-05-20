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
        }
        .no-scrollbar {
            ::-webkit-scrollbar {display: none;}
        }

        .img{
            background-size: cover;
            background-position: 50% 50%;
        }
        
        .popUp{
            position: fixed;
            left: 0;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }
        .popV{
            display: flex;
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
    <main class=" h-full md:hidden ">
		<div class=" no-scrollbar flex flex-col w-full bg-slate-950 text-white justify-center items-center fixed top-0">
            <h1 class=" text-3xl font-bold py-4">DeliverEat</h1>
            <nav id="nav" class="overflow-auto  bg-gray-200 text-black font-bold w-full flex flex-row gap-7 whitespace-nowrap px-6 justify-around ">
                @forelse ($categories as $category)
                    <a id="{{"nav".$category->id}}" href="{{"#".$category->name}}" class="py-2 uppercase">{{$category->name}}</a>
                @empty
                    <p>NoData.</p>
                @endforelse
            </nav>
        </div>
        <section class="flex flex-col w-full h-auto mt-24 mb-32">
            @forelse ($categories as $category)
                <div id="{{$category->name}}" class="flex flex-col px-4 gap-3 mt-4 ">
                    <h1  class="text-2xl font-bold py-4 uppercase">{{$category->name}}</h1>
                    @forelse ($category->products as $product)
                        <div data-id="{{$product->id}}" data-img="{{$product->img_uri}}" data-name="{{$product->name}}" data-description="{{$product->description}}" data-price="{{$product->price}}" class=" bg-white rounded-md w-full   flex flex-row border-[1px] border-black bg-" onclick="openPop(this)">
                            <div class=" img min-w-[35%] min-h-36 rounded-tl-md rounded-bl-md" style="{{"background-image: url('storage/images/".$product->img_uri."');"}}"></div>
                            <div class="py-4 px-6 justify-between flex flex-col gap-3 " >
                                <div class=" flex flex-col gap-3 overflow-ellipsis ">
                                    <h2 class="text-xl font-bold">{{$product->name}}</h2>
                                    <p class="text-gray-500 text-sm">{{$product->description}}</p>
                                </div>
                                <p class=" text-gray-500">{{$product->price}} €</p>
                            </div>
                        </div>
                    @empty
                        <p>No hay productos en esta categoría.</p>
                    @endforelse
                </div>
            @empty
                <p>No data.</p>
            @endforelse
            <div id="popUp" style="display: none;" class=" popUp justify-center items-center flex-col bg-white rounded-md mx-4 border-[1px] border-black" >
                <div class=" h-16 p-4 items-center justify-end flex w-full" >
                    <i onclick="closePop()" class="fa-sharp fa-solid fa-xmark text-2xl" ></i>
                </div>
                <div id="img" class=" img w-full h-44" ></div>
                <div class="p-6 justify-between w-full flex flex-row overflow-hidden" >
                    <div class="max-w-[75%]">
                        <h2 id="name" class="text-l font-bold"></h2>
                        <p id="description" class= "text-sm"></p>
                    </div>
                    <p id="price" class=" font-bold"></p>
                </div>
                <div class="flex flex-row items-center justify-between p-6 h-20 border-t-[1px] border-black border-opacity-30 w-full">
                    <form id="añadir" method="POST" action="" class=" w-full flex fle-row items-center justify-between gap-2"> 
                        @csrf
                        <div>
                           <label for="">Cantidad:</label>
                            <input type="number" class="w-12 border border-black" name="amount" id="contador" value="1"> 
                        </div>
                        <input id="button" type="submit" class="bg-black text-white p-2 font-semibold rounded-md" value="Añadir">
                    </form>
                </div>
            </div>
        </section>
        <a id="footerBtn" href="{{route("cart.index")}}" class=" fixed bottom-0 w-full bg-black text-white flex flex-row justify-center items-center p-5 gap-3">
            <i class="fa-solid fa-bag-shopping text-3xl"></i>
            <p class=" text-2xl "> {{$totalPrice}} €</p>
        </a>
	</main>
    <script>
                
        function openPop(id) {
            const nameText = document.getElementById("name")
            const descriptionText = document.getElementById("description")
            const priceText = document.getElementById("price")
            const imgBg = document.getElementById("img")
            const form = document.getElementById("añadir")
            const popUp = document.getElementById("popUp")
            const footerBtn = document.getElementById("footerBtn")

            

            nameText.textContent = id.dataset.name;
            descriptionText.textContent = id.dataset.description
            priceText.textContent = id.dataset.price+" €"
            imgBg.style.backgroundImage = "url('storage/images/"+id.dataset.img+"')"
            form.action= "cart/addproduct/"+ id.dataset.id
            popUp.style.display="flex";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            footerBtn.style.display="none";
        }
        
        function closePop() {
            const popUp = document.getElementById("popUp")
            const footerBtn = document.getElementById("footerBtn")
            footerBtn.style.display="flex";
            popUp.style.display="none"; 
            document.body.style.backgroundColor = "white";
        }

    </script>
    <script src="https://kit.fontawesome.com/2c67195166.js" crossorigin="anonymous"></script>
</body>
</html>