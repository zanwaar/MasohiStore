<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Merchant;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class UmkmPage extends Component
{
    use LivewireAlert;
    public $slug;
    public $umkm;
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->umkm = Merchant::where('slug', $this->slug)->first();
        if (!$this->umkm) {
            return redirect('/product');
        }
    }

    public function addToCart($product_id)
    {
        $total_count = CartManagement::addItemToCart($product_id);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Header::class);

        $this->alert('success', 'Product added to the cart successfully!', [
            'position' => 'top-end',
            'timer' => 2000,
            'toast' => true,
        ]);
    }
    public function render()
    {
        $um =   Product::with('ratingall')->where('merchant_id', $this->umkm->id)->get();
        return view('livewire.umkm-page', ['products' => $um]);
    }
}
