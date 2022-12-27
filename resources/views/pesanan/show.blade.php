<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rincian Pemesanan') }}
        </h2>
    </x-slot>
    <x-link-header type="button" onclick="printDiv()">
        Print
    </x-link-header>
    <div class="flex flex-wrap -mx-3" id="GFG">
        <link href="{{ asset('assets/css/soft-ui-dashboard-tailwind.min.css?v=1.0.1') }}" rel="stylesheet" />
        <div class="w-full px-3 mx-auto lg:flex-0 shrink-0">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
                    <div class="flex items-center justify-between">
                        <div>
                            <h6 class="dark:text-white">Rincian Pesanan</h6>
                            <p class="mb-0 leading-normal text-sm">
                                Pelanggan
                                <b>{{ $data->pelanggan->name }}</b>
                            </p>
                            <p class="mb-0 leading-normal text-sm">
                                No. Invoice.
                                <b>{{ $data->kode_unik }}</b>
                            </p>
                            <p class="leading-normal text-sm">
                                Date:
                                <b>{{ date('d F Y', strtotime($data->created_at)) }}</b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex-auto p-4 pt-0">
                    <hr class="h-px mt-0 mb-6 bg-gradient-to-r from-transparent via-black/40 to-transparent">
                    <div class="flex">
                        <div
                            class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid  rounded-2xl bg-clip-border">

                            <div class="flex-auto px-0 pt-0 pb-2">
                                <div class="p-0 overflow-x-auto">
                                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Layanan</th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Kuantitas</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Total</th>
                                        </tr>
                                        @foreach ($data->items as $item)
                                            <tr>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2 py-1">
                                                        <p class="mb-0 font-semibold leading-tight text-xs">
                                                            {{ $item->layanan->name }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <p class="mb-0 font-semibold leading-tight text-xs">
                                                        {{ $item->berat }} Kg
                                                        x
                                                        {{ 'Rp. ' . number_format($item->layanan->harga, 0, ',', '.') }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                                    {{ 'Rp. ' . number_format($item->total, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"
                                                    class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                                    <span>{{ $item->catatan }}</span>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="h-px mt-0 mb-6 bg-gradient-to-r from-transparent via-black/40 to-transparent">
                    <div class="flex flex-wrap -mx-3">

                        <div class="w-full max-w-full px-3 ml-auto  flex-0">
                            <h6 class="mb-4 dark:text-white">Estimasi Selesai :
                                {{ date('d F Y H:i', strtotime($data->estimasi_selesai)) }}</h6>

                            <h6 class="mb-4 dark:text-white">Rincian Pesanan</h6>
                            <div class="flex justify-between">
                                <span class="mb-2 leading-normal text-sm">SubTotal:</span>
                                <span
                                    class="ml-2 font-semibold text-slate-700 dark:text-white">{{ $data->total_harga() }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="mb-2 leading-normal text-sm">Diskon:</span>
                                <span class="ml-2 font-semibold text-slate-700 dark:text-white">Rp. 0</span>
                            </div>
                            <div class="flex justify-between mt-6">
                                <span class="mb-2 text-lg">Total:</span>
                                <span
                                    class="ml-2 font-semibold text-lg text-slate-700 dark:text-white">{{ $data->total_harga() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function printDiv() {
                var divContents = document.getElementById("GFG").innerHTML;
                var a = window.open();
                a.document.write('<html>');
                a.document.write(divContents);
                a.document.write('</body></html>');
                a.document.close();
                a.print();
            }
        </script>
    @endpush
</x-app-layout>
