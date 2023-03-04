<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Product;

class HeaderSearchComponent extends Component
{
    public $keyword;
    protected $queryString = ['keyword'];
    public $search_products;
    public function render()
    {
        if(!empty($this->keyword)){
            $this->search_products = Product::where('name','like','%'.$this->keyword.'%')->get();
        }
        return view('livewire.client.header-search-component');
    }
}
