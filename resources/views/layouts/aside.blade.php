<aside mini="false"
    class="dark:bg-gray-950 ease-soft-in-out z-990 max-w-64 dark: fixed inset-y-0 left-0 my-4 xl:ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 transition-all duration-200 xl:translate-x-0 ps ps--active-y xl:bg-white xl:shadow-soft-xl"
    id="sidenav-main">
    <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/logo-ct.png') }}"
                class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">{{ config('app.name') }}</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-full h-auto grow basis-full">
        <ul class="flex flex-col pl-0 mb-0 list-none">
            <li class="mt-0.5 w-full">
                <x-nav-link href="{{ route('dashboard') }}" icon="fa fa-home" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>

            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Transaksi</h6>
            </li>

            <li class="mt-0.5 w-full">
                <x-nav-link href="{{ route('pesanan.index') }}" icon="ni ni-cart" :active="request()->routeIs(['pesanan.index'])">
                    {{ __('Data Pesanan') }}
                </x-nav-link>
            </li>
            @if (auth()->user()->role == 'admin')
                <li class="mt-0.5 w-full">
                    <x-nav-link href="{{ route('pesanan.create') }}" icon="ni ni-cart" :active="request()->routeIs(['pesanan.create'])">
                        {{ __('Buat Pesanan') }}
                    </x-nav-link>
                </li>

                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Master Data</h6>
                </li>

                <li class="mt-0.5 w-full">
                    <x-nav-link href="{{ route('pelanggan.index') }}" icon="fa fa-users" :active="request()->routeIs(['pelanggan.*'])">
                        {{ __('Pelanggan') }}
                    </x-nav-link>
                </li>

                <li class="mt-0.5 w-full">
                    <x-nav-link href="{{ route('layanan.index') }}" icon="fa fa-server" :active="request()->routeIs(['layanan.*'])">
                        {{ __('Data Layanan') }}
                    </x-nav-link>
                </li>

                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Settings</h6>
                </li>

                <li class="mt-0.5 w-full">
                    <x-nav-link href="{{ route('settings.index') }}" icon="fa fa-cog" :active="request()->routeIs(['setting.*'])">
                        {{ __('Pengaturan') }}
                    </x-nav-link>
                </li>
            @endif

        </ul>

    </div>

</aside>
