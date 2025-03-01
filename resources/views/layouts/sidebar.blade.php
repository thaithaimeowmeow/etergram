<div x-data="{
    shrink: false,
    drawer: false

}" class="menu p-3   w-20 overflow-x-hidden h-full grid bg-white border-r text-base-content"
    :class="{ 'w-72 ': !shrink }">

    {{-- Logo --}}
    <div class="pt-3">

        <div x-show="shrink || drawer" class="w-full px-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-instagram w-6 h-6" viewBox="0 0 16 16">
                <path
                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
            </svg>
        </div>

        <img x-cloak x-show="!(shrink ||drawer)" src="{{ asset('assets/logo.png') }}" class="h-16 w-44 text-black"
            alt="logo">
    </div>

    {{-- Side content --}}
    <ul class="space-y-4 mt-2">

        <li><a wire:navigate href="/" class="flex items-center gap-5 ">

                <span>

                    @if (request()->routeIs('Home'))
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                            <path
                                d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    @endif





                </span>

                <h4 x-cloak x-show="!(shrink||drawer)"
                    class=" text-lg  {{ request()->routeIs('Home') ? 'font-bold' : 'font-medium' }}">Home</h4>
            </a></li>

        <li><a class="flex items-center gap-5">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z"
                            clip-rule="evenodd" />
                    </svg>


                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Search</h4>
            </a></li>



        <li><a class="flex items-center gap-5">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>


                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Notifications</h4>
            </a></li>

        <li>
            <div onclick="Livewire.dispatch('openModal', { component: 'post.create' })" class="flex items-center gap-5">

                <span class="border border-gray-600  rounded-lg p-px">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>

                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Create</h4>
            </div>
        </li>


        @auth
            <li>
                <a wire:navigate href="{{ route('profile.home', auth()->user()->username) }}"
                    class="flex items-center gap-5">

                    @if (auth()->user()->avatar()->exists())
                        <x-avatar src="{{ auth()->user()->avatar->last()->url }}" class="h-12 w-12" />
                    @else
                        <x-avatar class="h-12 w-12" />
                    @endif

                    <h4 x-cloak x-show="!(shrink||drawer)"
                        class=" text-lg  {{ request()->routeIs('profile.home') ? 'font-bold' : 'font-medium' }} ">Profile
                    </h4>
                </a>
            </li>
        @endauth

    </ul>


    {{-- Footer --}}
    <footer class="sticky bottom-0 mt-auto w-full grid px-3 z-50 bg-white">
        <div class="dropdown dropdown-top ">
            <label tabindex="0" class=" cursor-pointer bg-white  flex items-center w-full gap-5 m-1">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd"
                            d="M3 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 5.25zm0 4.5A.75.75 0 013.75 9h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 9.75zm0 4.5a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75zm0 4.5a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd" />
                    </svg>

                </span>
                <h3 x-cloak x-show="!(shrink||drawer)" class="text-lg font-medium">More</h3>
            </label>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 space-y-3 shadow bg-base-100 rounded-box w-60">

                <li><a class="flex items-center gap-5 py-2">

                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                            </svg>

                        </span>

                        <h4>Saved</h4>

                    </a></li>



                <hr>

                <li><a class="py-2">Settings</a></li>
                <li><a class="py-2">


                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                onclick="event.preventDefault();
                        this.closest('form').submit();">
                                Logout
                            </button>
                            {{-- <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link> --}}
                        </form>

                    </a></li>
            </ul>
        </div>
    </footer>





    {{-- TODO: When you create sidebar as livewire component use @teleport blade directive --}}
    <template x-teleport="body">
        <div x-show="drawer" class="fixed inset-y-0 left-[70px] w-96 bg-red-500 border rounded-r-2xl z-[5]">


        </div>
    </template>

</div>
