<?php

namespace App\Livewire\Panel;

use App\Models\Merchant;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Termwind\Components\Dd;

class PengaturanUmkm extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    #[Validate('image|max:20480')]
    public $logo;
    
    #[Validate('image|max:30480')]
    public $banner;

    #[Validate('image|max:30480')]
    public $ktp;

    #[Validate('image|max:30480')]
    public $usaha;

    public $merchant_id;
    public $merchant_nama;
    public $merchant_jenis;
    public $merchant_alamat;
    public $merchant_omzet;
    public $merchant_foto;
    public $merchant_banner;
    public $owner_no_hp;
    public $owner_nama_lengkap;
    public $owner_no_ktp;
    public $owner_alamat_lengkap;


//     'user_id' => $user->id,
//     'owner_nama_lengkap' => $this->state['name'],
//     'owner_no_ktp' => $this->state['nik'],
//     'owner_no_hp' => $this->state['tel'],
//     'owner_alamat_lengkap' => $this->state['alamat'],
//     'merchant_nama' => $this->state['merchant_nama'],
//     'merchant_jenis' => $this->state['merchant_jenis'],
//     'merchant_alamat' => $this->state['merchant_alamat'],
//     'merchant_omzet' => $this->state['merchant_omzet'],
//     'slug' => $this->createUniqueSlug($this->state['merchant_nama'], Merchant::class),
//     'owner_ktp' => $merchant_ktp,
//     'merchant_usaha' => $merchant_usaha,
//     'merchant_foto' => $merchant_foto,
//     'merchant_banner' => $merchant_banner,
// ]);
 

    public function mount()
    {
        $umkm = Merchant::where('user_id', auth()->user()->id)->first();
        if ($umkm) {
            # code...
            $this->merchant_id = $umkm->id;
            $this->merchant_nama = $umkm->merchant_nama;
            $this->merchant_alamat = $umkm->merchant_alamat;
            $this->merchant_foto = $umkm->merchant_foto;
            $this->merchant_banner = $umkm->merchant_banner;
            $this->owner_no_hp = $umkm->owner_no_hp;
        }
    }

    public function add()
    {

        $this->dispatch('show');
    }
    public function save()
    {
        if ($this->merchant_id) {
            $this->validate([
                'merchant_nama' => 'required|string',
                'merchant_alamat' => 'required|string',
                'owner_no_hp' => 'required|string',
            ]);
        } else {
            $this->validate([
                'merchant_nama' => 'required|string',
                'merchant_alamat' => 'required|string',
                'owner_no_hp' => 'required|string',
                'logo' => 'image|max:20480',
                'banner' => 'image|max:20480',
            ]);
        }



        DB::beginTransaction();

        try {
            if ($this->logo) {
                $this->merchant_foto  = $this->logo->getClientOriginalName();
                $this->logo->storeAs(path: 'public/merchant', name: $this->merchant_foto);
                // foreach ($this->logo as $file) {
                // }
            }
            if ($this->banner) {
                $this->merchant_banner  = $this->banner->getClientOriginalName();
                $this->banner->storeAs(path: 'public/merchant', name: $this->merchant_banner);
                // foreach ($this->logo as $file) {
                // }
            }
            // dd($this->merchant_foto);
            if ($this->merchant_id) {
                Merchant::where('id', $this->merchant_id)->update([
                    'merchant_nama' => $this->merchant_nama,
                    'merchant_alamat' => $this->merchant_alamat,
                    'owner_no_hp' => $this->owner_no_hp,
                    'merchant_foto' => $this->merchant_foto,
                    'merchant_banner' => $this->merchant_banner,
                    'slug' => $this->createUniqueSlug($this->merchant_nama, Merchant::class),
                ]);
            } else {
                Merchant::create([
                    'user_id' => auth()->user()->id,
                    'merchant_nama' => $this->merchant_nama,
                    'merchant_alamat' => $this->merchant_alamat,
                    'owner_no_hp' => $this->owner_no_hp,
                    'merchant_foto' => $this->merchant_foto,
                    'merchant_banner' => $this->merchant_banner,
                    'slug' => $this->createUniqueSlug($this->merchant_nama, Merchant::class),
                ]);
            }
            DB::commit();
            $this->alert('success', 'Mercahant saved successfully.', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            $this->alert('success', 'Failed to save Mercahant.', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
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


        return view('livewire.panel.pengaturan-umkm');
    }
}
