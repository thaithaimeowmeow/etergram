<div class="flex items-center gap-3 py-2">
    @if ($comment->user->avatar()->exists())
            <x-avatar src="{{ $comment->user->avatar->last()->url }}" class="h-12 w-12 mb-auto" />
        @else
            <x-avatar class="h-12 w-12 mb-auto" />
        @endif
    <div class="grid grid-cols-7 w-full gap-2">
        
        <div class="col-span-6 flex flex-wrap">
            <p>
                <span class="font-bold">{{$comment->user->username}}</span>
                <span>{{$comment->body}}</span>
            </p>
        </div>
        {{-- like button  --}}
        @if ($comment->isLikedBy(auth()->user()))
                    
        <button wire:click="toggleLikeFromComment({{$comment}})">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="text-red-500 bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
            </svg>
        </button>

        @else
        <button wire:click="toggleLikeFromComment({{$comment}})">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-heart" viewBox="0 0 16 16">
                <path
                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
            </svg>
        </button>
        @endif
        

        {{-- replies --}}
        <div class="col-span-7 flex gap-2 items-center text-slate-500 text-sm">
            <span>{{$comment->created_at->diffForHumans()}}</span>
            <span class="font-bold">
                @if ($comment->likers()->count()>1)
                    {{$comment->likers()->count()}} likes
                @elseif ($comment->likers()->count()==1)
                    1 like
                @else
                @endif

            </span>
            <span wire:click="setParent({{$comment->id}})" class="font-bold">Reply</span>
        </div>
        
    </div>

</div>