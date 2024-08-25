<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{
    public $total_count = 0;
    public $activeRoute = '';

    public function mount()
    {
        $this->activeRoute = \Illuminate\Support\Facades\Route::currentRouteName();
        $this->total_count = count(CartManagement::getCartItemsFromCookie());
    }
    #[On('update-cart-count')]
    public function updateCartCount($total_count)
    {
        $this->total_count = $total_count;
        $this->dispatch('cartCountUpdated');
    }
   
    public function render()
    {
        return view('livewire.header');
    }
}
