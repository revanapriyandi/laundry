<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="flex flex-wrap -mx-3">

                <div class="block w-full max-w-full px-3 flex-0 ">
                    <form method="POST" action="{{ route('pesanan.store') }}" class="p-6">
                        @csrf
                        @method('POST')

                        <h2
                            class="text-lg font-medium text-gray-900 border-b border-solid pb-2 shrink-0 border-slate-100 rounded-t-xl">
                            {{ __('Buat Pesanan') }}
                        </h2>
                        <div class="flex flex-wrap pt-4">
                            <div class="w-1/2 pr-2">
                                <x-input-label for="jenis_layanan" required :value="__('Jenis Layanan')" />
                                <x-select name="jenis_layanan" choices-select="" tabindex="1" autofocus>
                                    <option value="" selected>Pilih Layanan</option>
                                    @foreach ($layanan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('jenis_layanan') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error :messages="$errors->buatPesanan->get('jenis_layanan')" class="mt-2" />
                            </div>
                            <div class="w-1/2 pl-2">
                                <x-input-label for="pelanggan" required :value="__('Pelanggan')" />
                                <x-select name="pelanggan" choices-select="" tabindex="2">
                                    <option value="" selected>Pilih Pelanggan</option>
                                    @foreach ($user as $u)
                                        <option value="{{ $u->id }}"
                                            {{ old('pelanggan') == $u->id ? 'selected' : '' }}>
                                            {{ $u->name }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error :messages="$errors->buatPesanan->get('pelanggan')" class="mt-2" />
                            </div>

                            <div class="pr-2 w-1/2">
                                <x-input-label for="berat" required :value="__('Berat')" />
                                <x-text-input id="berat" class="block mt-1 w-full" type="text" name="berat"
                                    :value="old('berat')" required tabindex="3" placeholder="5.3" />
                                <small class="text-small text-gray-400">gunakan titik untuk bilangan decimal</small>
                                <x-input-error :messages="$errors->buatPesanan->get('berat')" class="mt-2" />
                            </div>
                            <div class="pl-2 w-1/2">
                                <x-input-label for="tanggal_dipesan" :value="__('Tanggal Dipesan')" />
                                <x-text-input id="tanggal_dipesan" class="block mt-1 w-full" type="datetime-local"
                                    name="tanggal_dipesan" :value="old('tanggal_dipesan')" tabindex="4" />
                                <x-input-error :messages="$errors->buatPesanan->get('tanggal_dipesan')" class="mt-2" />
                            </div>

                            <div class="pt-2 w-full">
                                <x-input-label for="catatan" :value="__('Catatan')" />
                                <x-textarea rows="4" name="catatan" tabindex="5" placeholder="Baju Kaos">
                                    {{ old('catatan') }}
                                </x-textarea>
                                <x-input-error :messages="$errors->buatPesanan->get('catatan')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button onclick="window.history.back()">
                                {{ __('Cancel') }}
                            </x-secondary-button>

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
