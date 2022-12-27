@props(['value', 'required' => false])

<label {{ $attributes->merge(['class' => 'mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80']) }}>
    {{ $value ?? $slot }} <span class="text-red-500">{{ $required ? '*' : '' }}</span>
</label>
