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

    public function clearall()
    {
        $this->select_categories = [];
    }

    public function render()
    {
        $query = Product::with('merchant', 'ratingall');

        if (!empty($this->select_categories)) {
            $query->whereIn('category_id', $this->select_categories);
        }

        $products = $query->latest()->paginate(6);

        $categoriesWithProductCount = Product::select('category_id', DB::raw('count(*) as product_count'))
            ->groupBy('category_id')
            ->having('product_count', '>', 1)
            ->pluck('product_count', 'category_id');

        $categories = Ketegori::whereIn('id', $categoriesWithProductCount->keys())
            ->where('is_active', 1)
            ->get(['id', 'name', 'slug']);

        $categoriesWithCounts = $categories->mapWithKeys(function ($category) use ($categoriesWithProductCount) {
            return [$category->id => [
                'name' => $category->name,
                'slug' => $category->slug,
                'product_count' => $categoriesWithProductCount[$category->id] ?? 0
            ]];
        });

        return view('livewire.product-all', [
            'products' => $products,
            'categoriesWithCounts' => $categoriesWithCounts,
        ]);
    }
}
