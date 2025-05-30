<div>
    <form wire:submit.prevent="store">


    <figure class="mb-4 relative">

        <div class="absolute top-8 right-8">
        <label class="flex items-center px-4 py-2 rounded-lg bg-white cursor-pointer">
            <i class="fas fa-camera"></i>
            Actualizar imagen

            <input type="file" class="hidden" wire:model="image" accept="image/*">
        </label>
        </div>


        <img class="aspect-[16/9] object-cover object-center" 
            src="{{ $image ? $image->temporaryUrl() : asset('img/no-image.png') }}" 
            alt="">
    </figure>

    <x-validation-errors class="mb-4" />


    <div class="card">
        <div class="mb-4">
            <x-label class="mb-1">
                Código
            </x-label>

            <x-input 
            wire:model="producto.sku" 
            class="w-full" 
            placeholder="Por favor ingrese el código del producto" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1">
                Nombre
            </x-label>

            <x-input 
            wire:model="producto.nombre" 
            class="w-full" 
            placeholder="Por favor ingrese el nombre del producto" />
        </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Descripción
                </x-label>

                <x-textarea
                wire:model="producto.descripcion" 
                class="w-full" 
                placeholder="Por favor ingrese descripción del producto" />

            </div>

            <div class="mb-4">
            <x-label class="mb-1">
                Precio
            </x-label>

            <x-input 
            type="number"
            step="0.01"
            wire:model="producto.precio" 
            class="w-full" 
            placeholder="Por favor ingrese precio del producto" />
        </div>

            <div class="mb-4">        

            <x-label class="mb-1" for="categoria_id">Categoría</x-label>
                <select
                    wire:model.live="categoria_id"
                    id="categoria_id"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm"
                >
                    <option value="">Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>



            </div>

            <div class="mb-4">
                <x-label class="mb-1" for="subcategoria_id">Subcategoría</x-label>
                    <select
                    wire:model.live="subcategoria_id"
                    id="subcategoria_id"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm"
                >
                    <option value="">Seleccione una subcategoría</option>
                    @foreach ($this->subcategorias as $subcategoria)

                        <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>

                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <x-button type="submit">Crear Producto</x-button>

    </div>
    </form>
</div>
