<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
    public $posts;

    public $loadable;
    public $postsPerPage;
    public $loadIncrements;


    #[On('closeModal')]
    function revertUrl()
    {
        $this->js("history.replaceState({},'','/')");
    }


    #[On('post-created')]
    function postCreated($id)
    {
        $post = Post::find($id);
        $this->posts = $this->posts->prepend($post);
    }

    function loadMorePosts()
    {
        if (!$this->loadable) {
            return null;
        }

        $this->postsPerPage += $this->loadIncrements;
        $this->loadPosts();
        
    }

    function loadPosts()
    {
        $this->posts = Post::with('comments.replies')->latest()->take($this->postsPerPage)->get();

        $this->loadable = (count($this->posts) >=  $this->postsPerPage);
    }

    
    function mount()
    {
        // $this->posts = Post::with('comments')->latest()->get();
        $this->loadPosts();
    }


    public function render()
    {
        return view('livewire.home');
    }
}
