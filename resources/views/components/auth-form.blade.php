@props(['name', 'salutation' => 'Hello Again!'])

@if ($name)
    <div class="pb-56 pt-12 m-4 min-h-50-screen items-start rounded-xl p-0 relative overflow-hidden flex bg-cover bg-center "
        style="background-image: url({{ asset('assets/img/illustrations/bg-login.jpg') }})">
        <span
            class="absolute top-0 left-0 w-full h-full bg-center bg-cover opacity-60 bg-gradient-to-tl from-gray-900 to-slate-800">

            <div class="container z-1">
                <div class="flex flex-wrap justify-center -mx-3">
                    <div class="w-full max-w-full px-3 mx-auto text-center shrink-0 lg:flex-0 lg:w-5/12">
                        <h1 class="mt-12 mb-2 text-white">{{ $salutation }}</h1>
                    </div>
                </div>
            </div>
        </span>
    </div>
    <div class="container">
        <div class="flex flex-wrap justify-center -mx-3 -mt-48 lg:-mt-48 md:-mt-56">
            <div class="w-full max-w-full px-3 mx-auto shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                <div
                    class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="text-center border-black/12.5 rounded-t-2xl border-b-0 border-solid pt-6">
                        <h5>{{ $name }}</h5>
                    </div>
                    <div class="flex-auto p-6 text-center">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
