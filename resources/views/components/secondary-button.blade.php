<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border-gray-500 text-slate-500 hover:text-gray-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-gray-500 active:bg-gray-500 active:text-white hover:active:border-gray-500 hover:active:bg-transparent hover:active:text-gray-500 hover:active:opacity-75']) }}>
    {{ $slot }}
</button>
