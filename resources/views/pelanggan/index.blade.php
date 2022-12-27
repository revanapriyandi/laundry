<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pelanggan') }}
        </h2>
    </x-slot>

    <x-link-header type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'tambah-user')">
        Tambah Data Pelanggan
    </x-link-header>

    <div class="flex flex-wrap -mx-3">
        @include('pelanggan.comp.widget')
    </div>

    <div class="flex flex-wrap my-6 -mx-3">
        <div class="w-full max-w-full px-3 flex-0">

            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">

                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                    <div class="lg:flex">
                        <div>
                            <h5 class="mb-0 dark:text-white">Semua Pelanggan</h5>
                            <p class="mb-0 leading-normal text-sm">Semua data pelanggan {{ config('app.name') }} yang
                                terdaftar disistem</p>
                        </div>
                        <div class="my-auto mt-6 ml-auto lg:mt-0">
                            <div class="my-auto ml-auto">
                                <button type="button"
                                    class="inline-block px-8 py-2 m-0 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-gray-900 to-slate-800 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85"
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'tambah-user')">+&nbsp;
                                    New User</button>
                                <button export-button-table="" data-type="csv"
                                    class="inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border-gray-500 text-slate-500 hover:text-gray-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-gray-500 active:bg-gray-500 active:text-white hover:active:border-gray-500 hover:active:bg-transparent hover:active:text-gray-500 hover:active:opacity-75">Export</button>
                            </div>
                        </div>
                    </div>
                </div>
                @include('pelanggan.comp.tambah-data')
                <div class="table-responsive overflow-x-auto ps">

                    <table class="table table-flush text-slate-500 " datatable id="table-list">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email / Phone</th>
                                <th>Status</th>
                                <th>Join Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i => $user)
                                <tr>
                                    <td class="font-semibold leading-tight text-xs">{{ $i + 1 }}</td>
                                    <td class="font-semibold leading-tight text-xs">
                                        <a href="{{ route('pelanggan.edit', $user->id) }}" class="flex items-center">
                                            <img src="{{ $user->profile_photo_url }}"
                                                class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white transition-all duration-200 text-xs ease-soft-in-out rounded-xl"
                                                alt="user image">
                                            <span>{{ $user->name }}</span>
                                        </a>
                                    </td>
                                    <td class="font-semibold leading-tight text-xs">
                                        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                                            <li class="leading-normal text-sm breadcrumb-item">
                                                <button type="button" id="{{ $user->email }}"
                                                    class="text-slate-700 opacity-30 dark:text-white"
                                                    onclick="FunctionCopy({{ $user->email }})">
                                                    {{ $user->email }}
                                                </button>
                                            </li>
                                            <li
                                                class="text-sm pl-2 leading-normal before:float-left before:pr-2 before:text-gray-600 {{ $user->email ? 'before:content-["/"]' : '' }}">
                                                <button type="button" id="{{ $user->phone }}"
                                                    class="opacity-50 text-slate-700 dark:text-white"
                                                    onclick="FunctionCopy({{ $user->phone }})">{{ $user->formatPhoneNumber() }}</button>
                                            </li>
                                        </ol>
                                    </td>
                                    <td class="font-semibold leading-tight text-xs">
                                        <div class="flex items-center">
                                            <x-check-button :status="$user->is_active ? 'true' : 'false'" :link="route('pelanggan.status', $user->id)" :icon="$user->is_active ? 'fas fa-check' : 'fa fa-close'">
                                            </x-check-button>
                                            <span>{{ $user->is_active ? 'Active' : 'Suspend' }}</span>
                                        </div>
                                    </td>
                                    <td class="font-semibold leading-tight text-xs">
                                        {{ $user->created_at->diffForHumans() }}
                                    </td>
                                    <td class="leading-normal text-sm">
                                        <a href="{{ route('pelanggan.edit', $user->id) }}" class="mx-4">
                                            <i class="fas fa-user-edit text-slate-400 dark:text-white/70"
                                                aria-hidden="true"></i>
                                        </a>
                                        <form action="{{ route('pelanggan.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Are you sure to delete?')">
                                                <i class="fas fa-trash text-slate-400 dark:text-white/70"
                                                    aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
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
    @push('scripts')
        <script>
            function FunctionCopy(id) {
                // Copy the text inside the text field
                navigator.clipboard.writeText(id);
                // Alert the copied text
                alert("Copied : " + id);
            }
        </script>
    @endpush
</x-app-layout>
