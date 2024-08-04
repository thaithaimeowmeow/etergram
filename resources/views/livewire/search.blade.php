<div class="bg-white lg:h-[500px] flex flex-col border gap-y-4 px-5">

    <header class="w-full border-b py-2">
        <div class="flex justify-between">

            <button wire:click="$dispatch('closeModal')" class="font-bold text-red-500">Close</button>

        </div>

    </header>

    <div class="relative">
        <input
        wire:model.live="query" type="search" placeholder="Search"
         type="text" placeholder="Search users..." class="w-full p-3 pl-10 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <svg class="absolute top-3 left-3 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a7 7 0 100 14 7 7 0 000-14zm0 2a5 5 0 110 10A5 5 0 0111 6zM20 20l-4-4"></path>
        </svg>
    </div>

    @if ($results)

    <ul class="overflow-y-scroll overflow-hidden">
        @foreach ($results as $key=> $user)
        <a wire:navigate href="{{route('profile.home',$user->username)}}" class="bg-white shadow-lg rounded-lg p-6 flex items-center space-x-4">
            <img src="https://via.placeholder.com/50" alt="User Avatar" class="w-16 h-16 rounded-full border border-gray-300">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">{{$user->username}}</h2>
                <p class="text-gray-600">{{$user->name}}</p>
            </div>
        </a>
        @endforeach
    </ul>

    @endif
    
</div>
