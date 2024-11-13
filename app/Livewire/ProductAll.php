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
    public $sortOption = 'newest';
    public $searchTerm = null;
    protected $queryString = ['searchTerm' => ['except' => '']];
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
    public function updateSortOption($value)
    {
        $this->sortOption = $value;
        // Additional logic can go here if needed
    }
    public function getProductsProperty()
    {
        return Product::where(function ($query) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%');
        })
            ->when($this->sortOption === 'price-low', function ($query) {
                $query->orderBy('price', 'asc');
            })
            ->when($this->sortOption === 'price-high', function ($query) {
                $query->orderBy('price', 'desc');
            })
       
            ->when($this->sortOption === 'newest', function ($query) {
                $query->latest();
            })
            ->paginate(10);
    }  

    public function render()
    {

        return view('livewire.product-all', [
            'products' => $this->products,
        ]);
    }
}
