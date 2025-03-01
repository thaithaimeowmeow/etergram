<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Post::factory(5)->hasComments(rand(3,10))->create([
            'type'=>'reel',
        ]);
        Post::factory(rand(3,10))->hasComments(rand(3,10))->create([
            'type'=>'post',
        ]);

        Comment::limit(50)->each(function(Comment $comment) {

            $comment::factory(rand(1,5))->isReply($comment->commentable)->create(
                    [
                        'parent_id'=>$comment->id,

                    ]
            );
        });
    }
}