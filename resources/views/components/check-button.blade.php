@props(['status' => 'true', 'link', 'icon'])

@php
    if ($status == 'batal') {
        $classes = 'active:shadow-soft-xs active:opacity-85 ease-soft-in leading-pro text-xs bg-150 bg-x-25 rounded-3.5xl p-1.2 h-6 w-6 cursor-pointer items-center border border-solid border-red-600 bg-transparent text-center align-middle font-bold text-red-600 shadow-none transition-all hover:bg-transparent hover:text-red-600 hover:opacity-75 hover:shadow-none active:bg-red-600 active:text-white hover:active:bg-transparent hover:active:text-red-600 hover:active:opacity-75 hover:active:shadow-none mb-0 mr-2 flex align-center justify-center';
    } elseif ($status == 'tp') {
        $classes = 'active:shadow-soft-xs active:opacity-85 ease-soft-in leading-pro text-xs bg-150 bg-x-25 rounded-3.5xl p-1.2 h-6 w-6 cursor-pointer items-center border border-solid border-slate-700 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all hover:bg-transparent hover:text-slate-700 hover:opacity-75 hover:shadow-none active:bg-slate-700 active:text-white hover:active:bg-transparent hover:active:text-slate-700 hover:active:opacity-75 hover:active:shadow-none mb-0 mr-2 flex align-center justify-center';
    } elseif ($status == 'true') {
        $classes = 'active:shadow-soft-xs active:opacity-85 ease-soft-in leading-pro text-xs bg-150 bg-x-25
rounded-3.5xl p-1.2 h-6 w-6 mb-0 cursor-pointer border border-solid border-lime-500 bg-transparent text-center
align-middle font-bold text-lime-500 shadow-none transition-all hover:bg-transparent hover:text-lime-500
hover:opacity-75 hover:shadow-none active:bg-lime-500 active:text-black hover:active:bg-transparent
hover:active:text-lime-500 hover:active:opacity-75 hover:active:shadow-none mr-2 flex items-center justify-center';
    } else {
        $classes = 'active:shadow-soft-xs active:opacity-85 ease-soft-in leading-pro text-xs bg-150 bg-x-25 rounded-3.5xl p-1.2 h-6 w-6
cursor-pointer items-center border border-solid border-red-600 bg-transparent text-center align-middle font-bold
text-red-600 shadow-none transition-all hover:bg-transparent hover:text-red-600 hover:opacity-75 hover:shadow-none
active:bg-red-600 active:text-white hover:active:bg-transparent hover:active:text-red-600 hover:active:opacity-75
hover:active:shadow-none mb-0 mr-2 flex align-center justify-center';
    }
@endphp

<form action="{{ $link }}" method="post">
    @csrf
    <button {{ $attributes->merge(['class' => $classes]) }}><i class="text-3xs {{ $icon }}"
            aria-hidden="true"></i></button>
</form>
