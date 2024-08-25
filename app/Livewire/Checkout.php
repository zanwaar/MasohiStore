<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\AlamatPengiriman;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class Checkout extends Component
{
    public $umkm;
    public $cart_items = [];
    public $cart_items_merchant = [];
    public $state_alamat = [];
    public $selectedAlamat;

    public $provinces = [];
    public $cities = [];
    public $subdistricts = [];
    public $selectedCourier;
    public $courierOptions = ['jne',  'pos', 'jnt', 'ninja']; // Example courier options
    public $shippingCost = [];
    public $va_numbers = [];
    public $order_id;
    public $expiryTime;
    public $cekorder;

    public $latitude;
    public $longitude;
    public $kurir;
    public $banktransfer;


    public $titelmodal;
    public $loading = false;
    public $total = 0;


    public $first_name;
    public $last_name;
    public $phone;
    public $street_address;
    public $selectedProvince = null;
    public $vaProvince = null;
    public $selectedCity = null;
    public $vaCity = null;
    public $selectedSubdistrict = null;
    public $vaSubdistrict = null;
    public $selectedOngkir;
    public $zip_code;


    public $selectedShippingService; // Holds the selected shipping service
    public $finalShippingCost;

    public function mount($slug)
    {
        $this->umkm = Merchant::where('slug', $slug)->first();
        $this->cart_items =  CartManagement::getCartItemsFromCookie();
        $this->cart_items_merchant =  CartManagement::groupCartByMerchantAndCaluclateTotal($this->cart_items,   $this->umkm->id);

        if (empty($this->cart_items_merchant)) {
            redirect('/');
        }
    }



    public function placeOrder()
    {

        $this->validate([
            'selectedShippingService' => 'required',
            'courierOptions' => 'required',
            'banktransfer' => 'required',
        ]);

        $line_items = [];
        $total_price = 0;
        foreach ($this->cart_items_merchant  as $item) {
            $total_price = $item['total_price'];
            $merchant_id = $item['merchant_id'];
            foreach ($item['items'] as $key => $value) {
                # code...
                $line_items[] = [
                    'merchant_id' => $merchant_id,
                    'product_id' => $value['product_id'],
                    'price' => $value['total_amount'],
                    'quantity' => $value['quantity'],
                    'unit_amount' => $value['unit_amount'],
                    'total_amount' => $value['total_amount'],
                ];
            }
        }
        // dd(auth()->user());
        $order = new Order();
        $order->id = Str::uuid();
        $order->user_id = auth()->user()->id;
        $order->grand_total =   $total_price;
        $order->merchant_id = $this->umkm->id;
        $order->payment_method = 'Transfer Bank';
        $order->payment_status = 'menunggu';
        $order->status = 'baru';
        $order->shipping_amont = $this->finalShippingCost;
        $order->shipping_method = $this->selectedShippingService;


        $address = new ShippingAddress();
        $address->first_name =  $this->state_alamat['first_name'];
        $address->last_name = $this->state_alamat['last_name'];
        $address->phone = $this->state_alamat['phone'];
        $address->street_address = $this->state_alamat['street_address'];
        $address->province = $this->state_alamat['vaprovince'];
        $address->city = $this->state_alamat['vacity'];
        $address->subdistrict = $this->state_alamat['vasubdistrict'];
        $address->zip_code = $this->state_alamat['zip_code'];

        $resp = Http::withBasicAuth(env('MIDTRANS_SERVER_KEY'), '')->post(env('MIDTRANS_BASE_URL') . '/v2/charge', [
            "payment_type" => "bank_transfer",
            "transaction_details" => [
                "order_id" => $order->id,
                "gross_amount" =>  $total_price,
            ],
            "bank_transfer"  => [
                "bank" => $this->banktransfer
            ],
            "customer_details" => [
                "email" => auth()->user()->email,
                "first_name" =>  $this->state_alamat['first_name'],
                "last_name" => $this->state_alamat['last_name'],
                "phone" => $this->state_alamat['phone']
            ],

        ]);
        //popup modal pembayran
        $this->va_numbers = $resp->json()['va_numbers'];
        $this->order_id = $resp->json()['order_id'];
        $this->expiryTime = $resp->json()['expiry_time'];
        $this->dispatch('cekorder');
        $order->save();
        $address->order_id = $order->id;
        $address->save();
        $order->items()->createMany($line_items);
        CartManagement::clearCartItemsByMerchantId($this->cart_items,   $this->umkm->id);
    }

    public function fetchAlamatDetails()
    {
        $alamat = AlamatPengiriman::find($this->selectedAlamat);

        if ($alamat) {
            $this->state_alamat = $alamat->toArray();
        } else {
            $this->state_alamat = [];
        }
    }


    public function calculateShippingCost()
    {

        // $this->shippingCost = [];
        if ($this->selectedCourier) {
            try {
                $response = Http::withHeaders([
                    'key' => env('RAJAONGKIR_API_KEY')
                ])->post(env('RAJAONGKIR_COST_URL'), [
                    'origin' => '3674', // ID Kota Asal (Contoh)
                    'originType' => 'subdistrict',
                    'destination' => $this->state_alamat['subdistrict'],
                    'destinationType' => 'subdistrict',
                    'weight' => 1000, // berat dalam gram
                    'courier' => $this->selectedCourier
                ]);
                $this->reset('shippingCost');
                if ($response->successful()) {
                    $this->shippingCost = $response->json()['rajaongkir']['results'];
                } else {
                    $this->shippingCost = [];
                    session()->flash('error', 'Failed to retrieve shipping costs. Please try again later.');
                }
            } catch (\Exception $e) {
                $this->shippingCost = [];
                session()->flash('error', 'An error occurred while fetching shipping costs: ' . $e->getMessage());
            }
        }
    }
    public function selectShippingService($service, $cost)
    {
        $this->selectedShippingService = $service;
        $this->finalShippingCost = $cost;
    }
    public function render()
    {
        $alamat = AlamatPengiriman::where('user_id', auth()->user()->id)->get();

        // If no specific address is selected, load the first one by default
        if ($alamat->isNotEmpty() && empty($this->selectedAlamat)) {
            $this->state_alamat = $alamat->first()->toArray();
            $this->selectedAlamat = $alamat->first()->id; // Set default selected address
        } elseif (!empty($this->selectedAlamat)) {
            // If a specific address is selected, fetch its details
            $this->fetchAlamatDetails();
        }

        return view('livewire.checkout', [
            'alamat' => $alamat
        ]);
    }
}
