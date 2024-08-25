<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class LoginRegister extends Component
{
    public $type = 'login';
    public $name;
    public $email;
    public $password;
    public $notlpn;
    public function types($type)
    {
        $this->reset();
        $this->type = $type;
    }
    public function save()
    {
        if ($this->type == 'register') {
            $this->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|min:6|max:255',
                'notlpn' => 'required|numeric',
            ]);

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'notlpn' => $this->notlpn,
            ]);
            $user->assignRole('user');
            auth()->login($user);

            return redirect()->intended();
        } else {
            $this->validate([
                'email' => 'required|email|max:255',
                'password' => 'required|min:6|max:255',
            ]);

            if (!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
                session()->flash('error', 'Invalid credentials');
                return;
            }
            return redirect()->intended();
        }
    }
    public function render()
    {
        return view('livewire.login-register');
    }
}
