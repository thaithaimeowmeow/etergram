<div 
    x-data="{

        loadable:@entangle('loadable')
    }"
    @scroll.window.trottle="
        scrollTop= window.scrollY ||window.scrollTop;
        divHeight= window.innerHeight||document.documentElement.clientHeight;
        scrollHeight = document.documentElement.scrollHeight;


        isScrolled= scrollTop+ divHeight >= scrollHeight-1;

        {{-- Check if user can load more  --}}

        if(isScrolled && canLoadMore){

            @this.loadMore();
        } "

    class="w-full">
    {{-- Header --}}
    <header class="md:hidden sticky top-0 z-50 bg-white">
        <div class="grid grid-cols-12 items-center">
            <div class="col-span-3">
                <img src="{{ asset('assets/logo.png') }}" alt="LOGO" class="h-12 max-w-lg w-full">
            </div>

            <div class="col-span-8 flex justify-center px-2">
                <input type="text" placeholder="Search"
                    class="border-0 outline-none w-full focus:outline-none bg-gray-100 rounded-lg">
            </div>
            <div class="div col-span-1 flex justify-center">
                <a href="">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </header>
    {{-- Header --}}
    <main class="grid lg:grid-cols-12 gap-8 md:mt-10">

        {{-- Page content  --}}
        <aside class="lg:col-span-8 border overflow-hidden">

            {{-- Posts  --}}
            <section class="mt-5 space-y-4 p-2">
                @if ($posts)
                    @foreach ($posts as $post)
                        <livewire:post.item wire:key="post-{{$post->id}}" :post="$post"/>
                    @endforeach
                    <p class="font-bol flex justify-center">No post found.</p>
                @endif

            </section>



        </aside>



        {{-- Suggestion --}}
        <aside class="lg:col-span-4 border hidden lg:block p-4">

            <div class="flex items-center gap-2">
                @if (auth()->user()->avatar()->exists())
                <x-avatar src="{{auth()->user()->avatar->last()->url}}" class="h-12 w-12" />
                @else
                <x-avatar class="h-12 w-12" />
                @endif
                <h4 class="font-medium">{{ auth()->user()->username }}</h4>
            </div>

            <section class="mt-4">
                <h4 class="font-bold text-gray-700/95">Suggestion for you</h4>

                <ul class="my-2 space-y-3">

                    <li class="flex items-center gap-3">
                        <x-avatar class="w-12 h-12"></x-avatar>

                        <div class="grid grid-cols-7 w-full gap-2">
                            <div class="col-span-5">
                                <h5 class="font-semibold truncate text-sm">{{ fake()->name }}</h5>
                                <p class="text-xs truncate">Followed by {{ fake()->name }}</p>
                            </div>
                        </div>

                        <div class="col-span-2 flex text-right justify-end">
                            <button class="font-bold text-blue-500 ml-auto text-sm">Follow</button>
                        </div>


                    </li>
                    <li class="flex items-center gap-3">
                        <x-avatar class="w-12 h-12"></x-avatar>

                        <div class="grid grid-cols-7 w-full gap-2">
                            <div class="col-span-5">
                                <h5 class="font-semibold truncate text-sm">{{ fake()->name }}</h5>
                                <p class="text-xs truncate">Followed by {{ fake()->name }}</p>
                            </div>
                        </div>

                        <div class="col-span-2 flex text-right justify-end">
                            <button class="font-bold text-blue-500 ml-auto text-sm">Follow</button>
                        </div>


                    </li>
                    <li class="flex items-center gap-3">
                        <x-avatar class="w-12 h-12"></x-avatar>

                        <div class="grid grid-cols-7 w-full gap-2">
                            <div class="col-span-5">
                                <h5 class="font-semibold truncate text-sm">{{ fake()->name }}</h5>
                                <p class="text-xs truncate">Followed by {{ fake()->name }}</p>
                            </div>
                        </div>

                        <div class="col-span-2 flex text-right justify-end">
                            <button class="font-bold text-blue-500 ml-auto text-sm">Follow</button>
                        </div>


                    </li>
                </ul>

            </section>


        </aside>

    </main>
</div>
