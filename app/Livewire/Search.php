<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Search extends ModalComponent
{


    public $shrink=false;
    public $drawer=false;


    public $results;
    public $query;


    function updatedQuery($query)  {

        if ($query=='') {

            return $this->results=null;
        }


        $this->results= User::where('username','like','%'.$query.'%')
                              ->orWhere('username','like','%'.$query.'%')
                              ->get();


        
    }

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function render()
    {
        return view('livewire.search');
    }
}
