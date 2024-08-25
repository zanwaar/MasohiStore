<?php

namespace App\Livewire\MyAccount;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Password extends Component
{
    use LivewireAlert;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);


        // Check if the current password matches
        if (!Hash::check($this->current_password, Auth::user()->password)) {
            $this->addError('current_password', 'The current password is incorrect.');
            return;
        }

        // Update the password
        Auth::user()->update(['password' => Hash::make($this->new_password)]);

        $this->alert('success', 'Password successfully updated', [
            'position' => 'top',
            'timer' => 2000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    }
    public function render()
    {
        return view('livewire.my-account.password');
    }
}
