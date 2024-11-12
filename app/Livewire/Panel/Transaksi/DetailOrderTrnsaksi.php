<?php

namespace App\Livewire\Panel\Transaksi;

use App\Models\Merchant;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DetailOrderTrnsaksi extends Component
{
    use LivewireAlert;
    public $selectedstatus;
    public $nomorKurir;
    public $nomorresi;
    public $order;
    public $merchant_id;
    public $awb;
    public $error;
    public $history =  [];

    public function mount($orderID)
    {
        $umkm = Merchant::where('user_id', auth()->user()->id)->first();

        $this->merchant_id = $umkm->id;
        $this->order = Order::with(['user', 'items', 'address'])->where('id', $orderID)->first();
        $this->selectedstatus = $this->order->status;
        if ($this->order) {
            $this->order->items = $this->order->items->where('merchant_id', $this->merchant_id);
        }
        $this->nomorresi = $this->order->shipping_resi;
        $this->awb = $this->order->shipping_resi;
        $this->trackShipment();

        // return response()->json($trackingInfo);
    }
    public function simpanresi()
    {
        // $this->validate([
        //     'nomorKurir' => 'required|numeric',
        // ]);
        $this->alert('success', 'Resi saved successfully.', [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->order->update([
            'shipping_resi' => $this->nomorresi,
        ]);
    }
    public function updateStatus()
    {

        $this->alert('success', 'Product saved successfully.', [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->order->update([
            'status' => $this->selectedstatus,
        ]);

        // Logika untuk menyimpan status ke database atau proses lainnya
        // Contoh:
        // Order::find($orderId)->update(['status' => $this->selectedstatus]);

        // session()->flash('message', 'Status berhasil diperbarui.');
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
        // dd($response->json());
        // Check if the request was successful
        if ($response->successful()) {
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

    public function render()
    {

        return view('livewire.panel.transaksi.detail-order-trnsaksi');
    }
}
