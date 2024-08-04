<div class="bg-gray-100">

    <div class="container mx-auto p-4">
        <!-- Profile Header -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <div class="flex items-center">
                <!-- Profile Picture -->
                @if (auth()->user()->id == $user->id)
                    <form wire:submit.prevent="update">

                        <label for="customFileInput" class="cursor-pointer">
                            <div class="w-24 h-24 rounded-full overflow-hidden mr-6 ">
                                <input id="customFileInput" class="hidden" type="file" wire:model="media"
                                    accept=".jpg,.png,.jpeg">
                                @if (auth()->user()->avatar()->exists())
                                    <img src="{{ auth()->user()->avatar->last()->url }}" alt="Profile Picture"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="https://via.placeholder.com/150" alt="Profile Picture" />
                                @endif
                            </div>
                        </label>

                        @error('media')
                            <span class="error">{{ $message }}</span>
                        @enderror

                        @if ($media)
                            <button class="mt-2" type="submit">Save Photo</button>
                        @endif
                    </form>
                @else
                    <div class="w-24 h-24 rounded-full overflow-hidden mr-6 ">
                        <input id="customFileInput" class="hidden" type="file" wire:model="media"
                            accept=".jpg,.png,.jpeg">
                        @if ($user->avatar()->exists())
                            <img src="{{ $user->avatar->last()->url }}" alt="Profile Picture"
                                class="w-full h-full object-cover">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Profile Picture" />
                        @endif
                    </div>
                @endif




                <!-- User Info -->
                <div>
                    <div wire:key={{ time() }} class="flex">
                        <h1 class="text-2xl font-semibold">{{ $user->username }}</h1>

                        @if (auth()->user()->id == $user->id)
                            <a href="{{ route('profile.edit') }}"
                                class="bg-gray-200 text-gray-800 font-semibold py-1 px-4 rounded hover:bg-gray-300 ml-3">
                                Edit Profile
                            </a>
                        @elseif (auth()->user()->isFollowing($user))
                            <button wire:click="toggleFollowFromUser()" type="button"
                                class=" inline-flex justify-center font-bold items-center ml-3 rounded-lg  text-sm p-1.5 px-2 transition  bg-gray-200 hover:bg-slate-100 ">
                                Following
                            </button>
                        @else
                            <button wire:click="toggleFollowFromUser()" type="button"
                                class=" inline-flex justify-center font-bold items-center ml-3 rounded-lg  text-sm p-1.5 px-2 transition  bg-blue-500 text-white  ">
                                Follow
                            </button>
                        @endif



                    </div>
                    <p class="text-gray-600">{{ '@' . $user->username }}</p>
                    <p class="mt-2">Photographer | Traveler | Coffee Lover</p>
                    <div class="mt-4 flex space-x-6">
                        <div class="text-center">
                            <p wire:key='{{ time() }}' class="text-xl font-bold">{{ $user->posts_count }}</p>
                            <p class="text-gray-600">Posts</p>
                        </div>
                        <div class="text-center">
                            <p class="text-xl font-bold">{{ $user->followers_count }}</p>
                            <p class="text-gray-600">Followers</p>
                        </div>
                        <div class="text-center">
                            <p class="text-xl font-bold">{{ $user->followings_count }}</p>
                            <p class="text-gray-600">Following</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid of Photos -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="grid grid-cols-3 gap-2">
                <!-- Repeat this block for each photo -->
                @foreach ($posts as $post)
                    <button
                        onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{ $post->id }}}})"
                        class="w-full h-48 bg-gray-200 rounded-lg overflow-hidden">

                        <img src="{{ $post->media->first()->url }}" alt="Photo" class="w-full h-full object-cover">

                    </button>
                @endforeach
                <!-- Add more photo blocks as needed -->
            </div>
        </div>
    </div>

</div>
