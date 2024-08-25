<?php

namespace App\Livewire\MyOrder;

use App\Models\Order;
use Livewire\Component;

class MyOrder extends Component
{
    public function render()
    {
        $my_orders = Order::where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('livewire.my-order.my-order', [
            'orders' => $my_orders,
        ]);
    }
}
