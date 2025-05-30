<x-admin-layout :breadcrums="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Portadas',
    ],
]">

    <x-slot name="action">

        <a href="{{ route('covers.create') }}" class="btn btn-blue">Nueva portada</a>
    </x-slot>

    <ul class="space-y-4">
        @foreach ($covers as $cover)
            <li class="bg-white rounded-lg shadow-lg overflow-hidden lg:flex">

                <img src="{{ $cover->image }}" alt="" class="w-full lg:w-64 aspect-[3/1] object-cover object-center">

                <div class="p-4 flex-1 flex justify-between items-center">

                    <div class="font-semibold">
                        <h1>{{$cover->title}}</h1>
                        <p>
                            @if ($cover->is_active)
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Activo</span>
                            @else
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">Inactivo</span>
                            @endif
                        </p>
                    </div>
                    <div class="text-sm font-bold">
                        <p>Fecha de inicio </p>

                         <p>{{$cover->start_at->format('d/m/Y')}} </p>
                    </div>
                    <div class="text-sm font-bold">
                        <p>Fecha de fin </p>
                        <p>{{ $cover->end_at ? $cover->end_at->format('d/m/Y') : '-' }} </p>
                    </div>
                    <div>
                        <a class="btn btn-blue" href="{{route('covers.edit', $cover) }}">
                            Editar                            
                        </a>

                    </div>

                </div>
            </li>
        @endforeach
    </ul>

</x-admin-layout>
