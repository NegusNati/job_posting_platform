{{-- <a {{ $attributes }}>
    {{ $slot}}
</a> --}}
@props(['active' => false , 'type' => 'a']);
{{--
@php
$active = request()->is('about');
if($active) {
dd($active);
}
@endphp --}}


@if ( $type == 'button')

<button class="{{ $active ? " bg-gray-900 text-white" :"text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md
    px-3 py-2 text-base font-medium" aria-current="{{ $active ? 'page' : 'false'}}"
    onclick="window.location.href='{{ $attributes['href']}}'">
    {{ $slot }}

</button>


@else

<a class="{{ $active ? " bg-gray-900 text-white" :"text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3
    py-2 text-base font-medium" aria-current="{{ $active ? 'page' : 'false'}}" {{$attributes}}>
    {{ $slot }}

</a>

@endif
