@if (count($breadcrums))
    

<nav class="mb-4">

    <ol class="flex flex-wrap">
        @foreach ($breadcrums as $item)
                
           
            <li class="text-sm leading-normal text-slate-700 {{ !$loop->first ? "pl-2 before:float-left before:pr-2 before:content-['/']" : ''}}">
           
                @isset($item['route'])
                   <a href=" {{ $item['route'] }}">
                      {{ $item['name'] }}
                    </a>
                
                    @else
                    {{ $item['name'] }}
                @endisset
            </li>
        @endforeach



    </ol>

    @if (count($breadcrums) > 1) 
        <h6 class="font-bold">
        {{ end ($breadcrums)['name'] }}
        </h6>
    @endif

</nav>

@endif