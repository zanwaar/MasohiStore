<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Cart extends Component
{
    use LivewireAlert;
    public $cart_items = [];
    public $cart_items_merchant = [];

    public $grand_total;

    public function mount()
    {
        $this->cart_items =  CartManagement::getCartItemsFromCookie();
        $this->cart_items_merchant =  CartManagement::groupCartByMerchantAndCaluclateTotal($this->cart_items);
        $this->grand_total =  CartManagement::calculateGrandTotal($this->cart_items);
    }

    public function removeItem($product_id)
    {
        $this->cart_items =  CartManagement::removeCartItem($product_id);
        $this->cart_items_merchant =  CartManagement::groupCartByMerchantAndCaluclateTotal($this->cart_items);
        $this->grand_total =  CartManagement::calculateGrandTotal($this->cart_items);
        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Header::class);
        $this->alert('success', 'Product delete to the cart successfully!', [
            'position' => 'top-end',
            'timer' => 2000,
            'toast' => true,
        ]);
    }

    public function increaseQty($product_id)
    {
        $this->cart_items = CartManagement::incrementQuantityCartItem($product_id);
        $this->grand_total =  CartManagement::calculateGrandTotal($this->cart_items);
        $this->cart_items_merchant =  CartManagement::groupCartByMerchantAndCaluclateTotal($this->cart_items);
    }
    public function decreaseQty($product_id)
    {
        $this->cart_items = CartManagement::decrementQuantityCartItem($product_id);
        $this->grand_total =  CartManagement::calculateGrandTotal($this->cart_items);
        $this->cart_items_merchant =  CartManagement::groupCartByMerchantAndCaluclateTotal($this->cart_items);
    }
    public function render()
    {
        return view('livewire.cart');
    }
}
