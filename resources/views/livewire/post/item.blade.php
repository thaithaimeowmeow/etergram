<div class="max-w-lg mx-auto pt-2">
    <header class="flex items-center gap-3">
        @if ($post->user->avatar()->exists())
            <x-avatar src="{{ $post->user->avatar->last()->url }}" class="h-12 w-12" />
        @else
            <x-avatar class="h-12 w-12" />
        @endif
        <div class="grid grid-cols-7 w-full gap-2">

            <div class="col-span-5">
                <h5 class="font-semibold truncate text-sm">{{ $post->user->username }}<span> •
                        {{ $post->created_at->diffForHumans() }}</span></h5>
            </div>
            <div class="col-span-2 flex text-right justify-end">
                <button class="text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-three-dots" viewBox="0 0 16 16">
                        <path
                            d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                    </svg>
                </button>
            </div>

        </div>
    </header>

    <main>

        <div class="my-2">
            <!-- Slider main container -->
            <div x-init="new Swiper($el, {
            
                modules: [Navigation, Pagination],
                loop: true,
            
                pagination: {
                    el: '.swiper-pagination',
                },
            
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            
            });" class="swiper h-[500px] bg-white border">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($post->media as $file)
                        <div class="swiper-slide">
                            @switch($file->type)
                                @case('video')
                                    <x-video source="{{ $file->url }}" />
                                @case('image')
                                    <img class="h-[500px] relative m-auto object-contain" src="{{ $file->url }}"
                                        alt="Can't load image">
                                @break

                                @default
                            @endswitch
                        </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
                @if (count($post->media) > 1)
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev absolute top-1/2 z-10 p-2">
                        <div class="bg-white/90 border rounded-full text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-chevron-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                            </svg>
                        </div>
                    </div>
                    <div class="swiper-button-next absolute top-1/2 z-10 p-2 right-0">
                        <div class="bg-white/90 border rounded-full text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div>
                    </div>
                @endif

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>

        </div>

    </main>


    <footer class="border-b">
        {{-- Like, Comment, Share buttons --}}

        <div class="flex gap-4 items-center my-2">
            {{-- Like --}}
            @if ($post->isLikedBy(auth()->user()))
                <button wire:click="toggleLikeFromPost()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="text-red-500 bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                    </svg>
                </button>
            @else
                <button wire:click="toggleLikeFromPost()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-heart" viewBox="0 0 16 16">
                        <path
                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                    </svg>
                </button>
            @endif

            {{-- Comment --}}
            <button
                onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{ $post->id }}}})">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-chat" viewBox="0 0 16 16">
                    <path
                        d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
                </svg>
            </button>

            {{-- Share --}}
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-share" viewBox="0 0 16 16">
                    <path
                        d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" />
                </svg>
            </span>

        </div>

        {{-- Interactions --}}
        <p class="font-bold">
            @if ($post->likers()->count() > 1)
                {{ $post->likers()->count() }} likes
            @elseif ($post->likers()->count() == 1)
                1 like
            @else
                Be the first to like this post.
            @endif

        </p>
        <div class="flex">
            <p class="text-wrap truncate">
                <strong>{{ $post->user->username }}</strong>
                {{ $post->description }}
            </p>
        </div>

        <button
            onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{ $post->id }}}})"
            class="text-gray-500">View all {{ $post->comments->count() }} @if ($post->comments->count() != 0)
                comments
            @else
                comment
            @endif
        </button>

        {{-- showing some comments --}}
        @if ($post->comments->count() != 0)
            <ul class="my-2">
                <li class="flex">
                    <p class="truncate">
                        <strong>{{ $post->comments->first()->user->username }}</strong>
                        {{ $post->comments->first()->body }}
                    </p>
                    <div class="col-span-1 ml-auto flex justify-end text-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                        </svg>
                    </div>
                </li>
            </ul>
        @endif

        {{-- Comment FORM --}}
        <form wire:key="{{ time() }}" x-data="{ body: @entangle('body') }" @submit.prevent="$wire.addComment()"
            class="grid grid-cols-12 items-center w-full">
            @csrf

            <input x-model="body" type="text" placeholder="Add a comment..."
                class="border-0 col-span-10 placeholder:text-sm outline-none focus:outline-none px-0 rounded-lg hover:ring-0 focus:ring-0">
            <div class="col-span-1 ml-auto flex justify-end text-right">
                <button type="submit" x-cloak x-show="body.length >0"
                    class="text-sm font-semibold flex justify-end text-blue-500">
                    Post
                </button>
            </div>

            <span class="col-span-1 ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                </svg>
            </span>

        </form>

    </footer>

</div>
