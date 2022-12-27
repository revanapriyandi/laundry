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
                            <a href="{{ route('settings.index') }}"
                                class="block px-4 py-2 transition-colors rounded-lg ease-soft-in-out text-slate-500 hover:bg-gray-200">
                                <div class="inline-block mr-2 text-black fill-current h-4 w-4 stroke-none">
                                    <span class="fa fa-rocket"></span>
                                </div>
                                <span class="leading-normal text-sm dark:text-white">General</span>
                            </a>
                        </li>
                        <li class="pt-2">
                            <a href="{{ route('settings.index') }}"
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
                        <li class="pt-2">
                            <a href="#whatsapp"
                                class="block px-4 py-2 transition-colors rounded-lg ease-soft-in-out text-slate-500 hover:bg-gray-200">
                                <div class="inline-block mr-2 text-black fill-current h-4 w-4 stroke-none">
                                    <span class="fa fa-whatsapp"></span>
                                </div>
                                <span class="leading-normal text-sm dark:text-white">Whatsapp</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 lg:w-9/12">
                <div class="relative flex flex-col flex-auto min-w-0 p-4 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border"
                    id="whatsapp">
                    <div class="p-6 rounded-t-2xl">
                        <h5 class="dark:text-white">Whatsapp API</h5>
                        <p class="leading-normal text-sm dark:text-white/60">Pilih cara Anda menerima notifikasi. Ini
                            Pengaturan untuk menjalankan server whatsapp anda.</p>
                    </div>
                    <div class="flex-auto p-6 pt-0">
                        @if ($cek['message'] === 'Session not found.')
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 text-center flex-0">
                                    <h3 class="mt-12">Build Your Profile</h3>
                                    <h5 class="font-normal dark:text-white text-slate-400">Scan qr code untuk
                                        menghubungkan
                                        ke api Whatsapp.</h5>
                                    <img class="w-full mx-auto rounded-xl shadow-soft-3xl" src="{{ $image }}"
                                        alt="chair">

                                </div>
                            </div>
                        @else
                            <div class="overflow-x-auto ps">
                                <table
                                    class="w-full mb-0 align-top border-gray-200 text-slate-500 dark:border-white/40">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th colspan="4"
                                                class="px-6 py-3 pl-1 font-semibold capitalize align-middle bg-transparent border-b border-solid shadow-none tracking-none whitespace-nowrap border-b-gray-200 dark:border-white/40 dark:text-white">
                                                <p class="mb-0 dark:text-white/60">Whatsapp</p>
                                            </th>
                                            <th
                                                class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-solid shadow-none tracking-none whitespace-nowrap border-b-gray-200 dark:border-white/40 dark:text-white">
                                                <p class="mb-0 dark:text-white/60">Status</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-2 pl-1 align-top border-b whitespace-nowrap dark:border-white/40 dark:text-white"
                                                colspan="4">
                                                <div class="my-auto text-center">
                                                    <span
                                                        class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap bg-lime-200 text-center align-baseline font-bold uppercase leading-none text-lime-600">Connected</span>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 align-top bg-transparent border-b whitespace-nowrap dark:border-white/40 dark:text-white">
                                                <div class="flex items-center justify-center pl-12 mb-0 min-h-6">
                                                    <a href="{{ route('settings.whatsapp.disconnect') }}"
                                                        class="inline-block px-6 py-3 mr-3 font-bold text-center uppercase align-middle transition-all rounded-lg cursor-pointer bg-red-500/0 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:bg-red-500/25 hover:scale-102 active:bg-fuchsia/45 text-white-500">Diconneted</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                </div>
                            </div>
                        @endif
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
            })

            setTimeout(function() {
                window.location.reload(1);
            }, 20000);

            function startSession(type) {

                $.ajax({
                    type: 'POST',
                    url: "{{ config('services.whatsapp-api.base_url') }}/api/sessions/start",
                    data: {
                        name: 'default',
                    },
                    success: function(data) {
                        alert(data.status);
                    },
                });
            };
        </script>
    @endpush
</x-app-layout>
