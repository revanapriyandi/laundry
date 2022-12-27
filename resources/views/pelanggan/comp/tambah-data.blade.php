<x-modal name="tambah-user" :show="$errors->addPelanggan->isNotEmpty()" focusable>
    <form method="POST" action="{{ route('pelanggan.store') }}" class="p-6">
        @csrf
        @method('POST')
        <h2 class="text-lg font-medium text-gray-900 border-b border-solid pb-2 shrink-0 border-slate-100 rounded-t-xl">
            {{ __('Tambah Data Pelanggan') }}
        </h2>
        <div class="flex flex-wrap pt-4">
            <div class="w-full">
                <x-input-label for="nama" required :value="__('Nama')" />
                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')"
                    required autofocus tabindex="1" />
                <x-input-error :messages="$errors->addPelanggan->get('nama')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                    tabindex="2" />
                <x-input-error :messages="$errors->addPelanggan->get('email')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-input-label for="phone" required :value="__('No. Telp')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required tabindex="3" placeholder="628xxxxxxxx" />
                <x-input-error :messages="$errors->addPelanggan->get('phone')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-input-label for="address" :value="__('Alamat')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    tabindex="4" />
                <x-input-error :messages="$errors->addPelanggan->get('address')" class="mt-2" />
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
