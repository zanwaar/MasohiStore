<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class LoginRegister extends Component
{
    public $email;
    public $password;

    public function save()
    {
        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:6|max:255',
        ]);

        if (!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('error', 'Invalid credentials');
            return;
        }
        return redirect()->intended();
    }
    public function render()
    {
        return view('livewire.login-register');
    }
}
