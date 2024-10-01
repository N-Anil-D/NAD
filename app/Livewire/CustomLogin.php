<?php

namespace App\Livewire;

use Livewire\Component;

class CustomLogin extends Component
{
    public $bylal;

    public function mount()
    {
        $this->bylal = false;
    }

    public function render()
    {
        return view('livewire.custom-login');
    }

    public function swapLoginPage()
    {
        $this->bylal = !$this->bylal;
    }


}
