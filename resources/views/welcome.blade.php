<x-app-layout>
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    <!-- Slider main container -->
    <div class="swiper mb-12">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->

            @foreach ($covers as $cover)
                <div class="swiper-slide">
                    <img src="{{ $cover->image }}" alt="{{ $cover->title }}" class="w-full aspect-[3/1] object-cover object-center" />

                </div>
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>

    <x-container>
        <h1 class="text-4xl font-bold text-gray-700 mb-4">
            Tu tienda de confianza en informática y tecnologia
        </h1>
        <h1 class="text-4xl font-bold text-gray-700 mb-4 underline">
            Novedades
        </h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-7">

            @foreach ($ultimosProductos as $producto)
                <article class="bg-white shadow rounded overflow-hidden">
                    <img src="{{ $producto->image }}" class="w-full h-48 object-cover object-center" alt="Imagen de {{ $producto->name }}">



                    <div class="p-4">
                        <h1 class="text-lg font-bold text-gray-700 line-clamp-2 min-h-[56px] mb-2">
                            {{ $producto->nombre }}</h1>
                        <p class="text-3xl font-semibold text-red-700">
                            {{ $producto->precio }} €
                        </p>

                        <a href="{{ route('producto.show', $producto) }}"
                            class="btn btn-bluedark block w-full text-center">
                            Ver Producto
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </x-container>

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
                // Optional parameters

                loop: true,

                autoplay: {
                    delay: 5000,
                },

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

            });
        </script>
    @endpush

</x-app-layout>
