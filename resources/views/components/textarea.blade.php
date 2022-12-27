@props(['name'])

<textarea id="keterangan" {{ $attributes->merge(['name' => $name]) }}
    class=" border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block p-2.5 w-full text-sm text-gray-900 border dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $slot }}</textarea>
