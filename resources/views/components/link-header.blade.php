@props(['class'])

@php
    $classes = 'inline-block px-6 py-3 mb-0 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25';
@endphp

<div class="flex items-center p-4 pt-0 rounded-b-2xl">
    <div class="w-3/5"></div>
    <div class="w-2/5 text-right">
        <a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}
        </a>
    </div>
</div>
