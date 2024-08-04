<?php

namespace App\Livewire\Profile;

use App\Models\Media;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;


class Home extends Component
{

    use WithFileUploads;
    public $user;
    public $media;

    #[On('closeModal')]
    function revertUrl()
    {
        $this->js("history.replaceState({},'','/')");
    }

    function toggleFollowFromUser()
    {
        abort_unless(auth()->check(), 401);
        auth()->user()->toggleFollow($this->user);
    }

    function update()
    {

        $this->validate([
            'media' => 'image|max:1024', // 1MB Max
        ]);

        $type = $this->getFileType($this->media);

        //add to storage

        $path = $this->media->store('media', 'public');

        $url = url(Storage::url($path));

        $newAvatar = Media::create([
            'url' => $url,
            'type' => $type,
            'mediable_id' => $this->user->id,
            'mediable_type' => User::class,
        ]);
        $this->reset('media');
    }

    function getFileType($media): string
    {
        if (str()->contains($media->getMimeType(), 'video'))
            return 'video';
        else
            return 'image';
    }


    function mount($user)
    {

        $this->user = User::whereUsername($user)->withCount(['followers', 'followings', 'posts'])->firstOrFail();
    }

    public function render()
    {
        $this->user = User::whereUsername($this->user->username)->withCount(['followers', 'followings', 'posts'])->firstOrFail();

        $posts = $this->user->posts()->where('type', 'post')->orderBy('created_at', 'desc')->get();
        return view('livewire.profile.home', ['posts' => $posts]);
    }
}
