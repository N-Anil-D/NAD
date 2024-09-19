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
        // dd('COUSTOM LOGIN');
        return view('livewire.custom-login');
    }

    public function swapLoginPage()
    {
        // dd($this->bylal,!$this->bylal);
        $this->bylal = !$this->bylal;
    }


}
