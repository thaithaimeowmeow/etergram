<?php

namespace App\Livewire\Post;

use App\Models\Media;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;


class Create extends ModalComponent
{
    use WithFileUploads;
    public $media = [];
    public $description;

    function submit()
    {
        $this->validate([
            'media.*' => 'required|file|mimes:png,jpg,mp4,jpeg,mov|max:12000',
        ]);

        $type = $this->getPostType($this->media);

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'description' => $this->description,
            'type' => $type,

        ]);

        foreach ($this->media as $key => $media) {
            //get FILE TYPE
            $type = $this->getFileType($media);

            //add to storage

            $path = $media->store('media', 'public');

            $url = url(Storage::url($path));

            Media::create([
                'url' => $url,
                'type' => $type,
                'mediable_id' => $post->id,
                'mediable_type' => Post::class,
            ]);
            $this->reset();
            $this->dispatch('close');
        }


        #dispatch for post created

        $this->dispatch('post-created', $post->id);
    }

    function getFileType($media): string
    {
        if (str()->contains($media->getMimeType(), 'video'))
            return 'video';
        else
            return 'image';
    }


    function getPostType($media): string
    {
        if (count($media) == 1 && str()->contains($media[0]->getMimeType(), 'video')) {
            return 'reel';
        } else {
            return 'post';
        }
    }






    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '5xl';
    }


    public function render()
    {
        return view('livewire.post.create');
    }
}
