<?php

namespace App\Livewire\MyAccount;

use App\Models\AlamatPengiriman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Alamat extends Component
{
    use LivewireAlert;
    public $titelmodal;
    public $mod = false;

    public $provinces = [];
    public $cities = [];
    public $subdistricts = [];
    public $shippingCost = [];
    public $loading = false;


    public $id_alamat;
    public $label;
    public $first_name;
    public $last_name;
    public $phone;
    public $street_address;
    public $selectedProvince = null;
    public $vaProvince = null;
    public $idProvince = null;
    public $selectedCity = null;
    public $vaCity = null;
    public $idCity = null;
    public $selectedSubdistrict = null;
    public $vaSubdistrict = null;
    public $idSubdistrict = null;
    public $zip_code;

    public function mount()
    {

        $this->fetchProvinces();
    }
    public function add()
    {
       
        $this->titelmodal = "ALAMAT BARU";
        $this->dispatch('show');
        $this->fetchProvinces();
    }
    public function close()
    {
        $this->reset();
        $this->dispatch('hide');
    }

    public function showdelete($id)
    {
        $this->id_alamat = $id['id'];
        $this->dispatch('show-delete');
    }
    public function delete()
    {
        $product = AlamatPengiriman::findOrFail($this->id_alamat);

        $product->delete();
        $this->dispatch('hide');
        $this->alert('success', 'Delete successfully.', [
            'position' => 'top',
            'timer' => 2000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
    public function edit($data)
    {
        $this->fetchProvinces();
        $this->mod = true;

        $this->id_alamat = $data['id'];
        $this->label = $data['label'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->phone = $data['phone'];
        $this->street_address = $data['street_address'];

        $this->vaProvince = $data['vaprovince'];
        $this->idProvince = $data['province'];
        $this->vaCity = $data['vacity'];
        $this->idCity = $data['city'];
        $this->vaSubdistrict = $data['vasubdistrict'];
        $this->idSubdistrict = $data['subdistrict'];

        $this->zip_code = $data['zip_code'];



        $this->titelmodal = "INFO ALAMAT";
        $this->dispatch('show');
    }

    public function fetchProvinces()
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY')
        ])->get(env('RAJAONGKIR_PROVINCE_URL'));

        // dd($response->json());
        $this->provinces = $response->json()['rajaongkir']['results'];
    }

    public function fetchCities()
    {
        $this->loading = true;
        if ($this->selectedProvince) {
            list($provinceId, $provinceName) = explode('|', $this->selectedProvince);
            $this->vaProvince = $provinceName;
            $this->idProvince = $provinceId;
            $response = Http::withHeaders([
                'key' => env('RAJAONGKIR_API_KEY')
            ])->get(env('RAJAONGKIR_CITY_URL'), [
                'province' => $provinceId
            ]);

            $this->cities = $response->json()['rajaongkir']['results'];
            $this->subdistricts = [];
            $this->shippingCost = [];
            $this->loading = false;
            $this->mod = false;
            $this->selectedCity = null;
            $this->selectedSubdistrict = null;
        }
    }

    public function fetchSubdistricts()
    {
        if ($this->selectedCity) {
            list($CityId, $CityName) = explode('|', $this->selectedCity);
            $this->vaCity = $CityName;
            $this->idCity = $CityId;
            $response = Http::withHeaders([
                'key' => env('RAJAONGKIR_API_KEY')
            ])->get(env('RAJAONGKIR_SUBDISTRICT_URL'), [
                'city' => $CityId
            ]);

            $this->subdistricts = $response->json()['rajaongkir']['results'];
            $this->shippingCost = [];
            $this->selectedSubdistrict = null;
        }
    }

    public function fetchVillages()
    {
        $this->selectedSubdistrict;
        if ($this->selectedSubdistrict) {
            list($id, $name) = explode('|', $this->selectedSubdistrict);
            $this->vaSubdistrict = $name;
            $this->idSubdistrict = $id;
        }
    }


    public function save()
    {
        if ($this->id_alamat) {
            $this->validate([
                'label' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'street_address' => 'required',
                'zip_code' => 'required',
                // 'payment_method' => 'required',
            ]);
        } else {
            $this->validate([
                'label' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'street_address' => 'required',
                'selectedProvince' => 'required',
                'selectedCity' => 'required',
                'selectedSubdistrict' => 'required',
                'zip_code' => 'required',
                // 'payment_method' => 'required',
            ]);
        }




        DB::beginTransaction();

        try {
            if ($this->id_alamat) {
                DB::table('alamat_pengirimen')
                    ->where('id', $this->id_alamat) // Pastikan hanya data dengan ID tertentu yang diupdate
                    ->update([
                        'label' => $this->label,
                        'first_name' => $this->first_name,
                        'last_name' => $this->last_name,
                        'phone' => $this->phone,
                        'street_address' => $this->street_address,
                        'province' => $this->idProvince,
                        'vaprovince' => $this->vaProvince,
                        'city' => $this->idCity,
                        'vacity' => $this->vaCity,
                        'subdistrict' => $this->idSubdistrict,
                        'vasubdistrict' => $this->vaSubdistrict,
                        'zip_code' => $this->zip_code,
                        'updated_at' => now(), // created_at tidak perlu diperbarui
                    ]);
            } else {
                DB::table('alamat_pengirimen')->insert([
                    'user_id' => auth()->user()->id,
                    'label' => $this->label,
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'phone' => $this->phone,
                    'street_address' => $this->street_address,
                    'province' => $this->idProvince,
                    'vaprovince' => $this->vaProvince,
                    'city' => $this->idCity,
                    'vacity' => $this->vaCity,
                    'subdistrict' => $this->idSubdistrict,
                    'vasubdistrict' => $this->vaSubdistrict,
                    'zip_code' => $this->zip_code,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }




            DB::commit();
            $this->reset();
            $this->dispatch('hide');
            $this->alert('success', 'Alamat saved successfully.', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            $this->alert('success', 'Failed to save Alamat.', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }
    public function render()
    {
        $alamat = AlamatPengiriman::where('user_id', auth()->user()->id)->latest()->paginate(10);
        return view('livewire.my-account.alamat', ['alamat' => $alamat]);
    }
}
