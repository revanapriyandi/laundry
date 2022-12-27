<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 flex-0 md:w-5/12 lg:5/12">
                    <h2 class="text-lg text-gray-900">
                        {{ __('Edit Data Layanan') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Mengubah data layanan aplikasi anda.') }}
                    </p>
                </div>
                <div class="block w-full max-w-full px-3 flex-0 md:w-7/12 lg:7/12">
                    <form method="POST" action="{{ route('layanan.update', $data->id) }}" class="p-6">
                        @csrf
                        @method('PUT')

                        <h2
                            class="text-lg font-medium text-gray-900 border-b border-solid pb-2 shrink-0 border-slate-100 rounded-t-xl">
                            {{ __('Edit Data Layanan') }}
                        </h2>
                        <div class="flex flex-wrap pt-4">
                            <div class="w-full">
                                <x-input-label for="jenis" required :value="__('Jenis Layanan')" />
                                <x-select name="jenis" tabindex="1" autofocus>
                                    <option value="kiloan" {{ $data->jenis == 'kiloan' ? 'selected' : '' }}>Kiloan
                                    </option>
                                    <option value="meter_persegi"
                                        {{ $data->jenis == 'meter_persegi' ? 'selected' : '' }}>Meter Persegi
                                    </option>
                                    <option value="meteran" {{ $data->jenis == 'meteran' ? 'selected' : '' }}>Meteran
                                    </option>
                                    <option value="satuan" {{ $data->jenis == 'satuan' ? 'selected' : '' }}>Satuan
                                    </option>
                                </x-select>
                                <x-input-error :messages="$errors->editLayanan->get('jenis')" class="mt-2" />
                            </div>

                            <div class="pr-2 w-1/2">
                                <x-input-label for="name" required :value="__('Nama Layanan')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="$data->name" required tabindex="2" />
                                <x-input-error :messages="$errors->editLayanan->get('name')" class="mt-2" />
                            </div>
                            <div class="pl-2 w-1/2">
                                <x-input-label for="minimal_order" required :value="__('Minimal Order')" />
                                <x-text-input id="minimal_order" class="block mt-1 w-full" type="number"
                                    name="minimal_order" :value="$data->minimal_order" tabindex="3" />
                                <small class="text-grey-100 text-center text-sm">Dalam Kg</small>
                                <x-input-error :messages="$errors->editLayanan->get('minimal_order')" class="mt-2" />
                            </div>

                            <div class="pr-2 w-1/2">
                                <x-input-label for="harga" required :value="__('Harga')" />
                                <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga"
                                    :value="$data->harga" required tabindex="4" />
                                <x-input-error :messages="$errors->editLayanan->get('harga')" class="mt-2" />
                            </div>
                            <div class="pl-2 w-1/2">
                                <x-input-label for="estimasi" required :value="__('Estimasi Pengerjaan')" />
                                <x-text-input id="estimasi" placeholder="1 Hari" class="block mt-1 w-full"
                                    type="text" name="estimasi" :value="$data->estimasi" tabindex="5" />
                                <x-input-error :messages="$errors->editLayanan->get('estimasi')" class="mt-2" />
                            </div>
                            <div class="w-full pt-2">
                                <x-input-label for="keterangan" :value="__('Keterangan')" />
                                <x-textarea rows="4" tabindex="6" placeholder="Keteranganmu..."
                                    name="keterangan" id="keterangan">
                                    {{ $data->keterangan }}</x-textarea>
                                <x-input-error :messages="$errors->editLayanan->get('keterangan')" class="mt-2" />
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
