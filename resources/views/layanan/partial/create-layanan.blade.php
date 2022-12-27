<x-modal name="tambah-layanan" :show="$errors->addLayanan->isNotEmpty()" focusable>
    <form method="POST" action="{{ route('layanan.store') }}" class="p-6">
        @csrf

        <h2 class="text-lg font-medium text-gray-900 border-b border-solid pb-2 shrink-0 border-slate-100 rounded-t-xl">
            {{ __('Tambah Data Layanan') }}
        </h2>
        <div class="flex flex-wrap pt-4">
            <div class="w-full">
                <x-input-label for="jenis" required :value="__('Jenis Layanan')" />
                <x-select name="jenis" tabindex="1" autofocus>
                    <option value="kiloan" {{ old('jenis') == 'kiloan' ? 'selected' : '' }}>Kiloan</option>
                    <option value="meter_persegi" {{ old('jenis') == 'meter_persegi' ? 'selected' : '' }}>Meter Persegi
                    </option>
                    <option value="meteran" {{ old('jenis') == 'meteran' ? 'selected' : '' }}>Meteran</option>
                    <option value="satuan" {{ old('jenis') == 'satuan' ? 'selected' : '' }}>Satuan</option>
                </x-select>
                <x-input-error :messages="$errors->addLayanan->get('jenis')" class="mt-2" />
            </div>

            <div class="pr-2 w-1/2">
                <x-input-label for="name" required :value="__('Nama Layanan')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required tabindex="2" />
                <x-input-error :messages="$errors->addLayanan->get('name')" class="mt-2" />
            </div>
            <div class="pl-2 w-1/2">
                <x-input-label for="minimal_order" required :value="__('Minimal Order')" />
                <x-text-input id="minimal_order" class="block mt-1 w-full" type="number" name="minimal_order"
                    :value="old('minimal_order')" tabindex="3" />
                <small class="text-grey-100 text-center text-sm">Dalam Kg</small>
                <x-input-error :messages="$errors->addLayanan->get('minimal_order')" class="mt-2" />
            </div>

            <div class="pr-2 w-1/2">
                <x-input-label for="harga" required :value="__('Harga')" />
                <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="old('harga')"
                    required tabindex="4" />
                <x-input-error :messages="$errors->addLayanan->get('harga')" class="mt-2" />
            </div>
            <div class="pl-2 w-1/2">
                <x-input-label for="estimasi" required :value="__('Estimasi Pengerjaan')" />
                <x-text-input id="estimasi" placeholder="1 Hari" class="block mt-1 w-full" type="text"
                    name="estimasi" :value="old('estimasi')" tabindex="5" />
                <x-input-error :messages="$errors->addLayanan->get('estimasi')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-input-label for="keterangan" :value="__('Keterangan')" />
                <x-textarea rows="4" tabindex="6" placeholder="Keteranganmu..." name="keterangan"
                    id="keterangan">
                    {{ old('keterangan') }}</x-textarea>
                <x-input-error :messages="$errors->addLayanan->get('keterangan')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ml-3">
                {{ __('Simpan') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
