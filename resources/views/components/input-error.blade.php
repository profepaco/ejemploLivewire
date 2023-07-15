@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'uppercase border border-red-600 bg-red-100 text-red-600 font-bold p-2 my-3 text-xs']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
