@props(['active'])

@php
$classes = $active ?? false ? ' items-center px-1 pt-1  text-sm font-medium leading-5 text-white focus:outline-none  transition' : ' items-center px-1 pt-1  text-sm font-medium leading-5 text-gray-500 hover:text-gray-100  focus:outline-none focus:text-gray-100  transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
