<?php

namespace App\Livewire\Panel;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public function save()
    {

        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|max:255',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        $user->assignRole('merchant');
        auth()->login($user);

        return redirect()->intended('/panel/pengaturan');
    }
    public function render()
    {
        return view('livewire.panel.register');
    }
}
