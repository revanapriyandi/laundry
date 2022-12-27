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
                        {{ __('Edit Data Pelanggan') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Mengubah data pelanggan termasuk menjadikannya admin.') }}
                    </p>
                </div>
                <div class="block w-full max-w-full px-3 flex-0 md:w-7/12 lg:7/12">
                    <form method="POST" action="{{ route('pelanggan.update', $user->id) }}" class="p-6">
                        @csrf
                        @method('PUT')

                        <h2
                            class="text-lg text-gray-900 border-b border-solid pb-2 shrink-0 border-slate-100 rounded-t-xl">
                            {{ __('Edit Data Pelanggan') }}
                        </h2>
                        <div class="flex flex-wrap pt-4">
                            <div class="w-full pt-2">
                                <x-input-label for="name" required :value="__('Nama')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="$user->name" required autofocus tabindex="1" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="w-full pt-2">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                    :value="$user->email" tabindex="2" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="w-full pt-2">
                                <x-input-label for="phone" required :value="__('No. Telp')" />
                                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                    :value="$user->phone" required tabindex="3" placeholder="628xxxxxxxx" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                            <div class="w-full pt-2">
                                <x-input-label for="address" :value="__('Alamat')" />
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                    :value="$user->address" tabindex="4" />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>

                            <div class="w-full pt-2">
                                <x-input-label for="role" :value="__('Role')" />
                                <x-select name="role" id="role">
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="pelanggan" {{ $user->role == 'pelanggan' ? 'selected' : '' }}>
                                        Pelanggan
                                    </option>
                                </x-select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
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
