<?php

namespace App\Livewire\Panel\Components;

use Livewire\Component;

class Aside extends Component
{
    public $activeRoute = '';
    public function mount()
    {
        $this->activeRoute = \Illuminate\Support\Facades\Route::currentRouteName();
    }
    public function render()
    {
        return view('livewire.panel.components.aside');
    }
}
