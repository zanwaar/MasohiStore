<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Ketegori;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\Component;

class ProductAll extends Component
{
    use LivewireAlert;
    #[Url()]
    public $select_categories = [];

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
        $query = Product::with('merchant', 'ratingall');
        $products = $query->latest()->paginate(6);
        return view('livewire.product-all', [
            'products' => $products,
        ]);
    }
}
