<div class="w-full max-w-full px-3 flex-0 lg:w-5/12">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0 md:w-6/12">
            <div
                class="dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 bg-white  bg-clip-border">
                <span
                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 rounded-2xl opacity-90">
                </span>
                <div class="relative flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-8/12 max-w-full px-3 text-left flex-0">
                            <div
                                class="inline-block w-12 h-12 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none shadow-soft-2xl">
                                <i
                                    class="ni leading-none ni-circle-08 bg-gradient-to-tl from-gray-900 to-slate-800 text-lg relative top-3.5 z-10 bg-clip-text text-transparent"></i>
                            </div>
                            <h5 class="mt-4 mb-0 font-bold text-white">{{ $users->where('is_active', true)->count() }}
                            </h5>
                            <span class="leading-normal text-white text-sm">Pelanggan Active</span>
                        </div>
                        <div class="w-4/12 max-w-full px-3 flex-0">
                            <div class="relative mb-16 text-right">
                                <a href="javascript:;" class="cursor-pointer" dropdown-trigger="" aria-expanded="false">
                                    <i class="text-white fa fa-ellipsis-h" aria-hidden="true"></i>
                                </a>
                                <p class="hidden transform-dropdown-show"></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 mt-6 flex-0 md:mt-0 md:w-6/12">
            <div
                class="dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 bg-white  bg-clip-border">
                <span
                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 rounded-2xl opacity-90">
                </span>
                <div class="relative flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-8/12 max-w-full px-3 text-left flex-0">
                            <div
                                class="inline-block w-12 h-12 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none shadow-soft-2xl">
                                <i
                                    class="ni leading-none ni-active-40 bg-gradient-to-tl from-gray-900 to-slate-800 text-lg relative top-3.5 z-10 bg-clip-text text-transparent"></i>
                            </div>
                            <h5 class="mt-4 mb-0 font-bold text-white">{{ $users->count() }}</h5>
                            <span class="leading-normal text-white text-sm">Pelanggan No Hp</span>
                        </div>
                        <div class="w-4/12 max-w-full px-3 flex-0">
                            <div class="relative mb-16 text-right">
                                <a href="javascript:;" class="cursor-pointer" dropdown-trigger="" aria-expanded="false">
                                    <i class="text-white fa fa-ellipsis-h" aria-hidden="true"></i>
                                </a>
                                <p class="hidden transform-dropdown-show"></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 flex-0 md:w-6/12">
            <div
                class="dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 bg-white bg-clip-border">
                <span
                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 rounded-2xl opacity-90">
                </span>
                <div class="relative flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-8/12 max-w-full px-3 text-left flex-0">
                            <div
                                class="inline-block w-12 h-12 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none shadow-soft-2xl">
                                <i
                                    class="ni leading-none ni-cart bg-gradient-to-tl from-gray-900 to-slate-800 text-lg relative top-3.5 z-10 bg-clip-text text-transparent"></i>
                            </div>
                            <h5 class="mt-4 mb-0 font-bold text-white">{{ $users->where('email', null)->count() }}
                            </h5>
                            <span class="leading-normal text-white text-sm">Pelanggan Tanpa Email</span>
                        </div>
                        <div class="w-4/12 max-w-full px-3 flex-0">
                            <div class="relative mb-16 text-right">
                                <a href="javascript:;" class="cursor-pointer" dropdown-trigger="" aria-expanded="false">
                                    <i class="text-white fa fa-ellipsis-h" aria-hidden="true"></i>
                                </a>
                                <p class="hidden transform-dropdown-show"></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 mt-6 flex-0 md:mt-0 md:w-6/12">
            <div
                class="dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 bg-white bg-[url('../../assets/img/curved-images/white-curved.jpg')] bg-clip-border">
                <span
                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 rounded-2xl opacity-90">
                </span>
                <div class="relative flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-8/12 max-w-full px-3 text-left flex-0">
                            <div
                                class="inline-block w-12 h-12 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none shadow-soft-2xl">
                                <i
                                    class="ni leading-none ni-like-2 bg-gradient-to-tl from-gray-900 to-slate-800 text-lg relative top-3.5 z-10 bg-clip-text text-transparent"></i>
                            </div>
                            <h5 class="mt-4 mb-0 font-bold text-white">{{ $users->count() }}</h5>
                            <span class="leading-normal text-white text-sm">Total Pelanggan</span>
                        </div>
                        <div class="w-4/12 max-w-full px-3 flex-0">
                            <div class="relative mb-16 text-right">
                                <a href="javascript:;" class="cursor-pointer" dropdown-trigger="" aria-expanded="false">
                                    <i class="text-white fa fa-ellipsis-h" aria-hidden="true"></i>
                                </a>
                                <p class="hidden transform-dropdown-show"></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-full max-w-full px-3 flex-0 lg:w-7/12">
    <div
        class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-4 pb-0 mb-0 rounded-t-2xl">
            <h6 class="mb-0 dark:text-white">Pelanggan</h6>
        </div>
        <div class="flex-auto p-4 pb-0">
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                <li class="relative flex items-center px-0 py-2 mb-0 border-0 rounded-t-inherit text-inherit">
                    <div class="w-full">

                        @php
                            $total = $users->count();
                            $totalEmail = $users->where('email', null)->count();
                            $persen = ($totalEmail / $total) * 100;

                            $tanpaAlamat = ($users->where('alamat', null)->count() / $total) * 100;
                            $aktif = ($users->where('is_active', true)->count() / $total) * 100;
                        @endphp
                        <div class="flex mb-2">
                            <span class="mr-2 font-semibold leading-normal capitalize text-sm">Tanpa email</span>
                            <span class="ml-auto font-semibold leading-normal text-sm">{{ $persen }}%</span>
                        </div>
                        <div>
                            <div class="h-0.75 text-xs flex overflow-visible rounded-lg bg-gray-200">
                                <div class="bg-gradient-to-tl from-blue-600 to-cyan-400  transition-width duration-600 ease-soft rounded-1 -mt-0.4 -ml-px flex h-1.5 flex-col justify-center overflow-hidden whitespace-nowrap text-center text-white"
                                    style="width: {{ $persen }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="relative flex items-center px-0 py-2 mb-2 border-0 text-inherit">
                    <div class="w-full">
                        <div class="flex mb-2">
                            <span class="mr-2 font-semibold leading-normal capitalize text-sm">Tanpa Alamat</span>
                            <span class="ml-auto font-semibold leading-normal text-sm">{{ $tanpaAlamat }}%</span>
                        </div>
                        <div>
                            <div class="h-0.75 text-xs flex overflow-visible rounded-lg bg-gray-200">
                                <div style="width: {{ $tanpaAlamat }}%"
                                    class="dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800  transition-width duration-600 ease-soft rounded-1 -mt-0.4 -ml-px flex h-1.5 flex-col justify-center overflow-hidden whitespace-nowrap text-center text-white">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="relative flex items-center px-0 py-2 mb-2 border-0 rounded-b-inherit text-inherit">
                    <div class="w-full">
                        <div class="flex mb-2">
                            <span class="mr-2 font-semibold leading-normal capitalize text-sm">Pelanggan Aktif</span>
                            <span class="ml-auto font-semibold leading-normal text-sm">{{ $aktif }}%</span>
                        </div>
                        <div>
                            <div class="h-0.75 text-xs flex overflow-visible rounded-lg bg-gray-200">
                                <div style="width: {{ $aktif }}%"
                                    class="bg-gradient-to-tl from-red-600 to-rose-400  transition-width duration-600 ease-soft rounded-1 -mt-0.4 -ml-px flex h-1.5 flex-col justify-center overflow-hidden whitespace-nowrap text-center text-white">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="flex items-center p-4 pt-0 rounded-b-2xl">
            <div class="w-3/5">
                <p class="leading-normal text-sm dark:text-white/60">
                    <span class="font-bold text-sm dark:text-white">Total Pelanggan</span> {{ $users->count() }}
                </p>
            </div>
            <div class="w-2/5 text-right">

            </div>
        </div>
    </div>
</div>
