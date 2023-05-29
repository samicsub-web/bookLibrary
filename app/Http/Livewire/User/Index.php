<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $users = User::where('role', '!=', 1)->withCount(['books'])->get();
        return view('livewire.user.index', ['users' => $users]);
    }
}
