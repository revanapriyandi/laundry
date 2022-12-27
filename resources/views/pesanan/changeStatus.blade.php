<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Status Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="flex flex-wrap -mx-3">
                <div class="block w-full max-w-full px-3 flex-0 ">
                    <form method="POST" action="{{ route('pesanan.changeStatus', $item->id) }}" class="p-6">
                        @csrf
                        @method('POST')

                        <h2
                            class="text-lg font-medium text-gray-900 border-b border-solid pb-2 shrink-0 border-slate-100 rounded-t-xl">
                            {{ __('Change Status Pesanan') }}
                        </h2>
                        <div class="block w-full max-w-full px-3 flex-0 ">
                            <div class="w-full pr-2">
                                <x-input-label for="statusPesanan" required :value="__('Ubah Status Pesanan')" />
                                <x-select name="statusPesanan" id="statusPesanan" choices-select="{{ $item->status }}"
                                    tabindex="1" autofocus>
                                    <option value="diterima" {{ $item->status == 'diterima' ? 'selected' : '' }}>
                                        Diterima
                                    </option>
                                    <option value="proses" {{ $item->status == 'proses' ? 'selected' : '' }}>
                                        DiProses
                                    </option>
                                    <option value="siap_diambil"
                                        {{ $item->status == 'siap_diambil' ? 'selected' : '' }}>
                                        Siap Diambil
                                    </option>
                                    <option value="batal" {{ $item->status == 'batal' ? 'selected' : '' }}>
                                        DiBatalkan
                                    </option>
                                    <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>
                                </x-select>
                                <x-input-error :messages="$errors->statusPesananBag->get('statusPesanan')" class="mt-2" />
                            </div>

                        </div>

                        <div class="mt-6 flex justify-end">

                            <x-primary-button class="ml-3" type="submit">
                                {{ __('Lanjut') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
