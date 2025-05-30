<div>
    <select {{ $attributes->merge(['class' => 'border rounded p-2']) }}>
        {{ $slot }}
    </select>
</div>
