<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'parent_id'=>null,
            'commentable_id'=>null,
            'commentable_type'=>null,
            'body'=>fake()->sentence(),
            'user_id'=>User::factory()->create()->id,
        ];

    }


    function isReply(Post $post)  {

        return $this->state(function(array $attributes)use ($post){

            return [
                'commentable_id'=>$post->id,
                'commentable_type'=>Post::class,
            ];

        });
        
    }

}
