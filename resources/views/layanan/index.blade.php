<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Layanan Laundry') }}
        </h2>
    </x-slot>
    <x-link-header type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'tambah-layanan')">
        Tambah Layanan
    </x-link-header>

    <div class="flex flex-wrap my-6 -mx-3">
        <div class="w-full max-w-full px-3 flex-0">

            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">

                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                    <div class="lg:flex">
                        <div>
                            <h5 class="mb-0 dark:text-white">Data Layanan Laundry</h5>
                            <p class="mb-0 leading-normal text-sm">Semua data layanan {{ config('app.name') }} yang
                                terdaftar disistem</p>
                        </div>
                        <div class="my-auto mt-6 ml-auto lg:mt-0">
                            <div class="my-auto ml-auto">
                                <button type="button"
                                    class="inline-block px-8 py-2 m-0 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-gray-900 to-slate-800 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85"
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'tambah-layanan')">+&nbsp;
                                    Tambah Layanan</button>
                                <button export-button-table="" data-type="csv"
                                    class="inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border-gray-500 text-slate-500 hover:text-gray-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-gray-500 active:bg-gray-500 active:text-white hover:active:border-gray-500 hover:active:bg-transparent hover:active:text-gray-500 hover:active:opacity-75">Export</button>
                            </div>
                        </div>
                    </div>
                </div>

                @include('layanan.partial.create-layanan')
                <div class="table-responsive overflow-x-auto ps">

                    <table class="table table-flush text-slate-500 " datatable id="table-list">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Minimal Order</th>
                                <th>Harga</th>
                                <th>Estimasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($layanan as $i => $item)
                                <tr>
                                    <td class="font-semibold leading-tight text-xs">{{ $i + 1 }}</td>
                                    <td class="font-semibold leading-tight text-xs">
                                        <a href="{{ route('pelanggan.edit', $item->id) }}" class="flex items-center">
                                            <i class="fa fa-service"></i>
                                            <span>{{ $item->name }}</span>
                                        </a>
                                    </td>
                                    <td class="font-semibold leading-tight text-xs">
                                        <span class="uppercase">{{ $item->jenis }}</span>
                                    </td>
                                    <td class="font-semibold leading-tight text-xs">
                                        <span>{{ $item->minimal_order }} Kg</span>
                                    </td>
                                    <td class="font-semibold leading-tight text-xs">
                                        <div class="flex items-center">
                                            <span>{{ $item->rupiah() }}</span>
                                        </div>
                                    </td>
                                    <td class="font-semibold leading-tight text-xs">
                                        {{ $item->estimasi }}
                                    </td>
                                    <td class="leading-normal text-sm">
                                        <a href="{{ route('layanan.edit', $item->id) }}" class="mx-4 edit_layanan">
                                            <i class="fas fa-user-edit text-slate-400 dark:text-white/70"
                                                aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('layanan.destroy', $item->id) }}"
                                            onclick="return confirm('Are you sure to delete?')">
                                            <i class="fas fa-trash text-slate-400 dark:text-white/70"
                                                aria-hidden="true"></i>
                                        </a>
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

</x-app-layout>
