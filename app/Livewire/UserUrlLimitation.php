<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserUrlLimitation extends Component
{
    public $users;


    public function render()
    {
        $this->users = User::get();
        return view('livewire.user-url-limitation',['users'=>$this->users]);
    }
}
