<?php

namespace App\Livewire\Panel\Auth;

use App\Models\Merchant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;
    public $currentStep = 0;
    public $banner;
    public $logo;
    public $ktp;
    public $usaha;
    public $state = [
        'name' => '',
        'nik' => '',
        'tel' => '',
        'email' => '',
        'alamat' => '',
    ];
    public $password;
    public $password_confirmation;
    public $termsAccepted = false;

    protected $rules = [
        0 => [
            'state.name' => 'required|string|max:255',
            'state.nik' => 'required|string|max:16',
            'state.tel' => 'required|string|max:15',
            'state.email' => 'required|email|max:255|unique:users,email',
            'state.alamat' => 'required|string|max:500',
        ],
        1 => [
            'state.merchant_nama' => 'required|string|max:255',
            'state.merchant_jenis' => 'required|string',
            'state.merchant_alamat' => 'required|string|max:500',
            'state.merchant_omzet' => 'required|numeric|min:0',
        ],
        2 => [
            'banner' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'ktp' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'usaha' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'logo' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ],
        3 => [
            'password' =>  'required|string|min:8|confirmed',
        ],
    ];


    public function nextStep()
    {
        $this->validateCurrentStep();
        if ($this->currentStep < 3) {
            $this->currentStep++;
        }
    }

    public function prevStep()
    {
        if ($this->currentStep > 0) {
            $this->currentStep--;
        }
    }

    public function validateCurrentStep()
    {
        $rules = $this->rules[$this->currentStep] ?? [];
        // dd($rules);
        $this->validate($rules);
    }

    public function register()
    {
        $this->validateCurrentStep();

        DB::beginTransaction();
        try {


            $timestamp = now()->timestamp;

            // Generate unique names for each file
            $merchant_usaha = $timestamp . '_' . $this->usaha->getClientOriginalName();
            $this->usaha->storeAs('public/merchant', $merchant_usaha);

            $merchant_foto = $timestamp . '_' . $this->logo->getClientOriginalName();
            $this->logo->storeAs('public/merchant', $merchant_foto);

            $merchant_ktp = $timestamp . '_' . $this->ktp->getClientOriginalName();
            $this->ktp->storeAs('public/merchant', $merchant_ktp);

            $merchant_banner = $timestamp . '_' . $this->banner->getClientOriginalName();
            $this->banner->storeAs('public/merchant', $merchant_banner);

            $user = User::create([
                'name' => $this->state['name'],
                'email' => $this->state['email'],
                'notlpn' => $this->state['tel'],
                'password' => Hash::make($this->password),
            ]);
            $user->assignRole('merchant');

            Merchant::create([
                'user_id' => $user->id,
                'owner_nama_lengkap' => $this->state['name'],
                'owner_no_ktp' => $this->state['nik'],
                'owner_no_hp' => $this->state['tel'],
                'owner_alamat_lengkap' => $this->state['alamat'],
                'merchant_nama' => $this->state['merchant_nama'],
                'merchant_jenis' => $this->state['merchant_jenis'],
                'merchant_alamat' => $this->state['merchant_alamat'],
                'merchant_omzet' => $this->state['merchant_omzet'],
                'slug' => $this->createUniqueSlug($this->state['merchant_nama'], Merchant::class),
                'owner_ktp' => $merchant_ktp,
                'merchant_usaha' => $merchant_usaha,
                'merchant_foto' => $merchant_foto,
                'merchant_banner' => $merchant_banner,
            ]);


            DB::commit();
            auth()->login($user);

            return redirect()->intended();
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }
        // Proses pendaftaran
        // Simpan data atau lakukan logika lain yang dibutuhkan

        // Reset form atau redirect jika pendaftaran berhasil
    }
    function createSlug($string)
    {
        // Ubah teks menjadi lowercase
        $slug = strtolower($string);

        // Ganti karakter non-alphanumeric dengan tanda hubung
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $slug);

        // Hapus tanda hubung di awal atau akhir string
        $slug = trim($slug, '-');

        return $slug;
    }

    function createUniqueSlug($string, $model)
    {
        $slug = $this->createSlug($string);
        $originalSlug = $slug;
        $count = 1;

        // Cek apakah slug sudah ada di database
        while ($model::where('slug', $slug)->exists()) {
            // Tambahkan angka di akhir slug untuk membuatnya unik
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
    public function render()
    {
        return view('livewire.panel.auth.register');
    }
}
