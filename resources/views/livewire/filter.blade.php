<div class="bg-white py-12">
   <x-container class="px-4 md:flex">



    <div class="md:flex-1">

        <div class="flex items-center">
            <span class="mr-2">
                Ordenar por:
            </span>
            <x-select>
                <option value="1">
                    Relevacia
                </option>
                <option value="2">
                    Precio: Mayor a menor
                </option>
                <option value="3">
                    Precio: Menor a mayor
                </option>
            </x-select>
        </div>
        <hr class="my-4">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-7">
        
        @foreach ($productos as $producto )

        <article class="bg-white shadow rounded overflow-hidden">
        <img src="{{$producto->image}}" class="w-full h-48 object-cover object-center">
        

        <div class="p-4">
            <h1 class="text-lg font-bold text-gray-700 line-clamp-2 min-h-[56px] mb-2">
                {{$producto->nombre}}</h1>
                 <p class="text-3xl font-semibold text-red-700">
                    {{$producto->precio}} €
                </p>
                
                <a href="{{route('productos.show', $producto)}}" class="btn btn-bluedark block w-full text-center">
                    Ver Producto
                </a>
        </div>
            </article>
        @endforeach
    </div>

    <div class="mt-8">
        {{$productos->links()}}
    </div>
   
    </div>
   </x-container>

</div>
