@props(['active', 'icon'])

@php
    $classes = $active ? 'bg-gradient-to-tl shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5 from-gray-900 to-slate-800' : 'shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5';

    $clasess2 = $active ? 'py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors' : 'py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors';
@endphp

<a {{ $attributes->merge(['class' => $clasess2]) }}>
    <div class="{{ $classes }}">
        <i class="{{ $icon }} {{ $active ?? true ? 'text-white' : '' }}"></i>
    </div>
    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft"> {{ $slot }}</span>
</a>
