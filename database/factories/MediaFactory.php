<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $url = $this->getUrl('post');
        $type = $this->getType($url);

        return [
            //
            'url' => $url,
            'type' => $type,
            'mediable_id' => Post::factory(),
            'mediable_type' => function (array $attributes) {
                return Post::find($attributes['mediable_type'])->getMorphClass();
            }

        ];
    }

    function getUrl($type = 'post'): String
    {
        switch ($type) {
            case 'post':
                $urls = [
                    'https://images.unsplash.com/photo-1655213675278-dfa74aa03322?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1559535332-db9971090158?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1579445710183-f9a816f5da05?q=80&w=1929&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ];
                return $this->faker->randomElement($urls);
            case 'reel':
                $urls = [
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4',
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/Sintel.mp4',
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4',
                ];
                return $this->faker->randomElement($urls);

            default:
                # code...
                break;
        }
    }

    function getType($url)
    {
        if (str()->contains($url, 'gtv-videos-bucket')) {
            return 'video';
        } else if (str()->contains($url, 'images.unsplash.com')) {
            return 'image';
        }
    }

    function reel() : Factory
    {
        $url = $this->getUrl('reel');
        $type = $this->getType($url);
        return $this->state(function(array $attributes) use($url,$type){
            return [
                'url'=>$url,
                'type'=>$type,
            ];
        });
    }

    function post() : Factory
    {
        $url = $this->getUrl('post');
        $type = $this->getType($url);
        return $this->state(function(array $attributes) use($url,$type){
            return [
                'url'=>$url,
                'type'=>$type,
            ];
        });
    }
}
