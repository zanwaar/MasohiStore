<?php

namespace App\Livewire;

use App\Models\Merchant;
use Livewire\Component;

class ListUmkm extends Component
{
    public $searchTerm = null; 
    protected $queryString = ['searchTerm' => ['except' => '']];
    public function getMerchantProperty()
    {
        return Merchant::where(function ($query) {
            $query->where('merchant_nama', 'like', '%' . $this->searchTerm . '%');
        })
            ->latest()
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.list-umkm', ['merchant' => $this->merchant]);
    }
}
