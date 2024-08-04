<?php

namespace App\Livewire\Post\View;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class Item extends Component
{

    public Post $post;
    
    public $body;
    public $parent_id = null;

    function toggleLikeFromPost()
    {
        auth()->user()->toggleLike($this->post);
    }

    function toggleLikeFromComment(Comment $comment)
    {
        auth()->user()->toggleLike($comment);
    }

    function addComment()
    {
        $this->validate([
            'body' => 'required',
        ]);

        Comment::create([
            'body'=>$this->body,
            'parent_id'=>$this->parent_id,
            'commentable_id'=>$this->post->id,
            'commentable_type'=>Post::class,
            'user_id'=>auth()->id(),

        ]);
        $this->reset('body');
        $this->reset('parent_id');

    }

    function setParent(Comment $comment)
    {
        $this->parent_id = $comment->id;
        $this->body="@".$comment->user->username;
    }

    public function render()
    {
        // ->paginate(10)
        $comments = $this->post->comments()->whereDoesntHave('parent')->get();
        return view('livewire.post.view.item',
            [
                'comments'=> $comments,
            ] );
    }
}
