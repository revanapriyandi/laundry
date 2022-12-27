<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-wrap -mx-3">
        <div class="max-w-full px-3 mb-6 rounded">
            <div class="p-6 sm:px-20 rounded bg-white border-b border-gray-200">
                <div class="mt-8 text-2xl">
                    Selamat Datang {{ auth()->user()->name }}, di {{ config('app.name') }}
                </div>

                <div class="mt-6 text-gray-500">
                    {{ config('app.name') }} adalah aplikasi untuk memudahkan anda dalam melakukan pencatatan laundry.
                    Anda dapat melakukan pencatatan laundry dengan mudah dan cepat. Anda juga dapat melihat status
                    laundry anda dengan mudah.
                </div>
            </div>

        </div>
    </div>

    @if (auth()->user()->role == 'admin')
        <div class="flex flex-wrap -mx-3">
            <!-- card1 -->
            <div class="max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">
                                        Jumlah Pelanggan
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        {{ $users->count() }}
                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card2 -->
            <div class="max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">
                                        Laundry Masuk
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        {{ $laundry->count() }}
                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800">
                                    <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card3 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">
                                        Laundry Selesai
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        {{ $laundry->where('status', 'selesai')->count() }}
                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800">
                                    <i class="fa fa-check leading-none  text-white text-lg relative top-3.5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card4 -->
            <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">
                                        Laundry Diambil
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        {{ $laundry->where('status', 'diambil')->count() }}
                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800">
                                    <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap mt-6 -mx-3">

            <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
                <div
                    class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex">
                            <div class="max-w-full px-3 mt-0 w-1/2">
                                <h6 class="mb-0 ml-2">Pendapatan</h6>
                            </div>
                            <div class="max-w-full px-3 mt-0 w-1/2">
                                <p class="ml-2 leading-normal text-sm">
                                    (<span class="font-bold">Pendapatan</span>) tahunan dan bulanan
                                </p>
                            </div>
                        </div>
                        <div class="w-full px-6 mx-auto max-w-screen-2xl rounded-xl">
                            <div class="flex flex-wrap mt-0 -mx-3">
                                <div class="flex-none w-1/3 max-w-full py-4 pl-0 pr-3 mt-0">
                                    <div class="flex mb-2">
                                        <div
                                            class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-to-tl from-gray-900 to-slate-800 text-neutral-900">
                                            <i class="fa fa-dollar text-white"></i>
                                        </div>
                                        <p class="mt-1 mb-0 font-semibold leading-tight text-xs">
                                            Pendapatan tahun ini
                                        </p>
                                    </div>
                                    <h4 class="font-bold">
                                        {{ 'Rp ' . number_format($pendapatan_tahun_ini, 0, ',', '.') }}
                                    </h4>
                                    <div class="text-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
                                        <div class="duration-600 ease-soft -mt-0.38 -ml-px flex h-1.5 w-3/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all"
                                            role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-none w-1/3 max-w-full py-4 pl-0 pr-3 mt-0">
                                    <div class="flex mb-2">
                                        <div
                                            class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-to-tl from-gray-900 to-slate-800 text-neutral-900">
                                            <i class="fa fa-dollar text-white"></i>
                                        </div>
                                        <p class="mt-1 mb-0 font-semibold leading-tight text-xs">
                                            Pedapatan Bulan ini
                                        </p>
                                    </div>
                                    <h4 class="font-bold">
                                        {{ 'Rp ' . number_format($pendapatan_bulan_ini, 0, ',', '.') }}
                                    </h4>
                                    <div class="text-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
                                        <div class="duration-600 ease-soft -mt-0.38 -ml-px flex h-1.5 w-3/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all"
                                            role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-none w-1/3 max-w-full py-4 pl-0 pr-3 mt-0">
                                    <div class="flex mb-2">
                                        <div
                                            class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-to-tl from-gray-900 to-slate-800 text-neutral-900">
                                            <i class="fa fa-dollar text-white"></i>
                                        </div>
                                        <p class="mt-1 mb-0 font-semibold leading-tight text-xs">
                                            Pendapatan tahun lalu
                                        </p>
                                    </div>
                                    <h4 class="font-bold">
                                        {{ 'Rp ' . number_format($pendapatan_tahun_lalu, 0, ',', '.') }}
                                    </h4>
                                    <div class="text-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
                                        <div class="duration-600 ease-soft -mt-0.38 -ml-px flex h-1.5 w-3/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all"
                                            role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
                <div
                    class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex">
                            <div class="max-w-full px-3 mt-0 w-1/2">
                                <h6 class="mb-0 ml-2">Pendapatan</h6>
                            </div>
                            <div class="max-w-full px-3 mt-0 w-1/2">
                                <p class="ml-2 leading-normal text-sm">
                                    (<span class="font-bold">Pendapatan</span>) Harian
                                </p>
                            </div>
                        </div>
                        <div class="w-full px-6 mx-auto max-w-screen-2xl rounded-xl">
                            <div class="flex flex-wrap mt-0 -mx-3">
                                <div class="flex-none w-1/2 max-w-full py-4 pl-0 pr-3 mt-0">
                                    <div class="flex mb-2">
                                        <div
                                            class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-to-tl from-gray-900 to-slate-800 text-neutral-900">
                                            <i class="fa fa-dollar text-white"></i>
                                        </div>
                                        <p class="mt-1 mb-0 font-semibold leading-tight text-xs">
                                            Pendapatan hari ini
                                        </p>
                                    </div>
                                    <h4 class="font-bold">
                                        {{ 'Rp ' . number_format($pendapatan_hari_ini, 0, ',', '.') }}
                                    </h4>
                                    <div class="text-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
                                        <div class="duration-600 ease-soft -mt-0.38 -ml-px flex h-1.5 w-3/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all"
                                            role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-none w-1/2 max-w-full py-4 pl-0 pr-3 mt-0">
                                    <div class="flex mb-2">
                                        <div
                                            class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-to-tl from-gray-900 to-slate-800 text-neutral-900">
                                            <i class="fa fa-dollar text-white"></i>
                                        </div>
                                        <p class="mt-1 mb-0 font-semibold leading-tight text-xs">
                                            Pedapatan Kemarin
                                        </p>
                                    </div>
                                    <h4 class="font-bold">
                                        {{ 'Rp ' . number_format($pendapatan_kemarin, 0, ',', '.') }}
                                    </h4>
                                    <div class="text-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
                                        <div class="duration-600 ease-soft -mt-0.38 -ml-px flex h-1.5 w-3/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all"
                                            role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap mt-6 -mx-3">


            <div class="w-full max-w-full px-3 mt-0 ">
                <div
                    class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                        <h6>Pesanan overview</h6>
                    </div>
                    <div class="my-auto mt-6 ml-auto lg:mt-0">
                        <div class="my-auto ml-auto">
                            <a href="{{ route('pesanan.create') }}"
                                class="inline-block px-8 py-2 m-0 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-gray-700 to-gray-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">+&nbsp;
                                Buat Pesanan</a>
                        </div>
                    </div>
                    <div class="flex-auto p-4">
                        <div>

                            <div class="table-responsive overflow-x-auto ps">

                                <table class="table table-flush text-slate-500 " datatable id="table-list">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>No. Nota</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Status</th>
                                            <th>Estimasi Selesai</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i => $item)
                                            <tr>
                                                <td class="font-semibold leading-tight text-xs">{{ $i + 1 }}
                                                </td>
                                                <td class="font-semibold leading-tight text-xs">
                                                    <a
                                                        href="{{ route('pesanan.show', $item->id) }}">{{ $item->kode_unik }}</a>
                                                </td>
                                                <td class="font-semibold leading-tight text-xs">
                                                    <span>{{ date('d M Y', strtotime($item->tanggal_dipesan)) }}</span>
                                                </td>
                                                <td class="font-semibold leading-tight text-xs">
                                                    <div class="flex items-center">
                                                        @if ($item->status == 'batal')
                                                            <span
                                                                class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap bg-red-600 text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->status }}</span>
                                                        @elseif($item->status == 'diterima')
                                                            <span
                                                                class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap bg-blue-600 text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->status }}</span>
                                                        @else
                                                            <span
                                                                class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap bg-lime-200 text-center align-baseline font-bold uppercase leading-none text-lime-500">{{ $item->status }}</span>
                                                        @endif

                                                    </div>
                                                </td>
                                                <td class="font-semibold leading-tight text-xs">
                                                    <span class="uppercase">{{ $item->estimasi_selesai }}</span>
                                                </td>
                                                <td class="font-semibold leading-tight text-xs">
                                                    <div class="flex items-center">
                                                        <span>{{ $item->total_harga() }}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


</x-app-layout>
