<?php

namespace App\Livewire\Panel\Transaksi;

use App\Models\Merchant;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class OrderTransasksi extends Component
{
    use WithFileUploads;
    public $searchTerm = null;
    public $merchant_id;
    protected $queryString = ['searchTerm' => ['except' => '']];
    public function mount()
    {
        $umkm = Merchant::where('user_id', auth()->user()->id)->first();
        $this->merchant_id = $umkm->id;
    }
    public function showdetail($order)
    {
        dd($order);
        $this->dispatch('show');
    }

    public function close()
    {
        
        $this->dispatch('hide');
    }
    // public function changeRole(User $user, $role)
    // {

    // }
    public function getOrdersProperty()
    {
        // Get the list of order_ids associated with the merchant
        $orderIds = OrderItem::where('merchant_id', $this->merchant_id)
            ->select('order_id')
            ->groupBy('order_id')
            ->pluck('order_id');

        // Fetch the orders from the orders table using the obtained order_ids,
        // apply search, order by latest, and paginate the results
        return Order::with('user')->whereIn('id', $orderIds)
            ->where(function ($query) {
                if ($this->searchTerm) {
                    $query->where('name', 'like', '%' . $this->searchTerm . '%');
                }
            })
            ->latest()
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.panel.transaksi.order-transasksi', [
            'orders' => $this->orders,
        ]);
    }
}
