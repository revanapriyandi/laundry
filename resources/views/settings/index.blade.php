<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="w-full p-6 py-4 mx-auto my-4">
        <div class="flex flex-wrap mb-12 -mx-3">
            <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 lg:w-3/12">
                <div
                    class="sticky flex flex-col min-w-0 break-words bg-white border-0 top-1/100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                    <ul class="flex flex-col flex-wrap p-4 mb-0 list-none rounded-xl">
                        <li>
                            <a href="#general"
                                class="block px-4 py-2 transition-colors rounded-lg ease-soft-in-out text-slate-500 hover:bg-gray-200">
                                <div class="inline-block mr-2 text-black fill-current h-4 w-4 stroke-none">
                                    <span class="fa fa-rocket"></span>
                                </div>
                                <span class="leading-normal text-sm dark:text-white">General</span>
                            </a>
                        </li>
                        <li class="pt-2">
                            <a href="#notifications"
                                class="block px-4 py-2 transition-colors rounded-lg ease-soft-in-out text-slate-500 hover:bg-gray-200">
                                <div class="inline-block mr-2 text-black fill-current h-4 w-4 stroke-none">
                                    <svg class="mb-1 text-dark" width="16px" height="16px" viewBox="0 0 44 43"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>megaphone</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-2168.000000, -591.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(452.000000, 300.000000)">
                                                        <path class="fill-slate-800"
                                                            d="M35.7958333,0.273166667 C35.2558424,-0.0603712374 34.5817509,-0.0908856664 34.0138333,0.1925 L19.734,7.33333333 L9.16666667,7.33333333 C4.10405646,7.33333333 0,11.4373898 0,16.5 C0,21.5626102 4.10405646,25.6666667 9.16666667,25.6666667 L19.734,25.6666667 L34.0138333,32.8166667 C34.5837412,33.1014624 35.2606401,33.0699651 35.8016385,32.7334768 C36.3426368,32.3969885 36.6701539,31.8037627 36.6666942,31.1666667 L36.6666942,1.83333333 C36.6666942,1.19744715 36.3370375,0.607006911 35.7958333,0.273166667 Z">
                                                        </path>
                                                        <path class="fill-slate-800"
                                                            d="M38.5,11 L38.5,22 C41.5375661,22 44,19.5375661 44,16.5 C44,13.4624339 41.5375661,11 38.5,11 Z"
                                                            opacity="0.601050967"></path>
                                                        <path class="fill-slate-800"
                                                            d="M18.5936667,29.3333333 L10.6571667,29.3333333 L14.9361667,39.864 C15.7423448,41.6604248 17.8234451,42.4993948 19.6501416,41.764381 C21.4768381,41.0293672 22.3968823,38.982817 21.7341667,37.1286667 L18.5936667,29.3333333 Z"
                                                            opacity="0.601050967"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <span class="leading-normal text-sm dark:text-white">Notifications</span>
                            </a>
                        </li>
                        @if ($setting->whatsapp_notification)
                            <li class="pt-2">
                                <a href="{{ route('settings.whatsapp') }}"
                                    class="block px-4 py-2 transition-colors rounded-lg ease-soft-in-out text-slate-500 hover:bg-gray-200">
                                    <div class="inline-block mr-2 text-black fill-current h-4 w-4 stroke-none">
                                        <span class="fa fa-whatsapp"></span>
                                    </div>
                                    <span class="leading-normal text-sm dark:text-white">Whatsapp</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 lg:w-9/12">
                <div class="relative flex flex-col flex-auto min-w-0 p-4 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border"
                    id="general">
                    <div class="p-6 mb-0 rounded-t-2xl">
                        <h5 class="dark:text-white">General</h5>
                    </div>
                    <div class="flex-auto p-6 pt-0">
                        <form method="POST" action="{{ route('settings.update') }}">
                            @csrf
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-6/12 max-w-full px-3 flex-0">
                                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                        for="name">Nama Laundry</label>
                                    <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                        <input type="text" required name="name" value="{{ $setting->name }}"
                                            placeholder="{{ $setting->name }}"
                                            class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"
                                            spellcheck="false" data-ms-editor="true">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="w-6/12 max-w-full px-3 flex-0">
                                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                        for="no_telp">No Telp</label>
                                    <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                        <input type="text" required name="no_telp" value="{{ $setting->no_telp }}"
                                            placeholder="{{ $setting->no_telp }}"
                                            class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"
                                            spellcheck="false" data-ms-editor="true">
                                        <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="w-6/12 max-w-full px-3 flex-0">
                                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                        for="TELEGRAM_BOT_TOKEN">Telegram Bot Token</label>
                                    <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                        <input type="text" required name="TELEGRAM_BOT_TOKEN"
                                            value="{{ $setting->TELEGRAM_BOT_TOKEN }}"
                                            placeholder="{{ $setting->TELEGRAM_BOT_TOKEN }}"
                                            class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"
                                            spellcheck="false" data-ms-editor="true">
                                        <small class="text-gray-700  text-xs">Telegram token you receive from
                                            @BotFather</small>
                                        <x-input-error :messages="$errors->get('TELEGRAM_BOT_TOKEN')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="w-6/12 max-w-full px-3 flex-0">
                                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                        for="TELEGRAM_ID_CHANEL">Telegram ID Channel / Grub</label>
                                    <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                        <input type="text" required name="TELEGRAM_ID_CHANEL"
                                            value="{{ $setting->TELEGRAM_ID_CHANEL }}"
                                            placeholder="{{ $setting->TELEGRAM_ID_CHANEL }}"
                                            class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"
                                            spellcheck="false" data-ms-editor="true">
                                        <small class="text-gray-700  text-xs">Telegram ID Channel</small>
                                        <x-input-error :messages="$errors->get('TELEGRAM_ID_CHANEL')" class="mt-2" />
                                    </div>
                                </div>

                            </div>

                            <div class="w-full">
                                <x-input-label for="alamat" :value="__('Alamat')" />
                                <x-textarea rows="4" tabindex="6" placeholder="{{ $setting->alamat }}"
                                    name="alamat" id="alamat">{{ $setting->alamat }}</x-textarea>
                                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-primary-button class="ml-3">
                                    {{ __('Simpan') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border"
                    id="notifications">
                    <div class="p-6 rounded-t-2xl">
                        <h5 class="dark:text-white">Notifications</h5>
                        <p class="leading-normal text-sm dark:text-white/60">Pilih cara Anda menerima notifikasi. Ini
                            Pengaturan notifikasi berlaku untuk hal-hal yang Anda lakukan.</p>
                    </div>
                    <div class="flex-auto p-6 pt-0">
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-6/12 max-w-full px-3 flex-0">
                                <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                    for="whatsapp">Notifikasi Whatsapp</label>
                                <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                    <div class="flex items-center justify-center pl-12 mb-0 min-h-6">
                                        <x-checkbox onclick="StatusNotif({{ $setting->id }},'whatsapp')"
                                            name="whatsapp" id="whatsapp" :check="$setting->whatsapp_notification" />
                                    </div>
                                    <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />
                                </div>
                            </div>
                            <div class="w-6/12 max-w-full px-3 flex-0">
                                <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                    for="telegram">Notifikasi Telegram</label>
                                <div class="relative flex flex-wrap items-stretch w-full rounded-lg">
                                    <div class="flex items-center justify-center pl-12 mb-0 min-h-6">
                                        <x-checkbox onclick="StatusNotif({{ $setting->id }}, 'telegram')"
                                            name="telegram" id="telegram" :check="$setting->telegram_notification" />
                                    </div>
                                    <x-input-error :messages="$errors->get('telegram')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto ps">
                            <table class="w-full mb-0 align-top border-gray-200 text-slate-500 dark:border-white/40">
                                <thead class="align-bottom">
                                    <tr>
                                        <th colspan="4"
                                            class="px-6 py-3 pl-1 font-semibold capitalize align-middle bg-transparent border-b border-solid shadow-none tracking-none whitespace-nowrap border-b-gray-200 dark:border-white/40 dark:text-white">
                                            <p class="mb-0 dark:text-white/60">Activity</p>
                                        </th>
                                        {{--  <th
                                            class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-solid shadow-none tracking-none whitespace-nowrap border-b-gray-200 dark:border-white/40 dark:text-white">
                                            <p class="mb-0 dark:text-white/60">Email</p>
                                        </th>  --}}
                                        @if ($setting->telegram_notification)
                                            <th
                                                class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-solid shadow-none tracking-none whitespace-nowrap border-b-gray-200 dark:border-white/40 dark:text-white">
                                                <p class="mb-0 dark:text-white/60">Telegram</p>
                                            </th>
                                        @endif
                                        @if ($setting->whatsapp_notification)
                                            <th
                                                class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-solid shadow-none tracking-none whitespace-nowrap border-b-gray-200 dark:border-white/40 dark:text-white">
                                                <p class="mb-0 dark:text-white/60">Whatsapp</p>
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notifikasi as $notif)
                                        <tr>
                                            <td class="p-2 pl-1 align-top border-b whitespace-nowrap dark:border-white/40 dark:text-white"
                                                colspan="4">
                                                <div class="my-auto">
                                                    <span
                                                        class="block leading-normal text-sm text-slate-700 dark:text-white">{{ $notif->nama }}</span>
                                                </div>
                                            </td>
                                            {{--  <td
                                                class="p-2 align-top bg-transparent border-b whitespace-nowrap dark:border-white/40 dark:text-white">
                                                <div class="flex items-center justify-center pl-12 mb-0 min-h-6">
                                                    <x-checkbox name="email"
                                                        onclick="editStatusNotif({{ $notif->id }}, 'email')"
                                                        id="email" :check="$notif->email" />
                                                </div>
                                            </td>  --}}

                                            @if ($setting->telegram_notification)
                                                <td
                                                    class="p-2 align-top bg-transparent border-b whitespace-nowrap dark:border-white/40 dark:text-white">
                                                    <div class="flex items-center justify-center pl-12 mb-0 min-h-6">
                                                        <x-checkbox name="telegram" id="telegram"
                                                            onclick="editStatusNotif({{ $notif->id }}, 'telegram')"
                                                            :check="$notif->telegram" />
                                                    </div>
                                                </td>
                                            @endif

                                            @if ($setting->whatsapp_notification)
                                                <td
                                                    class="p-2 align-top bg-transparent border-b whitespace-nowrap dark:border-white/40 dark:text-white">
                                                    <div class="flex items-center justify-center pl-12 mb-0 min-h-6">
                                                        <x-checkbox name="whatsapp"
                                                            onclick="editStatusNotif({{ $notif->id }}, 'whatsapp')"
                                                            id="whatsapp" :check="$notif->whatsapp" />
                                                    </div>
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
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function StatusNotif(id, type) {

                $.ajax({
                    type: 'POST',
                    url: "{{ route('settings.notif') }}",
                    data: {
                        id: id,
                        type: type,
                    },
                    success: function(data) {
                        alert(data.success);
                        location.reload(true);
                    },
                });
            };

            function editStatusNotif(id, type) {

                $.ajax({
                    type: 'POST',
                    url: "{{ route('settings.notifikasi') }}",
                    data: {
                        id: id,
                        type: type,
                    },
                    success: function(data) {
                        alert(data.success);
                        location.reload(true);
                    },
                });
            };
        </script>
    @endpush
</x-app-layout>
