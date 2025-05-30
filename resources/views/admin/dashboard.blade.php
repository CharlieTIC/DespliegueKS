<x-admin-layout :breadcrums="[

    [
        'name' => 'Dashboard',
        'route' => route('dashboard')
    ],

]">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-lg p-6 flex items-center justify-center">
            <div class="flex items-center">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />
                    <div class="ml-4 flex-1">
                        <h2 class="text-lg font-semibold"> 
                            Bienvenido, {{ Auth()->user()->name }}
                        </h2>
                    </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 flex items-center justify-center">
            <h2 class="text-xl font-semibold">KodeShop - Panel Admin</h2>
           
        </div>
    </div>

</x-admin-layout>
