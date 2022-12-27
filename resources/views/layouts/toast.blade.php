<div class="fixed bottom-1/100 right-1/100 z-2">
    @if (Session::has('success'))
        <div id="success"
            class="w-85 text-sm shadow-soft-2xl pointer-events-auto  max-w-full rounded-lg border-0 bg-white bg-clip-padding p-2  transition-opacity duration-150 ease-linear">
            <div class="flex items-center p-3 rounded-t-lg bg-clip-padding text-slate-700">
                <i class="mr-2 ni leading-none ni-check-bold text-lime-500"></i>
                <span class="mr-auto font-semibold">Success</span>
                <small class="text-slate-500">{{ now()->diffForHumans() }}</small>
                <i class="ml-4 cursor-pointer fas fa-times"></i>
            </div>
            <hr
                class="h-px m-0 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
            <div class="p-3 break-words">{{ Session::get('success') }}</div>
        </div>
    @elseif (Session::has('info'))
        <div id="info"
            class="w-85 text-sm bg-gradient-to-tl from-blue-600 to-cyan-400 shadow-soft-2xl pointer-events-auto mt-2  max-w-full rounded-lg border-0 bg-clip-padding p-2  transition-opacity duration-150 ease-linear">
            <div class="flex items-center p-3 text-white rounded-t-lg bg-clip-padding">
                <i class="mr-2 text-white ni leading-none ni-bell-55"></i>
                <span class="mr-auto font-semibold text-white">Information</span>
                <small class="text-white">{{ now()->diffForHumans() }}</small>
                <i class="ml-4 text-white cursor-pointer fas fa-times"></i>
            </div>
            <hr
                class="h-px m-0 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-white to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
            <div class="p-3 text-white break-words">{{ Session::get('info') }}</div>
        </div>
    @elseif (Session::has('warning'))
        <div id="warning"
            class="w-85 text-sm shadow-soft-2xl pointer-events-auto mt-2  max-w-full rounded-lg border-0 bg-white bg-clip-padding p-2  transition-opacity duration-150 ease-linear">
            <div class="flex items-center p-3 rounded-t-lg bg-clip-padding text-slate-700">
                <i class="mr-2 text-yellow-400 ni leading-none ni-spaceship"></i>
                <span class="mr-auto font-semibold">Warning</span>
                <small class="text-slate-500">{{ now()->diffForHumans() }}</small>
                <i class="ml-4 cursor-pointer fas fa-times"></i>
            </div>
            <hr
                class="h-px m-0 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
            <div class="p-3 break-words">{{ Session::get('warning') }}</div>
        </div>
    @elseif (Session::has('error'))
        <div id="error"
            class="w-85 text-sm shadow-soft-2xl pointer-events-auto mt-2  max-w-full rounded-lg border-0 bg-white bg-clip-padding p-2  transition-opacity duration-150 ease-linear">
            <div class="flex items-center p-3 rounded-t-lg bg-clip-padding text-slate-700">
                <i
                    class="mr-2 text-transparent ni leading-none ni-notification-70 bg-gradient-to-tl from-red-600 to-rose-400 bg-clip-text"></i>
                <span
                    class="mr-auto font-semibold text-transparent bg-gradient-to-tl from-red-600 to-rose-400 bg-clip-text">Something
                    Went Wrong</span>
                <small class="text-slate-500">{{ now()->diffForHumans() }}</small>
                <i class="ml-4 cursor-pointer fas fa-times"></i>
            </div>
            <hr
                class="h-px m-0 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
            <div class="p-3 break-words">{{ Session::get('error') }}</div>
        </div>
    @endif

    <script>
        let flash = @json(Session::get('_flash')['old']);
        setTimeout(function() {
            document.getElementById(flash).classList.add("opacity-0");
            document.getElementById(flash).classList.add("hidden");
        }, 5000);
    </script>
</div>
