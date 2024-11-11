<?php

namespace App\Livewire\MyAccount;

use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class MyAccount extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $modelUser;
    public $name, $email, $notlpn, $profile_image;
    public array $image = [];

    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    public $uploading = false;


    public function updatedImage()
    {
        $this->uploading = true;
    }

    public function updatedImageTempUrl()
    {
        // Setelah upload berhasil, ubah status uploading menjadi false
        $this->uploading = false;
    }
    public function mount()
    {
        $this->modelUser = Auth()->user();
        $this->name = $this->modelUser->name;
        $this->notlpn = $this->modelUser->notlpn;
        $this->email = $this->modelUser->email;
    }
    public function add()
    {
        $this->dispatch('show');
    }
    public function updateProfile()
    {
        // Validasi input
        $this->validate([
            'image' => 'required',
        ]);

        DB::beginTransaction();
        try {

            // Logika untuk menyimpan data, misalnya update ke database
            if ($this->profile_image) {
                $path = $this->profile_image->store('profile_images', 'public/avatar');
                // Update gambar profil di database, jika ada perubahan
                $validatedData['avatar'] =   $path;
            }
            // if ($this->image) {
            //     foreach ($this->image as $file) {
            //         $validatedData['avatar'] = $file['name'];
            //         Storage::putFileAs('public/avatars', new File($file['path']), $validatedData['avatar']);
            //     }
            // }
            $this->modelUser->update($validatedData);

            DB::commit();
            // Reset properti
            $this->reset(['image']);
            $this->alert('success', 'Pengguna berhasil dibuat.', [
                'position' => 'top',
                'timer' => 2000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            $this->dispatch('hide');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            $this->dispatch('hide');
            $this->alert('success', 'Failed to save Surat Masuk.', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }
    public function update()
    {
        // Validasi input
        $this->validate([
            'name' => 'required|max:255',
            'notlpn' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->modelUser->id,
        ]);

        DB::beginTransaction();
        try {
            // dd($user);
            $validatedData = [
                'name' => $this->name,
                'notlpn' => $this->notlpn,
                'email' => $this->email,
            ];
            // Logika untuk menyimpan data, misalnya update ke database
            if ($this->profile_image) {
                $path = $this->profile_image->store('avatars', 'public');
                $validatedData['avatar'] =  $path;
            }
            $this->modelUser->update($validatedData);
            DB::commit();
            // Reset properti

            $this->alert('success', 'Pengguna berhasil dibuat.', [
                'position' => 'top',
                'timer' => 2000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            $this->dispatch('hide-form');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            $this->dispatch('hide-form');
            $this->alert('success', 'Failed to save Surat Masuk.', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }
    public function render()
    {
        return view('livewire.my-account.my-account');
    }
}
