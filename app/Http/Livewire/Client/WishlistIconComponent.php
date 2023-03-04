<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class WishlistIconComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.client.wishlist-icon-component');
    }
}
