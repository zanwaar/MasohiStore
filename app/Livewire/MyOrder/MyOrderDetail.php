<?php

namespace App\Livewire\MyOrder;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MyOrderDetail extends Component
{
    public $order_id;
    public $model_order;
    public $va_numbers = [];
    public $expiryTime;
    public $cekorder;

    public $noresi;
    public $awb;
    public $error = 'Riwayat pelacakan Pengriman...';
    public $history =  [];
    public function mount($order_id)
    {
        $this->order_id = $order_id;
        $this->model_order = Order::where('id', $this->order_id)->first();

        if (is_null($this->model_order)) {
            return redirect()->route('my-order');
        }

        if ($this->model_order->payment_status === 'menunggu') {
            $response = Http::withBasicAuth(env('MIDTRANS_SERVER_KEY'), '')
                ->get(env('MIDTRANS_BASE_URL') . '/v2/' . $this->order_id . '/status');

            $this->va_numbers = $response->json()['va_numbers'];
            $this->order_id = $response->json()['order_id'];
            $this->expiryTime = $response->json()['expiry_time'];
        }
        if ($this->model_order->shipping_resi) {
            # code...
            $this->noresi = $this->model_order->shipping_resi;
            $this->awb = $this->model_order->shipping_resi;
            $this->trackShipment();
        }
    }

    public function trackShipment()
    {
        // Get API key and courier from environment variables
        $apiKey = env('BINDERBYTE_API_KEY');
        $courier = env('BINDERBYTE_COURIER');

        // Define the API endpoint
        $url = 'https://api.binderbyte.com/v1/track';

        // Define the query parameters
        $params = [
            'api_key' => $apiKey,
            'courier' => $courier,
            'awb' => $this->awb,
        ];

        // Make the GET request
        $response = Http::get($url, $params);

        // Check if the request was successful
        if ($response->successful()) {
            $this->error = "";
            $trackingData = $response->json();
            if (isset($trackingData['data']) && isset($trackingData['data']['history'])) {
                $this->history = $trackingData['data']['history'];
            } else {
                $this->error = 'No tracking history found';
            }
        } else {
            $this->error = 'Failed to retrieve tracking data';
        }
    }
    public function batal($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        $order->update(
            [
                'status' => 'dibatalkan',
                'payment_status' => 'cancelled',
            ]
        );
        $this->dispatch('batalorder');
        // dd($order);
    }
    public function render()
    {
        $order_items = OrderItem::with('product')->where('order_id', $this->order_id)->get();
        $address = ShippingAddress::where('order_id', $this->order_id)->first();
        // Cek apakah $order_items kosong atau $address tidak ditemukan
        if ($order_items->isEmpty() || !$address) {
            return redirect()->route('my.order');
        }
        return view('livewire.my-order.my-order-detail', [
            'order_items' => $order_items,
            'address' => $address,
            'order' => $this->model_order,
        ]);
    }
}
