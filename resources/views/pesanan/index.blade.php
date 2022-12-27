<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pesanan') }}
        </h2>
    </x-slot>

    @if (auth()->user()->role == 'admin')
        <x-link-header type="button" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'tambah-pesanan')">
            Tambah Pesanan
        </x-link-header>
    @endif

    <div class="flex flex-wrap my-6 -mx-3">
        <div class="w-full max-w-full px-3 flex-0">

            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">

                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                    <div class="lg:flex">
                        <div>
                            <h5 class="mb-0 dark:text-white">Data Pesanan
                                {{ auth()->user()->role == 'pelanggan' ? 'Saya' : 'Laundry' }}</h5>
                            <p class="mb-0 leading-normal text-sm">Semua data pesanan {{ config('app.name') }} yang
                                terdaftar disistem</p>
                        </div>
                        <div class="my-auto mt-6 ml-auto lg:mt-0">
                            <div class="my-auto ml-auto">
                                @if (auth()->user()->role == 'admin')
                                    <button
                                        class="inline-block px-8 py-2 m-0 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-gray-900 to-slate-800 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85"
                                        type="button" x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'tambah-pesanan')">+&nbsp;
                                        Tambah Pesanan</button>
                                    <button export-button-table="" data-type="csv"
                                        class="inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border-gray-500 text-slate-500 hover:text-gray-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-gray-500 active:bg-gray-500 active:text-white hover:active:border-gray-500 hover:active:bg-transparent hover:active:text-gray-500 hover:active:opacity-75">Export</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @include('pesanan.modal')
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
                                @if (auth()->user()->role == 'admin')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $item)
                                <tr>
                                    <td class="font-semibold leading-tight text-xs">{{ $i + 1 }}</td>
                                    <td class="font-semibold leading-tight text-xs">
                                        <a href="{{ route('pesanan.show', $item->id) }}">{{ $item->kode_unik }}</a>
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
                                    @if (auth()->user()->role == 'admin')
                                        <td class="leading-tight text-sm">
                                            <div class="flex items-center">
                                                <a class="font-semibold leading-tight text-xs bg-blue-600 text-white px-2 py-1 rounded-md mr-2"
                                                    href="{{ route('pesanan.status', $item->id) }}">Change
                                                    Status</a>
                                            </div>
                                            <form method="post" action="{{ route('pesanan.cancel', $item->id) }}"
                                                class=" pt-2">
                                                @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure to cancel?')">
                                                    <i class="font-semibold leading-tight text-xs bg-red-600 text-white px-2 py-1 rounded-md mr-2"
                                                        aria-hidden="true">Batalkan</i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
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



</x-app-layout>
